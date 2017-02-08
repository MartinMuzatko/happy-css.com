<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$method = $_SERVER['REQUEST_METHOD'];
//$json = ['message'=>'NONE'];
$maxChars = 4;
//$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));


switch ($method) {
    case 'POST':
        $pageFields = json_decode(file_get_contents('php://input'));

        // if page exists:
        // http_response_code(409); - conflict

        // create new page, if not already there
        //$p = new Page();
        // content-text
        // content-code
        // content-cta
        // content-media
        // content-preview
        // $p->template = 'content-';
        // $p->parent = $page;
        // $p->score_name = $scoreName;
        // $p->score = $score;
        //$p->of(false); // turns off output formatting
        //$p->title = 'score';
        //$p->save();

        http_response_code(201);
        $json = ['id'=>$id];
    break;
    case 'PUT':
        if($user->hasPermission('page-edit', $page)) {
            $pageFields = json_decode(file_get_contents('php://input'));
            foreach ($pageFields as $field => $value) {
                echo $field . " " . $value;
                $page->$field = $value;
                //$json[$field] = [$page->${field}];

            }
            $page->setOutputFormatting(false);
            $page->save();

            $json = ['message'=>'RESOURCE UPDATED'];
            http_response_code(201);
        } else {
            $json = ['message'=>'NOACCESS'];
        }
    break;
    case 'GET':
        $json = [];
        $additionalFields = [
            'created' => $page->created.'000',
            'published' => $page->published.'000',
            'modified' => $page->modified.'000',
            'createdUser' => $page->createdUser->name,
            'modifiedUser' => $page->modifiedUser->name,
            'children' => (string) $page->children,
            'parent' => (string) $page->parent,
        ];
        foreach ($fields->find('*') as $field) {
            $json[$field->name] = htmlentities($page->{$field->name});
        }
        foreach ($additionalFields as $field => $value) {
            $json[$field] = $value;
        }
    break;
    default:
        //handle_error($request);
    break;
}
//ob_clean();
//header('Access-Control-Allow-Origin: https://martinmuzatko.github.io');
//header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//http_response_code(200);


echo json_encode($json);
