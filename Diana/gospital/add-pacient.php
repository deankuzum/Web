<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$pacient = (new PacientMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Пациента';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-pacient.php">Пациенты</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-pacient.php" method="POST">
        <div class="form-group">
            <label>ФИО</label>
            <select class="form-control" name="user_id">
            <?= Helper::printSelectOptions($pacient->user_id, (new UserMap())->arrUser());?>
            </select>
        </div>

        <div class="form-group">
                <label>Номер палаты</label>
                <input type="text" class="form-control" name="num_palata" required="required" value="<?=$pacient->num_palata;?>">
        </div>
        <div class="form-group">
                <label>Диагноз</label>
                <input type="text" class="form-control" name="diagnoz" required="required" value="<?=$pacient->diagnoz;?>">
        </div>
        <div class="form-group">
                <label>Дата выписки</label>
                <input type="date" class="form-control" name="vipiska_data" required="required" value="<?=$pacient->vipiska_data;?>">
        </div>

        <div class="form-group">
            <label>Причина выписки</label>
            <select class="form-control" name="vipiska_id">
            <?= Helper::printSelectOptions($pacient->vipiska_id, (new VipiskaMap())->arrVipiska());?>
            </select>
        </div>

        <!--Кнопка сохранения -->  
        <div class="form-group">
            <button type="submit" name="savePacient" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="pac_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>