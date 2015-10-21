<?php

final class Application {

    private static $_istanza;
    private static $_config;

    private function __construct() {
        
    }

    public function start() {
        $p = $this->_parseRichiesta();
        var_dump($p);
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
        $url = preg_split('/[\/]/iD', $_SERVER['REQUEST_URI']);
        $a = array(
            'controller' => $url[2],
            'action' => $url[3],
        );
        if (count($url) > 4)
            $a['parametro'] = $url[4];
        return $a;
    }

}
