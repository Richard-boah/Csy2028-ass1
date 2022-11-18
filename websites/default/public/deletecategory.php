<?php
include 'header.php';




?>
<li><a href="categorymenu.php"> view category</a></li>

<ul>
<?php

include 'connection.php';
    $query = $pdo->prepare('DELETE FROM category
                            WHERE categoryId = :categoryId');


    $values = [
        'categoryId' => $_GET['categoryId']
    ];
    $query->execute($values);



?>

</ul>

    <?php
   


include 'footer.php';
?>