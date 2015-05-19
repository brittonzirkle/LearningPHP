<?php

require 'php/sort-presidents.php';
$model = createModel();

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
        <?php
            foreach($model['presidents'] as $president) {
                echo "<tr>";
                echo "  <td>{$president['firstName']}</td><td>{$president['lastName']}</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

</body>
</html>