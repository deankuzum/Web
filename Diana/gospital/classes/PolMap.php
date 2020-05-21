<?php


class PolMap extends BaseMap
{
    public function arrPol(){
        $res = $this->db->query("SELECT pol_id AS id, name AS value FROM pol");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}