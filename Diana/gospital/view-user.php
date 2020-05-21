<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $user = (new UserMap())->findViewById($id);
    $header = 'Просмотр пациента';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="list-user.php">Пациенты</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-user.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    
                    <tr>
                        <th>Имя</th>
                        <td><?=$user->firstname;?></td>
                    </tr>

                    <tr>
                        <th>Фамилия</th>
                        <td><?=$user->lastname;?></td>
                    </tr>

                    <tr>
                        <th>Отчество</th>
                        <td><?=$user->patronymic;?></td>
                    </tr>

                    <tr>
                        <th>Пол</th>
                        <td><?=$user->pol_id;?></td>
                    </tr>

                    <tr>
                        <th>Возраст</th>
                        <td><?=$user->vozrast;?></td>
                    </tr>

                    <tr>
                        <th>Поступление</th>
                        <td><?=$user->pos_id;?></td>
                    </tr>

                    <tr>
                        <th>Дата Поступления</th>
                        <td><?=$user->data_p;?></td>
                    </tr>

                    <tr>
                        <th>Описание</th>
                        <td><?=$user->opisanie;?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
require_once 'template/footer.php';
?>