<?php

namespace App\News;

use App\Interfaces\Entity;
use App\Interfaces\ParceSettings;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use DiDom\Document;

use App\News\NewsDb;

class News implements Entity
{
    //public static $news = [];

    public function parce(ParceSettings $settings)
    {
        $cookieJar = $settings->getJar()->fromArray($settings::COOKIES, $settings::DOMAIN);

        try {
            $response = $settings->getClient()->get($settings::DOMAIN, ['cookies' => $cookieJar, 'headers' => $settings::HEADERS,]);
            if ($response->getStatusCode() == 200) {
                $resBody = (string)$response->getBody();
                $resBody = json_decode($resBody, true);

                foreach ($resBody['feeds'][5]['news'] as $news) {
                    $response = $settings->getClient()->post('http://rr.escoltasoft.ru/docs/text', [
                        'query' => [
                            'nd' => $news['id']
                        ],
                        'cookies' => $cookieJar,
                        'headers' => $settings::HEADERS,
                    ]);
                    if ($response->getStatusCode() == 200) {
                        $resBody = (string) $response->getBody();

                        $document = new Document($resBody);
                        $paragraphs = $document->find('p.formattext');

                        $text = '';
                        foreach ($paragraphs as $paragraph) {
                            $text .= $paragraph->text();
                        }
                    }
                    $news['text'] = $text;
                    $settings->getDb()->save($news['id'], $news['title'], $news['text'], date('Y-m-d', strtotime($news['date'])));
                    //NewsCompilation::addNews($news, $news['id']);
                }         
            }
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            echo "<p>";
            echo Psr7\Message::toString($e->getResponse());
        }
    }
}
