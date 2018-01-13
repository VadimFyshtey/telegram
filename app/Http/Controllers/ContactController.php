<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Channel;
use App\News;
use App\Contact;
use Mail;
use MetaTag;

class ContactController extends Controller
{
    public function index(Request $request){

        $contact = Contact::find(1);

        MetaTag::set('title', $contact['title']);
        MetaTag::set('description', $contact['description']);

        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $messages = [
            'required' => 'Поле :attribute обязательное к заполнению.',
            'email' => 'Поле :attribute должно соответсвовать email адресу.',
            'min' => 'Минимальное кол-во символов в поле :attribute должно быть :min символов.',
            'max' => 'Максимальное кол-во символов в поле :attribute должно быть :max символов.',
        ];

        if($request->isMethod('post')){

            $this->validate($request, [
                'email' => 'required|max:255|email',
                'subject' => 'required',
                'text' => 'required|min:40|max:1400',
            ], $messages);

           $data = $request->all();

          $result = Mail::send('contact.email', ['data' => $data], function ($message) use ($data){

              $mail_admin = env('MAIL_ADMIN');

              $message->from($data['email']);
              $message->to($mail_admin)->subject($data['subject']);

          });

          if($result === null){
              return redirect()->route('contact')->with('status', 'Сообщение отправлено.');
          }
        }

        $random_channel = Channel::inRandomOrder()->first();

        $category = Category::all()->toArray();

        return view('contact.index', compact('category', 'random_channel', 'last_news', 'contact'));
    }
}
