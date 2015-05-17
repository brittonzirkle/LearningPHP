<?php

$model['firstName'] = $_POST['firstName'];
$model['food'] = $_POST['food'];
$model['output'] = 'unknown';

function validateFirstName($value) {
    $expression = '/^[a-zA-Z]{1,}$/';
    $isValid = preg_match($expression, $value);

    if ($isValid !== 1) {
        throw new Exception('Exception: Input for name is invalid');
    }
}

function validateFood($value) {
    $expression = '/^[a-zA-Z\s]{1,}$/';
    $isValid = preg_match($expression, $value);

    if ($isValid !== 1) {
        throw new Exception('Exception: Input for food is invalid');
    }
}

function controller(&$model) {
    try {
        validateFirstName($model['firstName']);
        validateFood($model['food']);
        $model['output'] = $model['firstName'] ."'s favorite food is ". $model['food'];

    } catch (Exception $e) {
        $model['output'] = $e->getMessage();
    }
}

controller($model);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<p>
    <?php echo $model['output']; ?>
</p>

</body>
</html>