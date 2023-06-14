<?php

namespace Wfm;

class View
{
    public string $content = '';

    public function __construct(public $route, public $layout = '', public $view = '', public $meta = [])
    {
        if($this->layout !== false){
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if(is_array($data)){
            extract($data);
        }
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        $view_file = APP.'/Views/'.$prefix.$this->route['controller'].'/'.$this->view.".php";
        
        if(is_file($view_file)){
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        }else{
            throw new \Exception('View not found...');
        }
        if($this->layout !== false){
            $layout_file = APP . "/Views/Layouts/{$this->layout}.php";
            if(file_exists($layout_file)){
                require_once $layout_file;
            }else{
                throw new \Exception('Layout not found...');
            }
        }
    }
    public function getMeta()
    {
        $out = '<title>'.$this->meta['title'].'</title>'.PHP_EOL;
        $out .= "<meta name=\"description\" content=\"{$this->meta['description']}\">".PHP_EOL;
        $out .= "<meta name=\"keywords\" content=\"{$this->meta['keywords']}\">".PHP_EOL;
        return $out;
    }

    public function getPart($file, $data = null)
    {
        if(is_array($data)){
            extract($data);
        }
        $file = APP."/views/{$file}.php";
        if(is_file($file)){
            require $file;
        }else{
            echo "Файл {$file} не найден...";
        }
    }

}