<?php

class Controller {

    public $folder;

    public function render($view, array $parametri = null) {
        var_dump($this->folder);
        if (file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . '/application/views/' . $this->folder . '/' . $view . '.php')) :
        else :
            die("La vista $view non esiste!!!");
        endif;
    }

}
