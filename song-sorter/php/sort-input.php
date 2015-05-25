<?php

function createModel()
{
    $model = array();

    $model['songs'] = null;
    $model['request-method'] = 'UNKNOWN';
    $model['errors'] = null;

    return $model;
}

function getFilterOption()
{
    $result = 'artist';

    $filterOption = array_key_exists('filterOption', $_POST) ? $_POST['filterOption'] : '';

    switch ($filterOption)
    {
        case 'artist':
        case 'song':
            $result = $filterOption;
            break;
    }

    return $result;
}

function getInsertedSong()
{
    $insertedSong = null;

    $newSongArray = array_key_exists('new-song', $_POST) ? $_POST['new-song'] : null;

    if ($newSongArray !== null && is_array($newSongArray))
    {
        $artistValue = array_key_exists('artist', $newSongArray) ? $newSongArray['artist'] : '';
        $songValue = array_key_exists('song', $newSongArray) ? $newSongArray['song'] : '';

        if ($artistValue !== '' && $songValue !== '')
        {
            $insertedSong = array('artist'=>$artistValue, 'song'=>$songValue);
        }
    }

    return $insertedSong;
}

function getExistingSongs()
{
    $result = null;

    $songs = array_key_exists('songs', $_POST) ? $_POST['songs'] : null;

    if ($songs !== null && is_array($songs))
    {
        foreach ($songs as $songData)
        {
            if (is_array($songData))
            {
                $isDeleted = array_key_exists('delete', $songData) ? true : false;

                if ($isDeleted === false)
                {
                    $artistValue = array_key_exists('artist', $songData) ? $songData['artist'] : '';
                    $songValue = array_key_exists('song', $songData) ? $songData['song'] : '';

                    if ($artistValue !== '' && $songValue != '')
                    {
                        if ($result === null)
                        {
                            $result = array();
                        }

                        array_push($result, array('artist'=>$artistValue, 'song'=>$songValue));
                    }
                }
            }
        }
    }

    return $result;
}

function sortSongs($filterOption)
{
    return function ($array1, $array2) use($filterOption)
    {
        $result = 0;

        $value1 = $array1[$filterOption];
        $value2 = $array2[$filterOption];

        if ($value1 < $value2)
        {
            $result = -1;
        }
        else if ($value1 > $value2)
        {
            $result = 1;
        }

        return $result;
    };
}

function getSortedSongs($existingSongs, $insertedSong, $filterOption)
{
    $result = $existingSongs;

    if ($insertedSong !== null)
    {
        if ($result === null)
        {
            $result = array();
        }

        array_push($result, $insertedSong);
    }

    if ($result !== null)
    {
        usort($result, sortSongs($filterOption));
    }

    return $result;
}

function run()
{
    $model = createModel();

    $model['request-method'] = $_SERVER['REQUEST_METHOD'];

    if ($model['request-method'] === 'POST')
    {
        $filterOption = getFilterOption();
        $existingSongs = getExistingSongs();
        $insertedSong = getInsertedSong();

        $model['songs'] = getSortedSongs($existingSongs, $insertedSong, $filterOption);
    }

    return $model;
}
