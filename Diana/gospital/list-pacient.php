<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$pacientMap = new PacientMap();
$count = $pacientMap->count();
$pacients = $pacientMap->findAll($page*$size-$size, $size);
$header = 'Список пациентов ';
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-pacient.php">Добавить пациентов</a>

            </div>
            <div class="box-body">
            <?php
            if ($pacients) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Номер Палаты</th>
                <th>Диагноз</th>
                <th>Дата выписки</th>
                <th>Причина выписки</th>
                
            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($pacients as $pacient) {
            echo '<tr>';
            echo '<td><a href="view-user.php?id='.$pacient->pac_id.'">'.$pacient->user_id.'</a> '. '<a href="add-pacient.php?id='.$pacient->pac_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($pacient->num_palata).'</td>';
            echo '<td>'.($pacient->diagnoz).'</td>';
            echo '<td>'.($pacient->vipiska_data).'</td>';
            echo '<td>'.($pacient->vipiska_id).'</td>';
            echo '</tr>';
            }
            ?>
            </tbody>
            </table>
            <?php } else {
            echo 'Ни одного пациента не найдено';
            } ?>
            </div>
            <div class="box-body">
                <?php Helper::paginator($count, $page,$size); ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>