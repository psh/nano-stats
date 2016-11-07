<?php

/**
 * @param $word
 * @param $name
 * @param $size
 * @param $halo
 * @param $cash
 */
function processAsText($word, $name, $size, $halo, $cash)
{
    $prefix = $word == 0 ? 'no' : $word;
    $suffix = $word == 1 ? '' : 's';

    echo $name . " has " . $size .
        " participants, with " . $halo .
        " halos and has raised $" . $cash .
        ".  Collectively the region has written " . $prefix .
        " word" . $suffix . ".\n";
}

