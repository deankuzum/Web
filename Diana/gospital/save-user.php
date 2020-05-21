<?php
    require_once 'autoload.php';
    
    if (isset($_POST['user_id'])) {
        //print_r($_POST);
        $user = new User();
        $user->lastname = Helper::clearString($_POST['lastname']);
        $user->user_id= Helper::clearInt($_POST['user_id']);
        $user->firstname = Helper::clearString($_POST['firstname']);
        $user->patronymic = Helper::clearString($_POST['patronymic']);
        $user->pol_id = Helper::clearInt($_POST['pol_id']);
        $user->vozrast = Helper::clearInt($_POST['vozrast']);
        $user->pos_id = Helper::clearInt($_POST['pos_id']);
        $user->data_p = Helper::clearString($_POST['data_p']);
        $user->opisanie = Helper::clearString($_POST['opisanie']);
        //print_r($user);
        if ((new UserMap())->save($user)) {
            header('Location: view-user.php?id='.$user->user_id);
        }  
        else {
            if ($user->user_id) {
                header('Location: add-user.php?id='.$user->user_id);
            } 
            else {
                header('Location: add-user.php');
            }
        }
    }