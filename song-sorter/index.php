<?php

require_once 'php/sort-input.php';
$model = run();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<form action="index.php" method="post">

    <label for="filterOption">Sort On:</label>
    <select name="filterOption" id="filterOption">
        <option value="default">Select Option</option>
        <option value="artist">Artist</option>
        <option value="song">Song</option>
    </select>

    <table>
        <thead>
            <tr>
                <td>Artist</td>
                <td>Song</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
<?php
if ($model['request-method'] == 'POST') {
    $songCount = count($model['songs']);
    for ($songIndex = 0; $songIndex < $songCount; $songIndex++)
    {
        echo
        "<tr>
            <td><input name=\"songs[$songIndex][artist]\" type=\"text\" value=\"{$model['songs'][$songIndex]['artist']}\"/></td>
            <td><input name=\"songs[$songIndex][song]\" type=\"text\" value=\"{$model['songs'][$songIndex]['song']}\"/></td>
            <td><input name=\"songs[$songIndex][delete]\" type=\"checkbox\"/></td>
        </tr>";
    }
}
?>
        <tr>
            <td><input name="new-song[artist]" type="text"/></td>
            <td><input name="new-song[song]" type="text"/></td>
        </tr>
        </tbody>
    </table>

    <input type="submit" value="Submit"/>

</form>

</body>
</html>