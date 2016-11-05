<?php
  $data = file_get_contents('http://nanowrimo.org/wordcount_api/wcregion/usa-missouri-st-louis');

  $xml = new SimpleXMLElement($data);

  $name = $xml->rname;
  $size = $xml->numparticipants;
  $halo = $xml->numdonors;
  $word = $xml->region_wordcount;
  $cash = number_format(floatval($xml->donations), 2);

  $prefix = $word == 0 ? 'no' : $word;
  $suffix = $word == 1 ? '' : 's';

  echo $name." has ".$size." participants, with ".$halo." halos and has raised $".$cash.".  Collectively the region has written ".$prefix." word".$suffix.".\n";
?>
