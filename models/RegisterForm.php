<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $password2;

    public function rules()
    {
        return [
            [['username','password','password2'],'required'],
            ['username','string','min'=>4,'max'=>16],
            [['password','password2'],'string','min'=>8,'max'=>32],
            ['password2','compare','compareAttribute'=>'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->auth = \Yii::$app->security->generateRandomString();
        $user->token = \Yii::$app->security->generateRandomString();
        if($user->save())
        {
            return true;
        }
        \Yii::error("User not saved: " . VarDumper::dumpAsString($user->errors));
        return false;
    }

}