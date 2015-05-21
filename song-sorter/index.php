<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<form action="sorted-songs.php" method="post">

    <label for="filterOptions">Sort On:</label>
    <select name="filterOptions" id="filterOptions">
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
            <td><input name="artist-1" type="text"/></td>
            <td><input name="song-1" type="text"/></td>
            <td><input name="delete-1" type="checkbox"/></td>
        </tr>
        <tr>
            <td><input name="artist-2" type="text"/></td>
            <td><input name="song-2" type="text"/></td>
            <td><input name="delete-2" type="checkbox"/></td>
        </tr>
        </tbody>
    </table>

    <input type="submit" value="Submit"/>

</form>

</body>
</html>