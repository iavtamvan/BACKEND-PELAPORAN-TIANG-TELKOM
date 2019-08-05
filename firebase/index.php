<?php
// Enabling error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

require_once __DIR__ . '/firebase.php';
require_once __DIR__ . '/push.php';

$firebase = new Firebase();
$push = new Push();

// optional payload
$payload = array();
$payload['team'] = 'India';
$payload['score'] = '5.6';

// notification title
$title = isset($_GET['title']) ? $_GET['title'] : '';

// notification message
$message = isset($_GET['message']) ? $_GET['message'] : '';

// notification rule
$rule = isset($_GET['rule']) ? $_GET['rule'] : '';


// push type - single user / topic
$push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';

// whether to include to image or not
//        $include_image = isset($_GET['include_image']) ? TRUE : FALSE;
$include_image = isset($_GET['include_image']) ? $_GET['include_image'] : '';


$push->setTitle($title);
$push->setMessage($message);
$push->setRule($rule);
if ($include_image) {
    $push->setImage($include_image);
} else {
    $push->setImage('');
}
$push->setIsBackground(FALSE);
$push->setPayload($payload);


$json = '';
$response = '';

if ($push_type == 'topic') {
    $json = $push->getPush();
    $response = $firebase->sendToTopic('global', $json);
} else if ($push_type == 'individual') {
    $json = $push->getPush();
    $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
    $response = $firebase->send($regId, $json);
}
$responses['tittle'] = $title;
$responses['message'] = $message;
$responses['push_type'] = $push_type;
$responses['regId'] = $regId;
$responses['rule'] = $rule;
$responses['include_image'] = $include_image;

echo json_encode($responses);


?>