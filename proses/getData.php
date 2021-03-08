<?php
$dataCsv = [];
$dataFix = [];
$file = fopen("../data/file.csv", "r");
while (!feof($file)) {
    $data = fgetcsv($file);
    // var_dump($data);
    if (!$data[1]) {
        # code...
        $transkrip = substr($data[0], 14);
        array_push($data, substr($transkrip, 0, strlen($transkrip) - 1));
        $name_audio = substr($data[0], 0, 12);
        $data[0] = $name_audio;
        // var_dump($name_audio);
    }
    // echo "<br>";
    array_push($dataCsv, $data);
}
fclose($file);

// var_dump($dataCsv);
array_pop($dataCsv);
foreach ($dataCsv as $key => $value) {
    // var_dump($value[0]);
    // var_dump($value[2]);
    if (!array_key_exists("2", $value)) {
        if ($value[0] == "nama_audio") {
            # code...
            array_push($dataCsv[$key], "note");
        } else {
            array_push($dataCsv[$key], "");
        }
    }
}

echo json_encode($dataCsv);
