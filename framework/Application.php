<?php

final class Application {

    private static $_istanza;
    private static $_config;

    private function __construct() {
        
    }

    public function start() {
        var_dump('start!!!');
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

}
