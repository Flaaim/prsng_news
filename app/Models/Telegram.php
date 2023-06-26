<?php

namespace App\Models;

class Telegram extends AppModel
{
    const BASE_URL = "https://api.telegram.org/bot6197195935:AAGaSdMh8ldp5ip010zeVV23ZkjNDRbsztY/";

    public function buildLink($title, $content)
    {
        $data = [
            'chat_id' => '1954013093',
            'parse_mode' => 'HTML',
            'text' => "<b>".$title."</b>\n\n".$content,
            'disable_web_page_preview' => false,
            'disable_notification' => true,
        ];
//            debug($data['text'], 1);
        return self::BASE_URL."sendMessage?chat_id={$data["chat_id"]}&text={$data["text"]}&parse_mode={$data["parse_mode"]}&disable_web_page_preview={$data["disable_web_page_preview"]}&disable_notification={$data["disable_notification"]}";
    }
}