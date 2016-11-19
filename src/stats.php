<?php
global $argv;

require 'stats_json.php';
require 'stats_human.php';

$data = file_get_contents('http://nanowrimo.org/wordcount_api/wcregion/usa-missouri-st-louis');
$xml = new SimpleXMLElement($data);
$name = $xml->rname;
$size = $xml->numparticipants;
$halo = $xml->numdonors;
$word = $xml->region_wordcount;
$cash = number_format(floatval($xml->donations), 2);

if ($argv != null && count($argv) > 1) {
    if (strcmp("--json", $argv[1]) == 0) {
        processAsJson($word, $name, $size, $halo, $cash);
    } else if (strcmp("--human", $argv[1]) == 0) {
        processAsText($word, $name, $size, $halo, $cash);
    } else if (strcmp("--help", $argv[1]) == 0 || strcmp("--info", $argv[1]) == 0) {
        echo <<<TAG
stats <option>
   --human (default) - human readable stats output.
   --json - read and write stats file in JSON format.
   --help - this help (also, --info).\n
TAG;
    }
} else {
    processAsText($word, $name, $size, $halo, $cash);
}


