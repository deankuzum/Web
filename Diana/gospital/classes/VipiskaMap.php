<?php


class VipiskaMap extends BaseMap
{ 
    public function arrVipiska(){
        $res = $this->db->query("SELECT vipiska_id AS id, name AS value FROM vipiska");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
} 