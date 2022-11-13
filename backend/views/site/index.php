<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
/** @var yii\web\View $this */

//$this->title = Yii::$app->name;
?>

<?php //var_dump(Url::toRoute(["turno/index"])); die; ?>





<?php 
// Include configuration file
require_once 'google_config.php';

// Include User library file
require_once '../../class/class_user.php';

if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: '.filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    // Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    // Initialize User class
    $user = new User();
    
    // Getting user profile info
    $gpUserData = array();
    $gpUserData['oauth_uid'] = !empty($gpUserProfile['id'])?$gpUserProfile['id']:'';
    $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:'';
    $gpUserData['last_name'] = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:'';
    $gpUserData['email'] = !empty($gpUserProfile['email'])?$gpUserProfile['email']:'';
    $gpUserData['gender'] = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:'';
    $gpUserData['locale'] = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:'';
    $gpUserData['picture'] = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:'';
    $gpUserData['link'] = !empty($gpUserProfile['link'])?$gpUserProfile['link']:'';
    
    // Insert or update user data to the database
    $gpUserData['oauth_provider'] = 'google';
    $userData = $user->checkUser($gpUserData);
    
    // Storing user data in the session
    $_SESSION['userData'] = $userData;
    
    // Render user profile data
    if (!empty($userData)) {

        $output = '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>';
        $output .= '<div class="site-index" style="margin-bottom: 0%;">';
        $output .= '<div class="jumbotron text-center bg-transparent" style="padding-bottom: 0%;">';
        $output .= '<h1 class="display-4">Bienvenido!</h1>';
        $output .= '<p class="lead">Sistema y Gestión de Turnos.</p>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="text-center bg-transparent md-col-3" style="flex-wrap:wrap; display:flex; justify-content:center; align-items:center">';
        $output .= '<div class="card" style="height:220px; width:300px; margin:3%; background-color:rgb(50,58,64);">';
        $output .= '<div class="card-header">';
        $output .= '<h4 class="card-title text-white"> MIS TURNOS </h4>';
        $output .= '</div>';
        $output .= '<div class="card-body">';
        $output .= '<!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->';
        $output .= '<p class="card-text text-white"> Visualice los turnos ya agendados.</p>';
        $output .= '</div>';
        $output .= '<a href="<?php echo Url::toRoute(["turno/index"]);?>" class="btn btn-danger">Ver mis turnos</a>';
        $output .= '</div>';


        $output .= '<div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">';
        $output .= '<div class="card-header">';
        $output .= '<h4 class="card-title text-white"> CREAR TURNO </h4>';
        $output .= '</div>';
        $output .= '<div class="card-body">';
        $output .= '<!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->';
        $output .= '<p class="card-text text-white"> Realice un nuevo turno que necesite.</p>';
        $output .= '</div>';
        $output .= '<a href="../views/turno/create.php" class="btn btn-danger">Crear turno</a>';
        $output .= '</div>';


        $output .= '<div class="card" style="height:220px; width:300px; margin:3%; background-color: rgb(50,58,64);">';
        $output .= '<div class="card-header">';
        $output .= '<h4 class="card-title text-white"> CALENDARIO </h4>';
        $output .= '</div>';
        $output .= '<div class="card-body">';
        $output .= '<!-- <h5 class="card-title text-white"> MIS TURNOS </h5> -->';
        $output .= '<p class="card-text text-white"> Visualice los turnos en modo calendario.</p>';
        $output .= '</div>';
        $output .= '<a href="event/index.php" class="btn btn-danger">Ver</a>';
        $output .= '</div>';
    
        $output .= '</div>';
        $output .= '<p>Logout from <a href="../views/site/logout.php">Google</a></p>';

        /*
        $output  = '<h2>Google Account Details</h2>';
        $output .= '<div class="ac-data">';
        $output .= '<img src="'.$userData['picture'].'">';
        $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>';
        $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>';
        $output .= '<p><b>Email:</b> '.$userData['email'].'</p>';
        $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>';
        $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>';
        $output .= '<p><b>Logged in with:</b> Google</p>';
        $output .= '<p><a href="'.$userData['link'].'" target="_blank">Click to visit Google+</a></p>';
        $output .= '<p>Logout from <a href="logout.php">Google</a></p>';
        $output .= '</div>';
        */




    } else {
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    // Get login url
    $authUrl = $gClient->createAuthUrl();
    
    // Render google login button
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="../../image/sign-in-with-google.svg" alt="sign-in-with-google" /></a>';
}

 ?>



<div>
    
        <?php echo $output; ?>
    
</div>