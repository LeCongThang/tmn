<?php

function sendMail($emailinfo,$body)
{
    $host = env('MAIL_HOST','smtp.gmail.com');
    $port = env('MAIL_PORT','587');
    $username = env('MAIL_USERNAME','luonghoaingoc789@gmail.com');

    $password = env('MAIL_PASSWORD','');

    $encryption = env('MAIL_ENCRYPTION','tls');

    $mail_from = [
        env('MAIL_USERNAME','luonghoaingoc789@gmail.com') => env('MAIL_FROM','RNB GROUP')
    ];

    $transport = \Swift_SmtpTransport::newInstance($host, $port, $encryption)
        ->setUsername($username)
        ->setPassword($password);
    $mailer = \Swift_Mailer::newInstance($transport);

    $html = View::make($body['view'], $body['content'])->render();

    $message = \Swift_Message::newInstance($emailinfo['subject'])
        ->setFrom($mail_from)
        ->setTo([$emailinfo['receiverAddress'] => $emailinfo['receiverName']])
        ->setBody($html, 'text/html');

    try{
        return $mailer->send($message);
    }catch (\Swift_SwiftException $ex){
        dd($ex->getMessage());
    }
    return false;
}

function genTokenForgotPassword($email='')
{
    $now=\Carbon\Carbon::now()->format('Y-m-d');
    $kq = $email.'|'.$now;
    return encrypt($kq);
}

function getTokenForgotPassword($token='')
{
    try {
        $decrypted = decrypt($token);
        $kq = explode('|',$decrypted);
        $now=\Carbon\Carbon::now()->format('Y-m-d');
        if($now==$kq[1])
        {
            return [
                'success'=>true,
                'email'=>$kq[0]
            ];
        }
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {}
    return [
        'success'=>false,
        'email'=>''
    ];
}