<?php


class UserMap extends BaseMap
{
   
    public function arrUser(){
        $res = $this->db->query("SELECT user_id AS id, CONCAT(user.firstname,' ', user.lastname, ' ', user.patronymic) AS value FROM user");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id,firstname, lastname, patronymic, pol_id, vozrast, pos_id, data_p, opisanie ". "FROM user WHERE user_id = $id");
            return $res->fetchObject("User");
        }
        return new User();
    }
    
    public function save(User $user){
        if ($user->validate()) {
            if ($user->user_id == 0) {
                return $this->insert($user);
            } 
            else {
                return $this->update($user);
            }
        }
        return false;
    }

    private function insert(User $user){
        $lastname = $this->db->quote($user->lastname);
        $firstname = $this->db->quote($user->firstname);
        $patronymic = $this->db->quote($user->patronymic);
        $data_p = $this->db->quote($user->data_p);
        //$opisanie = $this->db->quote($user->opisanie);
        if ($this->db->exec("INSERT INTO user(user_id, firstname, lastname, patronymic, pol_id, vozrast, pos_id, data_p, opisanie) VALUES( $user->user_id, $firstname, $lastname, $patronymic, $user->pol_id, $user->vozrast, $user->pos_id, $data_p, $user->opisanie )") == 1) {
            return true;
        }
    return false;
    }

    private function update(User $user){
        $lastname = $this->db->quote($user->lastname);
        $firstname = $this->db->quote($user->firstname);
        $patronymic = $this->db->quote($user->patronymic);
        if ( $this->db->exec("UPDATE user SET lastname = $lastname, firstname = $firstname, patronymic = $patronymic,". " pol_id= $user->pol_id, vozrast= $user->vozrast, pos_id= $user->pos_id, data_p= $user->data_p, opisanie=$user->opisanie ". "WHERE user_id = ".$user->user_id) == 1) {
        return true;
        }
    return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT user_id,firstname, lastname, patronymic, pol_id, vozrast, pos_id, data_p, opisanie". " FROM user LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM user");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, firstname, lastname, patronymic, pol_id, vozrast, pos_id, data_p, opisanie". " FROM user WHERE user_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }
    
}