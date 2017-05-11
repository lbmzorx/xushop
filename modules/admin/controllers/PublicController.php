<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2017/5/11
 * Time: 21:09
 */

namespace app\modules\admin\controllers;


use yii\base\Controller;

class PublicController extends Controller
{
    public function init(){
        parent::init();
    }


    public function actionLogin()
    {
        $request = \Yii::$app->request;
        if($request->isPost){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $user_name=$request->post('user_name');
            $password=$request->post('password');
            $admins=Admins::find()->where(['user_name'=> $user_name])->asArray()->one();
            if($admins && \Yii::$app->getSecurity()->validatePassword($password,$admins['password'])){
                \Yii::$app->session->set('admins',$admins);
                return ['status'=>true,'msg'=>'登录成功'];
            }else{
                return ['status'=>false,'msg'=>'登录失败'];
            }
        }
        return $this->renderPartial('login');
    }
}