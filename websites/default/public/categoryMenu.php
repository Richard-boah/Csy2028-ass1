<?php
include 'header.php';
include 'connection.php';




?>
<li><a href="addCategory.php"> Add category</a></li>

<ul>
<?php

include 'connection.php';
    $query = $pdo->prepare('SELECT * FROM category');

    $query->execute();

    foreach($query as $row){

        echo '<h2>' . $row['name'] . '</h2>';
        echo '<li><a href="deletecategory.php?categoryId='. $row['categoryId'].'">'. 'delete ' . $row['name']. '</a></li>';
        echo '<li><a href="editcategory.php?categoryId='. $row['categoryId'].'">'. 'edit ' . $row['name']. '</a></li>';

    }


?>

</ul>

    <?php
   


include 'footer.php';
?>