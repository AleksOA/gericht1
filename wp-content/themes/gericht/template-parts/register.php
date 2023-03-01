<?php
/*
Template Name: Register
*/

require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;

if ($user_ID) {


    header( 'Location:' . home_url() );

} else {
    $errors = array();

    if( $_POST ) {


        $username = $wpdb->escape($_REQUEST['username']);
        if ( strpos($username, ' ') !== false ) {
            $errors['username'] = "Sorry, spaces can't be used in usernames";
        }

        if(empty($username)) {
            $errors['username'] = "Please enter user name";
        } elseif( username_exists( $username ) ) {

            $errors['username'] = "Username already exists, please try another one";
        }


        $email = $wpdb->escape($_REQUEST['email']);
        if( !is_email( $email ) ) {
            $errors['email'] = "Please enter a valid email";
        } elseif( email_exists( $email ) ) {
            $errors['email'] = "This email is already registered";
        }


        if(0 === preg_match("/.{6,}/", $_POST['password'])){
            $errors['password'] = "Password must be at least six characters long";
        }


        if(0 !== strcmp($_POST['password'], $_POST['password_confirmation'])){
            $errors['password_confirmation'] = "Password mismatch";
        }



        if(0 === count($errors)) {

            $password = $_POST['password'];

            $new_user_id = wp_create_user( $username, $password, $email );



            $success = 1;

            header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );

        } else {
            $message = 'There are errors in filling out the form';
        }
    }
}
?>

<?php get_header(); ?>
<div class="registration_wrapper">
    <h2 class="registration__title">Create a free account</h2>
    <div class="registration__form">
        <div class="registration__message">
            <p id="message"><?= isset( $message ) ? $message  : '' ?></p>
        </div>
        <form id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" style="max-width: 500px">

            <p class="registration__name">
                <input type="text" name="username" id="username" placeholder="Name" value="<?= isset( $_REQUEST['username'] ) ? $_REQUEST['username']  : '' ?>">
                <span class="error"><?= isset( $errors['username'] ) ? $errors['username']  : '' ?></span>
            </p>
            <p class="registration__email">
                <input type="text" name="email" id="email" placeholder="Email" value="<?= isset( $_REQUEST['email'] ) ? $_REQUEST['email']  : '' ?>">
                <span class="error"><?= isset( $errors['email'] ) ? $errors['email']  : '' ?></span>
            </p>
            <p class="registration__password">
                <input type="password" name="password" id="password" placeholder="Password" value="<?= isset( $_REQUEST['password'] ) ? $_REQUEST['password']  : '' ?>">
                <span class="error"><?= isset( $errors['password'] ) ? $errors['password']  : '' ?></span>
            </p>
            <p class="registration__password-confirmation">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat password" value="<?= isset( $_REQUEST['password_confirmation'] ) ? $_REQUEST['password_confirmation']  : '' ?>">
                <span class="error"><?= isset( $errors['password_confirmation'] ) ? $errors['password_confirmation']  : '' ?></span>
            </p>
            <div class="registration__submit">
                <input type="submit" id="submitbtn" name="submit" value="Register" />
            </div>

        </form>
    </div>
</div>

<?php
get_footer();
?>
