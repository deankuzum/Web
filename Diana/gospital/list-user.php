<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$userMap = new UserMap();
$count = $userMap->count();
$users = $userMap->findAll($page*$size-$size, $size);
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

            <a class="btn btn-success" href="add-user.php">Добавить пациентов</a>

            </div>
            <div class="box-body">
            <?php
            if ($users) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Возраст</th>
                <th>Способ поступления</th>
                <th>Дата поступления</th>
                <th>Описание</th>
                
            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($users as $user) {
            echo '<tr>';
            echo '<td><a href="view-user.php?id='.$user->usr_id.'">'.$user->firstname.'</a> '. '<a href="add-user.php?id='.$user->user_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($user->lastname).'</td>';
            echo '<td>'.($user->patronymoc).'</td>';
            echo '<td>'.($user->pol_id).'</td>';
            echo '<td>'.($user->vozrast).'</td>';
            echo '<td>'.($user->pos_id).'</td>';
            echo '<td>'.($user->data_p).'</td>';
            echo '<td>'.($user->opisanie).'</td>';
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