<?php
/*
Template Name: Login
*/

if($_POST) {

    global $wpdb;

    $username = $wpdb->escape($_REQUEST['username']);
    $password = $wpdb->escape($_REQUEST['password']);
    $remember = $wpdb->escape($_REQUEST['rememberme']);

    if($remember) $remember = "true";
    else $remember = "false";

    $login_data = array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    $login_data['remember'] = $remember;

    $user_verify = wp_signon( $login_data, false );

    if ( is_wp_error($user_verify) ){
        header("Location: " . home_url() . "/login?error=true");
    } else {
        echo "<script>window.location='". home_url() ."'</script>";
        exit();
    }

}
get_header();
?>
<div class="login__wrapper">
    <h2 class="login__title">Log in to your account</h2>
    <div class="login__form">
        <div class="login__message">
            <p class="login__message-text" id="message"></p>
        </div>
        <form id="login" name="form" action="<?php echo home_url(); ?>/login/" method="post">
            <p class="login__name">
                <input id="username" type="text" placeholder="login" name="username">
            </p>
            <p class="login__paswword">
                <input id="password" type="password" placeholder="Password" name="password">
            </p>
            <input id="submit" type="submit" name="submit" value="Send">
        </form>
    </div>
    <p class="login_forgot"><a href="<?= home_url(); ?>/lost-password/">Forgot password</a></p>
</div>
<script>
    let message = document.getElementById('message');
    if(location.search.indexOf('error')>-1){
        message.innerHTML='Invalid credentials';
        message.innerHTML+='<br>Enter again or go to the page <a href="<?php echo home_url(); ?>/register">registration</a>';
    }
</script>
<?php
get_footer();
?>

