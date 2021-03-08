<?php

// $dataCsv = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), 1);

    var_dump($data);
    $fp = fopen('../data/file.csv', 'w') or die("Unable to open file!");

    foreach ($data as $dataCsv) {
        fputcsv($fp, $dataCsv);
    }

    fclose($fp);
}
