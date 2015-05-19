<?php

function getPresidents() {
    $presidents = array(
        array('firstName'=>'George', 'lastName'=>'Washington'),
        array('firstName'=>'Abraham', 'lastName'=>'Lincoln'),
        array('firstName'=>'Barack', 'lastName'=>'Obama'),
        array('firstName'=>'Bill', 'lastName'=>'Clinton'),
        array('firstName'=>'George', 'lastName'=>'Bush'),
    );

    return $presidents;
}

function getFilterOption() {
    $result = '';
    $filterOption = '';

    if (isset($_GET['filterOptions'])) {
        $filterOption = $_GET['filterOptions'];
    }

    switch ($filterOption) {
        case 'firstName':
            $result = 'firstName';
            break;
        case 'lastName':
            $result = 'lastName';
            break;
        default:
            $result = 'firstName';
            break;
    }

    return $result;
}

function sortPresidentsCallback($sortColumn) {
    return function ($pres1, $pres2) use($sortColumn) {
        if ($pres1[$sortColumn] < $pres2[$sortColumn]) {
            return -1;
        }
        else if ($pres1[$sortColumn] > $pres2[$sortColumn]) {
            return 1;
        }
        else {
            return 0;
        }
    };
}

function createModel() {
    $model['presidents'] = getPresidents();
    $filterOn = getFilterOption();
    usort($model['presidents'], sortPresidentsCallback($filterOn));
    return $model;
}

