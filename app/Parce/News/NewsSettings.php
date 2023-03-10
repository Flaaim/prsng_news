<?php

namespace App\Parce\News;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use App\Abstract\ParceSettings;
use App\Models\Model;

class NewsSettings extends ParceSettings
{
    public const COOKIES = [
    'Kodeks' => '1678666721',
    'Auth' => 'UlJDMTI3VTE6U3lKTXhqNw==',
    'lastVDir' => '%2Fdocs',
    'KodeksData' => 'XzE2Nzc3MzQzXzE3OTMyMDU=',
    'state' => '%7B%22scroll%22%3A%7B%22top%22%3A0%2C%22hiddenComments%22%3A%5B%5D%7D%2C%22search%22%3Anull%2C%22tab%22%3A%220%22%2C%22page%22%3Anull%2C%22params%22%3A%5B%22frame%3Dleft%23frameLeft%22%5D%2C%22listId%22%3Anull%2C%22isPDF%22%3Afalse%2C%22type%22%3A%22document%22%2C%22nd%22%3A%22777712445%22%7D'];

    public const DOMAIN = 'http://rr.escoltasoft.ru/docs/api/news?guid=%7BF26148FD-9077-4BE9-A399-6BD661408021%7D&_t=19-01-2023+13%3A08%3A38&_=1674097713879';
    public const HEADERS = [
    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
    'Accept' => 'application/json, text/javascript, */*; q=0.01',
    'Accept-Language' => 'ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
    'Cookie' => 'state=%7B%22scroll%22%3A%7B%22top%22%3A0%2C%22hiddenComments%22%3A%5B%5D%7D%2C%22search%22%3Anull%2C%22tab%22%3A%220%22%2C%22page%22%3Anull%2C%22params%22%3A%5B%5D%2C%22listId%22%3Anull%2C%22isPDF%22%3Afalse%2C%22type%22%3A%22document%22%2C%22nd%22%3A%22777717025%22%7D; KodeksData=XzE2Nzc3MzQzXzE3OTMyMDU=; lastVDir=%2Fdocs; Auth=UlJDMTI3VTE6U3lKTXhqNw==; Kodeks=1678666721',
    'Host' => 'rr.escoltasoft.ru',
    'Upgrade-Insecure-Requests' => 1,
    'X-Requested-With' => 'XMLHttpRequest'];
    
}
