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
        $kkiapay = new Kkiapay('82ab6b09a76f5d6671fed8fab03fad066d7e08ca', 'pk_e410c55f15c865de13134116defd5d7898cfdacc7118f2f36a46973ac442961a', 'sk_97548f7e6c809b83d8643c7fe25375381ef20ebde8fd77a0bbc1c5b55f972d70'); // dd($kkiapay->verifyTransaction($request->transaction_id));

        $transaction = $kkiapay->verifyTransaction($request->transaction_id);
        if (strtolower($transaction->status) != 'success') {
            return view(
                'frontend.formations.error'
            );
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
