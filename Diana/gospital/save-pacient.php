<?php
    require_once 'autoload.php';
    
    if (isset($_POST['pac_id'])) {
        //print_r($_POST);
        $pacient = new Pacient();
        $pacient->pac_id = Helper::clearInt($_POST['pac_id']);
        $pacient->user_id = Helper::clearInt($_POST['user_id']);
        $pacient->num_palata= Helper::clearInt($_POST['num_palata']);
        $pacient->diagnoz = Helper::clearString($_POST['diagnoz']);
        $pacient->vipiska_data = Helper::clearString($_POST['vipiska_data']);
        $pacient->vipiska_id = Helper::clearInt($_POST['vipiska_id']);
       
        print_r($user);
        if ((new PacientMap())->save($pacient)) {
            header('Location: view-pacient.php?id='.$pacient->pac_id);
        }  
        else {
            if ($pacient->pac_id) {
                header('Location: add-pacient.php?id='.$pacient->pac_id);
            } 
            else {
                header('Location: add-pacient.php');
            }
        }
    }