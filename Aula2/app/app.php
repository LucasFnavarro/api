<?php 

define('API_BASE',          'http://localhost/api-php-puro/Aula2/api/index.php?option=');

for($i = 0; $i < 10; $i++)
{
    $resultado = api_request('random&min=100&max=200');
    
    if($resultado['status'] == 'ERROR')
    {
        die('Aconteceu um erro na chamada à API');
    }
    
    echo "O valor randômico é: " . $resultado['data'] . "<br>";
}

echo "<pre>";
print_r($resultado);

function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}