<?php

namespace App\Models;

use NoxxPHP\Core\Application;
use NoxxPHP\Core\Model;

class LoginModel extends Model
{
    public $email= '';
    public $password= '';

    public static function tableName(): string
    {
        return 'users';
    }

    public function rules()
    {
        return [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED],
        ];
    }

    public function login()
    {
        $user= User::findOne(['email'=>$this->email]);
        if(!$user){
            $this->addError('email', 'Account does not exist');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Incorrect credentials');
            return false;
        }

        return Application::$app->login($user);
    }
}