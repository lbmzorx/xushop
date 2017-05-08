<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/8
 * Time: 17:46
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\news;
use app\models\ContactForm;

class HomeController extends Controller
{
    /**
     * @return string
     */
    public function actionHome(){
        /*
         * 主页
         */

        $modelnews = new news;
        $dataShow= array('message' => 1, 'titleHome' =>'xu');
        return $this->render('home',$dataShow);
    }
}