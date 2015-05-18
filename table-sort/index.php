<?php

$presidents = array(
    array('firstName'=>'George', 'lastName'=>'Washington'),
    array('firstName'=>'Abraham', 'lastName'=>'Lincoln'),
    array('firstName'=>'Barack', 'lastName'=>'Obama'),
    array('firstName'=>'Bill', 'lastName'=>'Clinton'),
    array('firstName'=>'George', 'lastName'=>'Bush'),
);

$filterOn = 'firstName';

try {
    // the use of isset will avoid the exception throwing
    if (isset($_GET['filterOptions'])) {
        $filterOn = $_GET['filterOptions'];
    }
} catch (Exception $e) {

}

function sortPresidents($sortColumn) {
    return function ($pres1, $pres2) use($sortColumn) {
        // I don't know if I like doing this check here, but I don't know
        // where else it would be proper to check it.
        // $sortColumn could be anything really...
        $sortColumn = $sortColumn === 'default' ? 'firstName' : $sortColumn;
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

usort($presidents, sortPresidents($filterOn));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>

<form method="get" action="index.php">
    <select name="filterOptions" id="filterOptions">
        <option value="default">Select Option</option>
        <option value="firstName">First Name</option>
        <option value="lastName">Last Name</option>
    </select>
    <input value="Filter" type="submit"/>
</form>

<table>
    <thead>
        <tr>
            <td>First</td><td>Last</td>
        </tr>
    </thead>
    <tbody>
<!--        I wish there was a way to separate this php and html-->
        <?php
            foreach($presidents as $president) {
                echo "<tr>";
                echo "  <td>{$president['firstName']}</td><td>{$president['lastName']}</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

</body>
</html>