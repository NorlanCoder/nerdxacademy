<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class registerController extends Controller
{
    public function confirmation()
    {
        return view('frontend.formations.confirmation');
    }
    public function store(Request $request)
    {

        $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'formation' => ['required', 'string', 'max:255']
        ]);

        // dd(env('MAIL_USERNAME'));

        Register::create([
            ...$request->only(
                'last_name',
                'first_name',
                'phone_number',
                'email',
                'formation'
            )
        ]);

        $send_mail_service = new SendMailService();

        $body = "Nom: " . utf8_encode($request->lastname) . "<br>";
        $body .= "Prénom: " . utf8_encode($request->firstname) . "<br>";
        $body .= "Email: " . utf8_encode($request->email) . "<br>";
        $body .= "Téléphone: " . utf8_encode($request->phone) . "<br>";
        $body .= "Formation: " . utf8_encode($request->formation) . "<br>";

        $send_mail_service->sendMail($body);

        return redirect()->route('formation.register.confirmation');
    }
}
