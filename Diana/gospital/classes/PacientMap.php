<?php


class PacientMap extends BaseMap
{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT pac_id, user_id, num_palata, diagnoz, vipiska_data, vipiska_id ". "FROM pacient WHERE pac_id = $id");
            return $res->fetchObject("Pacient");
        }
        return new Pacient();
    }
    
    public function save(Pacient $pacient){
        if ($pacient->validate()) {
            if ($pacient->pac_id == 0) {
                return $this->insert($pacient);
            }  
            else {
                return $this->update($pacient);
            }
        }
        return false;
    }

    private function insert(Pacient $pacient){
        $num_palata = $this->db->quote($pacient->num_palata);
        $diagnoz = $this->db->quote($pacient->diagnoz);
        $vipiska_data = $this->db->quote($pacient->vipiska_data); 

        if ($this->db->exec("INSERT INTO pacient(pac_id, user_id, num_palata, diagnoz, vipiska_data, vipiska_id ) VALUES($pacient->pac_id, $pacient->user_id, $num_palata, $diagnoz, $vipiska_data, $pacient->vipiska_id)") == 1) {
            return true;
        }
    return false;
    }

    private function update(Pacient $pacient){
        $diagnoz = $this->db->quote($pacient->diagnoz);
        $vipiska_data = $this->db->quote($pacient->vipiska_data);
        if ( $this->db->exec("UPDATE pacient SET user_id = $pacient->user_id, num_palata = $pacient->num_palata, diagnoz = $diagnoz,". " vipiska_data= $vipiska_data, vipiska_id=$pacient->vipiska_id  ". "WHERE pac_id = ".$pacient->pac_id) == 1) {
        return true;
        }
    return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT  pac_id, user_id, num_palata, diagnoz, vipiska_data, vipiska_id ". " FROM pacient LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM pacient");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT  pac_id, user_id, num_palata, diagnoz, vipiska_data, vipiska_id ". " FROM pacient WHERE pac_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }

}