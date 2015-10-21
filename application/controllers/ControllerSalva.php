<?php

class ControllerSalva extends Controller {

    public function actionIndex($param = null) {
        $this->render('index', array(
            'text' => $param,
            'array' => array(12, 3, 4, 5),
        ));
    }

}
