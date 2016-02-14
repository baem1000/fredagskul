<?php

/*
  Plugin Name: Subscription form
  Plugin URI: 
  Description: Formuläret för nya prenumeranter
  Version: 1.0
  Author: Fredagskul.se
  Author URI: 
 */

function custom_registration_function() {
    registration_form($email);
    if (isset($_POST['submit'])) {
        registration_validation(
            $_POST['email']
        );
        
        // sanitize user form input
        global $email;
        $email      =   sanitize_email($_POST['email']);

        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration($email);
    } 
}

function registration_form( $email ) {

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
        <div class="form-group row row-sm">
            <div class="col-sm-8">
               <input type="text" name="email" value="' . (isset($_POST['email']) ? $email : null) . '" placeholder="din@epost.se" class="form-control input-lg">
            </div>
            <div class="col-sm-4">
               <input type="submit" name="submit" value="Prenumerera" class="btn btn-success btn-lg btn-block"/>
            </div>
        </div>
    </form>
    ';
}

function registration_validation( $email )  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( !is_email( $email ) ) {
        $reg_errors->add('email_invalid', 'Ogiltig e-postadress');
    }

    if ( email_exists( $email ) ) {
        $reg_errors->add('email', 'E-postadressen finns redan registrerad');
    }

    if ( is_wp_error( $reg_errors ) ) {

        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div class="alert alert-warning text-center"><i class="fa fa-exclamation-triangle"></i> ';
            echo $error;
            echo '</div>';
        }
    }
}

function complete_registration() {
    global $reg_errors, $username, $password, $email;
    if ( count($reg_errors->get_error_messages()) < 1 ) {

        $userdata = array(
        'user_login'    =>  $email,
        'user_email'    =>  $email,
        );

        $user = wp_insert_user( $userdata );

        echo '<div class="alert alert-success text-center"><i class="fa fa-check"></i> Tack för din anmälan!</div>';  

        // mail to administrators

        $admins = get_users( 'role=administrator' );
        foreach ( $admins as $user ) {
            $to .= esc_html( $user->user_email ). ";";
        } 
        $subject = 'Ny prenumerant';
        $message = 'Hej!<br>Fredagskul.se har fått en ny prenumerant:<br><div style="padding: 10px; text-align: center; background: #eee; margin: 10px 0px; border-radius: 5px; font-size: 18px;">' . $email . '</div>Med vänliga hälsningar<br>Fredagskul.se';
        $headers = "From: info@fredagskul.se\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers);
 
    }
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode('subscription_form', 'custom_registration_shortcode');

// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
