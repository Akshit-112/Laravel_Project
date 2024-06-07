
<!DOCTYPE html>
<html>
<head>
    <title>List of Languages </title>
</head>
<body>
<ul>
    <?php
    foreach($languages as $language):?>
        <li><?php echo $language; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>

