<?php

namespace App\Parcing;

use App\Parcing\Parcing;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use DiDom\Document;
use GuzzleHttp\Client;
use App\Models\Parce;

class Kodeks implements Parcing
{
    protected string $url;
    protected array $news = [];
    public function __construct($url)
    {
        $this->url = $url;
    }
    public function parce(): bool
    {
        $client = new Client();
        $response = $client->get($this->url."/news/feed/novosti-po-okhrane-truda");
        if($response->getStatusCode() == 200){
            $resBody = (string)$response->getBody();
            $document = new Document($resBody);
            $links = $document->find("article.news_tile ul.ul")[0]->find("li.ul_i a.news_lst_i_lk");

                foreach ($links as $item) {
                    if($item->attr("href")){
                        $path = parse_url($item->attr('href'), PHP_URL_PATH);

                        $response = $client->get($this->url.$path);
                        if($response->getStatusCode() == 200){
                            $resBody = (string)$response->getBody();
                            $document = new Document($resBody);
                            $title = $document->find("h1.h");
                            foreach ($title as $item){
                                $this->news[$path]['title'] = trim(htmlspecialchars($item->text()));
                            }
                            $text = $document->find("div.news_article_content p");
                            foreach($text as $item){
                                $this->news[$path]['text'] = preg_replace("/[^\w\x7F-\xFF\s]/", "", $item->text());;
                            }

                            Parce::saveNews($this->news[$path]['title'], $this->news[$path]['text'], $this->url);

                        }
                    }
                }

            return true;
        }
        return false;
    }
}