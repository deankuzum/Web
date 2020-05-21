<?php


class User extends Table
{
    public $user_id=0;
    public $firstname='';
    public $lastname='';
    public $patronymic='';
    public $pol_id=0;
    public $vozrast=0;
    public $pos_id=0;
    public $data_p='';
    public $opisanie='';
    public function validate()
    {
        if (!empty($this->firstname) &&
            !empty($this->lastname) &&
            !empty($this->patronymic) &&
            !empty($this->pol_id) &&
            !empty($this->vozrast)&&
            !empty($this->pos_id)&&
            !empty($this->data_p) &&
            !empty($this->opisanie)) {
            return true;
        }
        return false;
        //return false;
    }
}