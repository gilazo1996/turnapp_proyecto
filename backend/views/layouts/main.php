<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap5\NavBar;

$id_google = $_SESSION['userData']['oauth_uid'];
$conn = new mysqli('localhost', 'root', '', 'turn_app_base');
$sql = mysqli_query($conn," SELECT rol FROM usuarios WHERE oauth_uid = '$id_google' ");

$filaSql=mysqli_fetch_array($sql, MYSQLI_ASSOC);

$mostrar;

if ($filaSql["rol"] == "cliente")
$mostrar = 1;
else if ($filaSql["rol"] == "admin")
$mostrar = 2;

//rbac, redireccion si el usuario no es admin
    $nombre = $_SESSION['userData']['first_name'];


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php

        $inicio = "";

        if ($mostrar==1)
        {

    NavBar::begin([
        'brandLabel' => '<div style="display:flex;"><img src="https://septum.com.ar/wp-content/uploads/2021/08/SEPTUM-iconos-04.png" 
                style="vertical-align:top; height:5vh;"/>' . '&nbsp<h class="text-white">'.Yii::$app->name.'</h></div>',
                'brandUrl' => "http://localhost/turnapp_proyecto/backend/web",
                'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);}
    else{
    
    NavBar::begin([
        'brandLabel' => '<div style="display:flex;"><img src="https://septum.com.ar/wp-content/uploads/2021/08/SEPTUM-iconos-04.png" 
                style="vertical-align:top; height:5vh;"/>' . '&nbsp<h class="text-white">'.Yii::$app->name.'</h></div>',
        'brandUrl' => "http://localhost/turnapp_proyecto/backend/web/site/indexadmin",
                'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);}

   /* $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
    ];*/
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        //'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Iniciar', 'url' => ['/site/login']];
        //$menuItems[] = ['label' => 'Usuario', 'url' => ['../../']];
        if ($mostrar==1)
            echo '<span style="color:#AAA;text-align:center;">(Usuario)</span>';
        else
            echo '<span style="color:#AAA;text-align:center;">(Admin)</span>';


    }     
    
    if (Yii::$app->user->isGuest) {
        //echo Html::tag('div',Html::a('Perfil',['*'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        
        echo Html::tag('div',Html::a($nombre,['../../index.php'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
