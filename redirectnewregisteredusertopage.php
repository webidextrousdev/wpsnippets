<?php
/**
 * Redirect a newly registered user to a specific page
 */

function wps_registration_redirect(){
return home_url( '/finished/' );
}
add_filter( 'registration_redirect', 'wps_registration_redirect' );