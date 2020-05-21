<?php


class pacient extends Table
{
    public $pac_id=0;
    public $user_id=0;
    public $num_palata=0;
    public $diagnoz='';
    public $vipiska_data='';
    public $vipiska_id=0;

    public function validate()
    {
        if (!empty($this->user_id) &&
            !empty($this->num_palata) &&
            !empty($this->diagnoz) &&
            !empty($this->vipiska_data) &&
            !empty($this->vipiska_id)) {
            return true;
        }
        return false;
        //return false;
    }

}