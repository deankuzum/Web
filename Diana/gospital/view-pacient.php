<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $pacient = (new PacientMap())->findViewById($id);
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
                    <li><a href="list-pacient.php">Пациенты</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-pacient.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    
                    <tr>
                        <th>ФИО</th>
                        <td><?=$pacient->user_id;?></td>
                    </tr>

                    <tr>
                        <th>Номер палаты</th>
                        <td><?=$pacient->num_palata;?></td>
                    </tr>

                    <tr>
                        <th>Диагноз</th>
                        <td><?=$pacient->diagnoz;?></td>
                    </tr>

                    <tr>
                        <th>Дата выписки</th>
                        <td><?=$pacient->vipiska_data;?></td>
                    </tr>

                    <tr>
                        <th>Причина выписки</th>
                        <td><?=$pacient->vipiska_id;?></td>
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