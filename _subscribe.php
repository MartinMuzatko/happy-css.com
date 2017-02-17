<?php
define('APIKEY', 'a93e5bae2e1cad274c8204323b6809c2');

$groupsApi = (new MailerLiteApi\MailerLite(APIKEY))->groups();
$subscriber = [
    'email' => $_POST['email'],
    'fields' => [
        'name' => $_POST['name']
    ]
];
$response = $groupsApi->addSubscriber(5840611, $subscriber);
echo json_encode($response);
