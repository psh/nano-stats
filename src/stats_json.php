<?php

/**
 * @param $word
 * @param $name
 * @param $size
 * @param $halo
 * @param $cash
 */
function processAsJson($word, $name, $size, $halo, $cash)
{
    $exists = file_exists("nanowrimo-stats.json");
    date_default_timezone_set('America/Chicago');
    $now = date("d M", time());
    if ($exists) {
        $file = file_get_contents("nanowrimo-stats.json");
        $data = json_decode($file);

        $replace = false;
        $index = 0;
        for ($i = 0; !$replace && $i < count($data->aaData); $i++) {
            if (strcmp($data->aaData[$i][0], $now) == 0) {
                $replace = true;
                $index = $i;
            }
        }

        if ($replace) {
            $daily = $index > 0 ? $word - $data->aaData[$index - 1][2] : intval($word);
            $r = $index > 0 ? $data->aaData[$index][3] : 0;
            $data->aaData[$index] = array(
                $now, intval($daily), intval($word), $r, intval($size), "$" . $cash, intval($halo)
            );
        } else {
            $index = count($data->aaData) - 1;
            $daily = $index > 0 ? $word - $data->aaData[$index][2] : intval($word);
            $r = $index > 0 ? $data->aaData[$index][3] : 0;
            $data->aaData[] = array(
                $now, intval($daily), intval($word), $r, intval($size), "$" . $cash, intval($halo)
            );
        }
    } else {
        $data = Array("aaData" =>
            array(
                $now, intval($word), intval($word), 0, intval($size), "$" . $cash, intval($halo)
            )
        );
    }
    echo "FILE: \n" . json_encode($data, JSON_PRETTY_PRINT) . "\n";
}
