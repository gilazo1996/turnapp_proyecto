<?php
// Include configuration file
require_once 'google_config.php';

// Include User library file
require_once 'class/class_user.php';

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
        $output  = '<h1>Su perfil de Turnapp</h1>';
        $output .= '<div class="ac-data">';
        //$output .= '<img src="'.$userData['picture'].'">';
       // $output .= '<p><b>Google ID:</b> '.$userData['oauth_uid'].'</p>';
        
        $output .= '<p>Nombre: '.$userData['first_name'].' '.$userData['last_name'].'</p>';
        $output .= '<p>Email: '.$userData['email'].'</p>';
        //$output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>';
        //$output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>';
        //$output .= '<p><b>Logged in with:</b> Google</p>';
       // $output .= '<p><a href="'.$userData['link'].'" target="_blank">Click to visit Google+</a></p>';
        $output .= '<p> <a href="http://localhost/turnapp_proyecto/backend/web/">Ir a la pagina principal</a></p>';
        $output .= '<br> <br> <p><a href="logout.php">Cerrar sesion</a></p>';
        $output .= '</div>';
    } else {
        $output = '<h3 style="color:red">Hubo un error, intente de nuevo.</h3>';
    }
} else {
    // Get login url
    $authUrl = $gClient->createAuthUrl();
    
    // Render google login button
    $output  = '<h1>Bienvenido a Turnapp!</h1>';
    $output  .= '<h2>Para continuar inicie sesion en Google</h1>';
    $output .= '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="image/sign-in-with-google.svg" alt="sign-in-with-google" /></a>';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>logeophp</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php echo $output; ?>
    </div>
</div>
</body>
</html>