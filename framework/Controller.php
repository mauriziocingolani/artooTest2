<?php

class Controller {

    public $folder;

    public function render($view, array $parametri = null) {
        $fileName = dirname($_SERVER['SCRIPT_FILENAME']) . '/application/views/' . $this->folder . '/' . $view . '.php';
        if (file_exists($fileName)) :
            
            ob_start();
            require $fileName;
            ob_end_flush();
        else :
            die("La vista $view non esiste!!!");
        endif;
    }

}
