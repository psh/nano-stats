<?php
  $data = file_get_contents('http://nanowrimo.org/en/word_count_scoreboard');

  $table = strpos($data, "<table class='sortable'>");

  $st_louis = strpos($data, '/regions/usa-missouri-st-louis', $table);

  $count = substr_count($data, '<tr>', $table, $st_louis-$table)-1;

  echo "St Louis is at rank ".$count." on the word count scoreboard.\n"

?>
