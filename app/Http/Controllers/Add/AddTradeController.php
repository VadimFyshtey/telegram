<?php

namespace App\Http\Controllers\Add;

require_once __DIR__ . '/../../../../helper/curl.php';
require_once __DIR__ . '/../../../../helper/simple_html_dom.php';

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Trade;

class AddTradeController extends Controller
{
    public function add(Request $request){

        if ($request->ajax())
        {

            $token = $_POST['token'];
            $url = $_POST['url'];
            $category = $_POST['category'];
            $time_top = $_POST['time_top'];
            $time_lenta = $_POST['time_lenta'];
            $contact = $_POST['contact'];
            $pr = $_POST['pr'];
            $price = $_POST['price'];

            $this->validate($request, [
                'url' => ['required','max:255','min:5','regex:#(https://t.me/[a-zA-Z0-9_]{1,}$)|(@[a-zA-Z0-9_]{1,}$)#', 'unique:trade,url'],
                'category' => 'required',
            ]);

            $url_preg = preg_match('#@#', $url);
            if($url_preg === 1){
                $url = trim($url, '@');
                $url = 'https://t.me/' . $url;
            }

            $html = curl_get($url);

            $dom = str_get_html($html);

            //name
            $er = $dom->find('.tgme_page_title');
            if($er){
                $name =  $dom->find('.tgme_page_title', 0)->innertext;
                $name = trim(strip_tags((string)$name));
                $name = preg_replace('/[^\p{L}\p{N}\s][~\<\`\!\@\"\#\¹\$\;\%\^\:\&\?\*\(\)\+\=\\/\.\,]/u','&nbsp;', $name);
            } else {
                $name = 'Нету название';
            }

            //description
            $er = $dom->find('.tgme_page_description');
            if($er){
                $description =  $dom->find('.tgme_page_description', 0)->innertext;
                $description = trim(strip_tags((string)$description));
                $description = preg_replace('/[^\p{L}\p{N}\s][~\<\`\!\@\"\#\¹\$\;\%\^\:\&\?\*\(\)\+\=\\/\.\,]/u','&nbsp;', $description);
            } else {
                $description = 'Нету описания';
            }

            //image
            $er = $dom->find('.tgme_page_photo_image');
            if($er){
                $image =  $dom->find('.tgme_page_photo_image', 0)->src;
                $image = (string)$image;
                $url_name = str_ireplace(['/', ':', '\\'], '_' ,$url);
                $url_name .= mt_rand(0, 999);
                $ch = curl_init($image);
                $fp = fopen(   './img/trade/' . $url_name . '.png', 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);

                $image_save = $url_name . '.png';

            } else {
                $image_save = 'no-image.png';
            }

            //subscribers
            $er = $dom->find('.tgme_page_extra');
            if($er){
                $str =  $dom->find('.tgme_page_extra', 0);
                $subscribers = preg_replace("/[^0-9]/", '', $str);
                $subscribers = (int)$subscribers;
            } else {
                $subscribers = 0;
            }

            //conditions
            if(isset($time_top) && isset($time_lenta)){
                $conditions = 'Часов в топе: ' . $time_top . ' | ' . 'Часов в ленте: '  . $time_lenta;
            }

            //price
            if(isset($price)){
                $price = (int)$price;
            }

            $trade = new Trade();
            $trade->name = $name;
            $trade->description = $description;
            $trade->image = $image_save;
            $trade->subscribers = $subscribers;
            $trade->url = $url;
            $trade->category_id = $category;
            $trade->conditions = $conditions;
            $trade->contact = $contact;
            $trade->pr = $pr;
            $trade->price = $price;
            $trade->save();

        }

    }
}
