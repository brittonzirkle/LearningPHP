<?php

function createModel() {
    $model['songs'] = null;
    $model['filterOption'] = 'artist';
    $model['request-method'] = 'UNKNOWN';
    return $model;
}

function getRequestMethod() {
    $request = 'UNKNOWN';
    $request = $_SERVER['REQUEST_METHOD'];
    return $request;
}

function getFilterOption() {
    $filterOption = 'artist';
    $isFilterOptionSet = isset($_POST['filterOption']);

    if ($isFilterOptionSet) {
        $optionValue = $_POST['filterOption'];
        switch ($optionValue) {
            case 'artist':
                $filterOption = 'artist';
                break;
            case 'song':
                $filterOption = 'song';
                break;
        }
    }

    return $filterOption;
}

function getInsertedSong() {
    $insertedSong = null;

    if (isset($_POST['new-song'])) {
        if (is_array($_POST['new-song'])) {
            $newSongArray = $_POST['new-song'];
            $artistValue = array_key_exists('artist', $newSongArray) ? $newSongArray['artist'] : '';
            $songValue = array_key_exists('song', $newSongArray) ? $newSongArray['song'] : '';

            if ($artistValue !== '' && $songValue !== '') {
                $insertedSong = array('artist'=>$artistValue, 'song'=>$songValue);
            }
        }
    }

    return $insertedSong;
}

function getExistingSongs() {
    $existingSongs = array();

    if (isset($_POST['songs'])) {
        if (is_array($_POST['songs'])) {
            $songs = $_POST['songs'];
            foreach ($songs as $songData) {
                if (is_array($songData)) {
                    // not really good logic here...
                    $isDeleted = array_key_exists('delete', $songData) ? true : false;

                    if ($isDeleted === false) {
                        $artistValue = array_key_exists('artist', $songData) ? $songData['artist'] : '';
                        $songValue = array_key_exists('song', $songData) ? $songData['song'] : '';

                        if ($artistValue !== '' && $songValue != '') {
                            $songEntry = array('artist'=>$artistValue, 'song'=>$songValue);
                            array_push($existingSongs, $songEntry);
                        }
                    }
                }
            }
        }
    }

    return $existingSongs;
}

// need to define the sort function...
function sortSongs($filterOption) {
    return function($array1, $array2) use($filterOption) {
	$result = 0;

        $value1 = $array1[$filterOption];
        $value2 = $array2[$filterOption];

	if ($value1 < $value2) {
        $result = -1;
	}
	else if ($value1 > $value2) {
        $result = 1;
	}

	return $result;
    };
}

function run() {
    $model = createModel();

    $model['request-method'] = getRequestMethod();

    if ($model['request-method'] === 'POST') {
        $model['filterOption'] = getFilterOption();
        $model['songs'] = getExistingSongs();

        // need a null check here...
        $insertedSong = getInsertedSong();
        // this should happen inside another function...
        // need to be sure model['songs'] is not null...
        if ($insertedSong !== null) {
            array_push($model['songs'], $insertedSong);
        }

        // sort the model['songs'] array...
	    usort($model['songs'], sortSongs($model['filterOption']));
    }

    return $model;
}
