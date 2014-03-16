
<?php

define('AJAX_SCRIPT', true);

/**
* NO_MOODLE_COOKIES - we don't want any cookie
*/
define('NO_MOODLE_COOKIES', true);

echo 'josh';
require_once(dirname(dirname(__FILE__)) . '/config.php');
require_once($CFG->dirroot . '/webservice/lib.php');

echo $OUTPUT->header();

// authenticate the user
$token = required_param('token', PARAM_ALPHANUM);
$webservicelib = new webservice();
$authenticationinfo = $webservicelib->authenticate_user($token);

// check the user can manage his own files (can upload)
$context = context_user::instance(4);
$result = array("contextid"=>$context->id);
echo json_encode($result);

?>