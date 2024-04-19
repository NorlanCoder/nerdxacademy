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

        $register = Register::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'phone_number' => $req->phone_number,
            'email' => $req->email,
            'formation' => $req->formation
        ]);

        // dd($register);

        // $send_mail_service = new SendMailService();

        $body = "Nom: " . utf8_encode($req->last_name) . "<br>";
        $body .= "Prénom: " . utf8_encode($req->first_name) . "<br>";
        $body .= "Email: " . utf8_encode($req->email) . "<br>";
        $body .= "Téléphone: " . utf8_encode($req->phone_number) . "<br>";
        $body .= "Formation: " . utf8_encode($req->formation) . "<br>";

        // $send_mail_service->sendMail($body);

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');   //  sender username
        $mail->Password = env('MAIL_PASSWORD');       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'NERDX ACADEMY');
        $mail->addAddress('academy@nerdxdigital.com');
        $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = "Inscription à NerdXAcademy";
        $mail->Body= $body;
        $success = $mail->send();
        
        DB::commit();

        return redirect()->route('formation.register.confirmation');
    }
}
