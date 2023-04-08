<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
// use Illuminate\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }


    function sendMail(ContactRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
        //     'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
        //     'email' => ['required', 'email'],
        //     'body' => ['required', 'string', 'max:2000'],
        // ]);

        $validated = $request->validated();




        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)

        // 複数のメールアドレスを指定の場合
        // $emails = [
        //     'test1@example.com',
        //     'test2@example.com',
        //     'test3@example.com',
        //     'test4@example.com',
        // Mail::to($emails)->send(new Sample());
        // ];

        //ここに相手のメールの宛先を書く
        Mail::to($request->email)->send(new ContactAdminMail($validated));


        return to_route('contact.complete');
    }

    public function complete()
    {
        return view('contact.complete');
    }
}
