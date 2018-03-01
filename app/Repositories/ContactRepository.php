<?php

namespace App\Repositories;

use App\Category;
use App\Channel;
use App\Contact;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use MetaTag;
use App\News;
use Mail;

class ContactRepository
{
    public function initContact(Request $request)
    {

        self::send($request);

        $contact = self::forContact();
        $lastNews = self::forLastNews();
        $randomChannel = Channel::inRandomOrder()->first();
        $category = Category::all()->toArray();


        $data = [
            'randomChannel' => $randomChannel,
            'category' => $category,
            'contact' => $contact,
            'lastNews' => $lastNews,
        ];
        return $data;
    }

    public function forContact()
    {
        $contact = Contact::find(1);

        MetaTag::set('title', $contact['title']);
        MetaTag::set('description', $contact['description']);

        return $contact;
    }

    public function forLastNews(){
        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return $last_news;
    }

    public function send(Request $request)
    {
        if($request->isMethod('post')){

            self::rules($request);

            $data = $request->all();

            $result = Mail::send('contact.email', ['data' => $data], function ($message) use ($data)
            {
                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email']);
                $message->to($mail_admin)->subject($data['subject']);

            });

            if($result === null){
                return redirect()->route('contact')->with('status', 'Сообщение отправлено.');
            }
        }
    }

    public function rules(Request $request)
    {
        $messages = [
            'required' => 'Поле "E-mail" обязательное к заполнению.',
            'email' => 'Поле "E-mail" должно соответсвовать email адресу.',
            'min' => 'Минимальное кол-во символов в поле "Текст сообщения" должно быть :min символов.',
            'max' => 'Максимальное кол-во символов в поле "Текст сообщения" должно быть :max символов.',
        ];
        $request->validate([
            'email' => 'required|max:255|email',
            'subject' => 'required',
            'text' => 'required|min:40|max:1400',
        ], $messages);

    }
}