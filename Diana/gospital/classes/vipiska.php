<?php


class vipiska extends Table
{
    public $vipiska_id=0;
    public $name='';
    
    public function validate()
    {
        if (!empty($this->name)) {
            return true;
        }
        return false;
        //return false;
    }
}