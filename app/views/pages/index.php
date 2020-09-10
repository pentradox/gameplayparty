

<?php include APPROOT."/views/fragments/header.php"; ?>

<ul>

<?php
    foreach ($data['bikes'] as $bike) {
        echo "<li>" . $bike->name . " heeft radius " . $bike->radius .
        " km</li>";
    }
?>

</ul>

<?php include APPROOT."/views/fragments/footer.php"; ?>

