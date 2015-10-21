<?php

class ControllerSalva extends Controller {

    public function actionIndex($param = null) {
        $pippo = array(12, 3, 4, 5);
        $this->render('index', array());
    }

}
