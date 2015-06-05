<?php

require_once 'php/sort-input.php';
$model = run();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>song sorter</title>
    <link rel="stylesheet" href="styles/rg-12.css"/>

    <style>
        .filter-options label { float: right; }
        /*.filter-options select { float: right; }*/
        .mobile-screen label { display: none; }
        .form-input * { margin: 3px 0 3px 0; }
        .rg-grid input[type=text] { width: 100%; }
        .rg-grid input.delete { width: auto; }

        @media all and (max-width:650px) {
            .full-screen-headers { display: none; }
            .mobile-screen label { display: inline; float: right; margin-right: 10px; }
            .filter-options label { float: none; }
            /*.filter-options select { float: none; }*/
            .rg-grid .mobile-screen { border-bottom: 1px solid black; }
            .rg-grid input { display: inline; width: 75%; float: right; }
            .rg-grid input.delete { width: 75%; }
            .rg-grid input[type=text] { width: 75%; }
            .mobile-screen .rg-col-2 { width: 100%; }
        }
    </style>
</head>
<body>


<div class="rg-grid rg-grid-pad-20">

    <div class="rg-col-2"></div>

    <div class="rg-col-8 form-input">

        <form action="index.php" method="post">

            <div class="rg-grid filter-options">

                <div class="rg-col-6">
                    <label for="filterOption">Sort On:</label>
                </div>

                <div class="rg-col-6">
                    <select name="filterOption" id="filterOption">
                        <option value="default">Select Option</option>
                        <option value="artist">Artist</option>
                        <option value="song">Song</option>
                    </select>
                </div>

            </div>

            <div class="rg-grid full-screen-headers">

                <div class="rg-col-5">
                    <label>Artist</label>
                </div>

                <div class="rg-col-5">
                    <label>Song</label>
                </div>

                <div class="rg-col-2">
                    <label>Delete</label>
                </div>

            </div>

    <?php
    if ($model['request-method'] == 'POST')
    {
        $songCount = count($model['songs']);
        for ($songIndex = 0; $songIndex < $songCount; $songIndex++)
        {
            echo
            "<div class=\"rg-grid rg-gutter-20 mobile-screen\">

                <div class=\"rg-col-5\">
                    <input name=\"songs[$songIndex][artist]\" type=\"text\" value=\"{$model['songs'][$songIndex]['artist']}\"/>
                    <label>Artist</label>
                </div>

                <div class=\"rg-col-5\">
                    <input name=\"songs[$songIndex][song]\" type=\"text\" value=\"{$model['songs'][$songIndex]['song']}\"/>
                    <label>Song</label>
                </div>

                <div class=\"rg-col-2\">
                    <input class=\"delete\" name=\"songs[$songIndex][delete]\" type=\"checkbox\"/>
                    <label>Delete</label>
                </div>

            </div>";
        }
    }
    ?>

            <div class="rg-grid rg-gutter-20 mobile-screen">

                <div class="rg-col-5">
                    <label>Artist</label>
                    <input name="new-song[artist]" type="text"/>
                </div>

                <div class="rg-col-5">
                    <label>Song</label>
                    <input name="new-song[song]" type="text"/>
                </div>

                <div class="rg-col-2"></div>

            </div>

            <input type="submit" value="Submit"/>

        </form>

    </div>

    <div class="rg-col-2"></div>

</div>

</body>
</html>