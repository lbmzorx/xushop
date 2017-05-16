<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%xshp_admins}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string reset_$password
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $add_time
 * @property integer $edit_time
 */
class Admins extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%xshp_admins}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            ['username', 'filter', 'filter' => 'trim'],
//            ['username', 'unique'],
//            ['username', 'string', 'min' => 6, 'max' => 16],
//            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],
//            ['username', 'string', 'min' => 6, 'max' => 16],
//
//            [['username','password'], 'required'],
            [['role', 'status', 'add_time', 'edit_time'], 'integer'],
            [['username', 'password', 'reset_password', 'email'], 'string', 'max' => 255],
//
//            ['email', 'filter', 'filter' => 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique'],

//            [['password','repassword'], 'required'],
//            [['password','repassword'], 'string', 'min' => 6],
//            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'reset_password' => 'Reset Password',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'add_time' => 'Add Time',
            'edit_time' => 'Edit Time',
        ];
    }
}
