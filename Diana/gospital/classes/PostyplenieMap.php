<?php


class PostyplenieMap extends BaseMap
{
    public function arrPostyplenie(){
        $res = $this->db->query("SELECT pos_id AS id, name AS value FROM postyplenie");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}