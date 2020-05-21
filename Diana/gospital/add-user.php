<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$user = (new UserMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Пациента';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-user.php">Пациенты</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-user.php" method="POST">
    
        <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" name="firstname" required="required" value="<?=$user->firstname;?>">
        </div>
        <div class="form-group">
                <label>Фамилия</label>
                <input type="text" class="form-control" name="lastname" required="required" value="<?=$user->lastname;?>">
        </div>
        <div class="form-group">
                <label>Отчество</label>
                <input type="text" class="form-control" name="patronymic" required="required" value="<?=$user->patronymic;?>">
        </div>
        <div class="form-group">
            <label>Пол</label>
            <select class="form-control" name="pol_id">
            <?= Helper::printSelectOptions($user->pol_id, (new PolMap())->arrPol());?>
            </select>
        </div>
        <div class="form-group">
                <label>Возраст</label>
                <input type="text" class="form-control" name="vozrast" required="required" value="<?=$user->vozrast;?>">
        </div>
        <div class="form-group">
            <label>Поступил</label>
            <select class="form-control" name="pos_id">
            <?= Helper::printSelectOptions($user->pos_id, (new PostyplenieMap())->arrPostyplenie());?>
            </select>
        </div>
        <div class="form-group">
                <label>Дата поступления</label>
                <input type="date" class="form-control" name="data_p" required="required" value="<?=$user->data_p;?>">
        </div>
        <div class="form-group">
                <label>Описание</label>
                <input type="text" class="form-control" name="opisanie" required="required" value="<?=$user->opisanie;?>">
        </div>

        <!--Кнопка сохранения -->  
        <div class="form-group">
            <button type="submit" name="saveUser" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="user_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>