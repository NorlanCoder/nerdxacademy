<?php

namespace App\Http\Controllers;

use Kkiapay\Kkiapay;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Services\SendMailService;

use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Redirect;


class registerController extends Controller
{
    public function confirmation()
    {
        return view('frontend.formations.confirmation');
    }

    public function index()
    {
        return view('frontend.registers.index', [
            'registers' => Register::all()
        ]);
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'phone_number' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'email', 'max:255'],
        //     'formation' => ['required', 'string', 'max:255']
        // ]);

        DB::beginTransaction();
        $kkiapay = new Kkiapay('b131b020ed0f11eea8be6fad86782a96', 'tpk_b131b022ed0f11eea8be6fad86782a96', 'tsk_b131b023ed0f11eea8be6fad86782a96', true);

        $transaction = $kkiapay->verifyTransaction($request->transaction_id);
        if (strtolower($transaction->status) != 'success') {
            return view('frontend.formations.error');
        }
        // dd(env('MAIL_USERNAME'));
        $req = $transaction->state;
        $string = json_encode($req);
        if (substr($string, -1) != '}') {
            $req = json_decode(json_decode($string) . '"}');
        }

        // dd($req);

        $register = Register::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'phone_number' => $req->phone_number,
            'email' => $req->email,
            'formation' => $req->formation
        ]);

        // dd($register);

        $send_mail_service = new SendMailService();

        $body = "Nom: " . utf8_encode($request->lastname) . "<br>";
        $body .= "Prénom: " . utf8_encode($request->firstname) . "<br>";
        $body .= "Email: " . utf8_encode($request->email) . "<br>";
        $body .= "Téléphone: " . utf8_encode($request->phone) . "<br>";
        $body .= "Formation: " . utf8_encode($request->formation) . "<br>";

        $send_mail_service->sendMail($body);
        DB::commit();

        return redirect()->route('formation.register.confirmation');
    }
}
