<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();

$method = $_SERVER['REQUEST_METHOD'];
//$json = ['message'=>'NONE'];
$maxChars = 4;
//$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));


switch ($method) {
    case 'POST':
        $pageFields = json_decode(file_get_contents('php://input'));
        $scoreName = $sanitizer->text($pageFields->score_name);
        $score = (int) $pageFields->score;
        if (!is_int($score)) {
            $json = ['message'=>'ERROR'];
            break;
        }

        if (strlen($scoreName) > $maxChars) {
            $scoreName = substr($scoreName, 0, $maxChars);
        }

        // create new page, if not already there
        $p = new Page();
        $p->template = 'json';
        $p->parent = $page;
        $p->score_name = $scoreName;
        $p->score = $score;

        $p->of(false); // turns off output formatting

        $p->title = 'score';
        $p->save();
        foreach ($page->children('sort=-score') as $index => $score) {
            if ($score->id == $p->id) {
                $id = $index+1;
            }
        }

        http_response_code(201);
        $json = ['id'=>$id];
    break;
    case 'GET':
        $json = [];
        $scores = $page->children('sort=-score');
        foreach ($scores as $score) {
            $json[] = [
                "name" => $score->score_name,
                "score" => $score->score
            ];
        }

    break;
    default:
        //handle_error($request);
    break;
}
//ob_clean();
header('Access-Control-Allow-Origin: https://martinmuzatko.github.io');
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//http_response_code(200);


$content = json_encode($json);
