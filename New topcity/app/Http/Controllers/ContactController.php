<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\SendContactMail;
use http\Env\Response;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(ContactFormRequest $request)
    {
        $email_to = config('mail.username');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $message = $request->get('message');
        $subject = $request->get('subject');
        switch ($subject) {
            case 0:
                return \response('subject cant be 0', 400);
                break;
            case 1:
                $subject = "Вебсайт";
                $email_to = 'marketing@topsity.com.ua';
                break;
            case 2:
                $subject = "Хмельницький офіс";
                $email_to = 'logistic@topsity.com.ua';
                break;
            case 3:
                $subject = "Технічна підтримка";
                $email_to = 'support.hm@topsity.com.ua';
                break;
            case 4:
                $subject = "Контроль якості";
                $email_to = 'spory@topsity.com.ua';
                break;
            default:
                return \response('', 400);
        }

        \Mail::to($email_to)
            ->send(new SendContactMail($name, $email, $message, $subject, $phone));
        return response()->json(['success' => true]);
    }
}
