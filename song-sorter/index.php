<?php

require_once 'php/sort-input.php';

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
        <tr>
            <td><input name="songs[0]['artist']" type="text"/></td>
            <td><input name="songs[0]['song']" type="text"/></td>
            <td><input name="songs[0]['delete']" type="checkbox"/></td>
        </tr>
        <tr>
            <td><input name="new-song['artist']" type="text"/></td>
            <td><input name="new-song['song']" type="text"/></td>
        </tr>
        </tbody>
    </table>

    <input type="submit" value="Submit"/>

</form>

</body>
</html>