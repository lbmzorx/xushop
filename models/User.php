<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $add_time
 * @property integer $edit_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password', 'email', 'add_time', 'edit_time'], 'required'],
            [['role', 'status', 'add_time', 'edit_time'], 'integer'],
            [['username', 'password', 'password_reset', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
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
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'password_reset' => 'Password Reset',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'add_time' => 'Add Time',
            'edit_time' => 'Edit Time',
        ];
    }
}
