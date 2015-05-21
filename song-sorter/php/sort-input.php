<?php

function getInput() {

    $songs = null;

    foreach ($_POST as $key=>$value) {
        $inputArray = explode('-', $key);
        $inputCount = count($inputArray);

        if ($inputCount === 2) {

            $inputIndex = -1;

            switch ($inputArray[0]) {
                case 'artist':
                case 'song':
                case 'delete':
                    $inputIndex = $inputArray[1];
                    $songs[$inputIndex][$key] = $value;
                    break;
            }
        }

    }

    return $songs;
}

$songs = getInput();

print_r($songs);