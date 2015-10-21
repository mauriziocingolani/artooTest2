<?php

class Controller {

    public $folder;

    public function render($view, array $parametri = null) {
        $fileName = dirname($_SERVER['SCRIPT_FILENAME']) . '/application/views/' . $this->folder . '/' . $view . '.php';
        if (file_exists($fileName)) :
            foreach ($parametri as $key => $value) :
                ${$key} = $value;
            endforeach;
            ob_start();
            require dirname($_SERVER['SCRIPT_FILENAME']) . '/application/views/layouts/main.php';
            ob_end_flush();
        else :
            die("La vista $view non esiste!!!");
        endif;
    }

}
