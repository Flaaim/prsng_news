<?php

namespace App\Models;

use App\Models\AppModel;
use Wfm\Db;
class Parce extends AppModel
{
    public  function get_parcing_sources(): array
    {
        $sql = "SELECT * FROM parce";
        try {
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }
    public function get_one_news($slug): array
    {
        $sql = "SELECT * FROM news WHERE id = ?";
        try{
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$slug]);
            return $stmt->fetch();
        }catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }
    public function get_parcing_news(): array
    {
        $sql = "SELECT * FROM news ORDER BY id";
        try{
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        }catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public static function saveNews($title, $text, $source): void
    {
        $sql = "INSERT IGNORE INTO news (title, content, source) VALUES (?, ?, ?)";
        try{
            $stmt = Db::getInstance()->prepare($sql);
            $stmt->execute([$title, $text, $source]);
        }catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}