<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admins}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $reset_password
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
        return '{{%admins}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'add_time', 'edit_time'], 'required'],
            [['role', 'status', 'add_time', 'edit_time'], 'integer'],
            [['username', 'password', 'reset_password', 'email'], 'string', 'max' => 255],
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
