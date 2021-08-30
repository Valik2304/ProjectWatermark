<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailSendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
//use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class MailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function send(MailSendRequest $request)
    {
        $phone = $request->get('phone');

        Mail::send(new SendMail($phone));
        return redirect(url()->previous());
    }
}
