<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2017/5/11
 * Time: 21:09
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;
use app\models\Admins;
use app\models\Tools\Captcha;
class PublicController extends Controller
{

    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    public function init(){
        parent::init();
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {
        $request = \Yii::$app->request;
        if($request->isPost){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $username=$request->post('username');
            $password=$request->post('password');
            $admins=Admins::find()->where(['username'=> $username])->asArray()->one();
            if($admins && \Yii::$app->getSecurity()->validatePassword($password,$admins['password'])){
                \Yii::$app->session->setName($admins['username']);
                \Yii::$app->session->setId($admins['id']);

                $this->redirect('default/index');
            }else{
                return ['status'=>false,'msg'=>'登录失败'];
            }
        }
        return $this->renderPartial('login');
    }

    public function actionLogout(){
        \Yii::$app->session->removeAll();
        $this->redirect('login');
    }
    public function actionRegister(){
        $request = \Yii::$app->request;
        if($request->isPost){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $form = $request->post();
            //验证模块
            $customer = new Admins();
            if(!$customer->load(['formReg'=>$form],'formReg')){
                $m=$customer->getErrors();
                return ['status'=>false,'msg'=>end($m)];
            }
            $customer->password=\Yii::$app->getSecurity()->generatePasswordHash($form['password'],12);
            $customer->save();
        }
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            \Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
    public function actionCaptcha(){
        $captcha=new captcha();
        $captcha->entry('verify_code');
    }

}