<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends CommonController
{


    public function init(){
        parent::init();
    }


    public function actionIndex()
    {
        return $this->render('index');
    }
}
