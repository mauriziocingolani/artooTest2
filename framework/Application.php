<?php

final class Application {

    private static $_istanza;
    private static $_config;

    private function __construct() {
        
    }

    public function start() {
        $p = $this->_parseRichiesta();
        $file = $this->_primaMaiuscola($p['controller'], 'Controller');
        if (file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . '/application/controllers/' . $file . '.php')) :
            require 'application/controllers/' . $file . '.php';
            if (class_exists($file)) :
                $action = $this->_primaMaiuscola($p['action'], 'action');
                if (method_exists($file, $action)) :
                    $obj = new $file;
                    $obj->folder = $p['controller'];
                    isset($p['parametro']) ? $obj->$action($p['parametro']) : $obj->$action();
                else :
                    die("Azione $action non trovata!");
                endif;
            else :
                die('Classe del controller ' . $file . ' non definita!!!');
            endif;
        else :
            die('File del controller ' . $file . ' mancante!!!');
        endif;
    }

    /**
     * @param array $config
     * @return Application
     */
    public static function GetIstanza(array $config) {
        if (self::$_istanza == null) :
            self::$_istanza = new Application;
            self::$_config = $config;
        else :
            die('Bastaaaaa!!!!');
        endif;
        return self::$_istanza;
    }

    private function _parseRichiesta() {
        // SCRIPT_NAME -> /ArtooTest2/index.php        
        $base = dirname($_SERVER['SCRIPT_NAME']);
        $url = str_replace($base, '', $_SERVER['REQUEST_URI']);
        $url_split = preg_split('/[\/]/', $url);
        $a = array(
            'controller' => $url_split[1],
            'action' => $url_split[2],
        );
        if (count($url_split) > 3)
            $a['parametro'] = $url_split[3];
        return $a;
    }

    private function _primaMaiuscola($stringa, $prefisso) {
        return $prefisso . strtoupper($stringa[0]) . substr($stringa, 1);
    }

    private function _a() {
        foreach ($_SERVER as $k => $v) :
            echo "$k -> $v<br />";
        endforeach;
    }

}
