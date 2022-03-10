<?php

namespace App\Models;

use App\Core\DbModel;

class User extends DbModel
{   
    const STATUS_INACTIVE= 0;
    const STATUS_ACTIVE= 1;
    const STATUS_DELETED= 2;

    public $firstname= '';
    public $lastname= '';
    public $email= '';
    public $status= self::STATUS_INACTIVE;
    public $password= '';
    public $passwordConfirm= '';

    /**
     * set table name to be used to save to db
     */
    public static function tableName(): string
    {
        return 'users';
    }

    public function save()
    {
        $this->status= self::STATUS_INACTIVE;
        $this->password= password_hash($this->password, PASSWORD_DEFAULT);
        parent::save();
        return true;
    }

    /**
     * set form input rules
     */
    public function rules()
    {
        return [
            'firstname'=>[self::RULE_REQUIRED],
            'lastname'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class'=>self::class]],
            'password'=>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>6], [self::RULE_MAX, 'max'=>20]],
            'passwordConfirm'=>[self::RULE_REQUIRED, [self::RULE_MATCH, 'matchTo'=>'password']],
        ];
    }

    /**
     * set attributes to be used to save to db
     */
    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }
}