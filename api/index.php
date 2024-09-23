<?php

$data['status'] = 'ERROR';
$data['data'] = null;


if (isset($_GET['option'])) {

    switch ($_GET['option']) {

        case 'status':
            define_response($data, 'API RUNNING OK!');
            break;

        case 'random':
            define_response($data, rand(0, 1000));
            break;
    }
}

response($data);

function define_response(&$data, $value)
{
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

function response($data_response)
{
    header('Content-Type:application/json');
    echo json_encode($data_response);
}
