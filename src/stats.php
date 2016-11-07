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

if ($argv != null && count($argv) > 1 ? strcmp("--json", $argv[1]) == 0 : false) {
    processAsJson($word, $name, $size, $halo, $cash);
} else {
    processAsText($word, $name, $size, $halo, $cash);
}


