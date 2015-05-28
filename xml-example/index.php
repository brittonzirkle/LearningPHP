<?php

libxml_use_internal_errors(true);
$xml = simplexml_load_file("people.xml");

if ($xml !== false)
{
    print_r($xml);

    echo "<br>";
    echo "<br>";

    foreach ($xml->children() as $person)
    {
        echo "$person->name<br>";
        echo "$person->age<br>";
        echo "$person->gender<br>";
        echo "{$person->address->street}<br>";
        echo "{$person->address->city}<br>";
        echo "{$person->address->state}<br>";
        echo "{$person->address->zip}<br>";

        echo "<br>";
    }
}
else
{
    echo "error loading file<br>";

    foreach(libxml_get_errors() as $error)
    {
        echo "$error->message";
    } 
} 
