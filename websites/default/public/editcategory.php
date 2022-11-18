<?php
include 'header.php';




?>
<li><a href="categorymenu.php"> view category</a></li>


<?php

include 'connection.php';
if(isset($_POST['submit'])){
    $query = $pdo->prepare('UPDATE category
                            SET name = :name, categoryId = :categoryId
                            WHERE categoryId = :categoryId');


    $values = [
        'categoryId' => $_POST['categoryId'],
        'name' => $_POST['name']
    ];
    $query->execute($values);

}
else if (isset($_GET['categoryId'])){
    $Catquery = $pdo->prepare('SELECT * FROM category WHERE categoryId = :categoryId');
    $values = [
        'categoryId' => $_GET['categoryId']

    ];

    $Catquery->execute($values);
    $Cat = $Catquery->fetch();
    ?>
    <form action="editcategory.php" method="POST">
    <input type="hidden" name="categoryId" value="<?php echo $Cat['categoryId']; ?>" />
    <label>name</label> 
    <input type="text" value="<?php echo $Cat['name']; ?>" name="name" />

<?php

$query = $pdo->prepare('SELECT * FROM category');
$query->execute();

foreach($query as $row){
    if ($row['categoryId'] == $Cat['categoryId']){
        echo'<option value="' . $row['categoryId'] . '" selected="selected">' . '</option>';
    }else{
        echo'<option value="' . $row['categoryId'] . '">' . '</option>';
    }

}

?>
</select>

<input type="submit" name="submit" value="edit">
</form>
<?php
}
   ?>
    <?php
   


include 'footer.php';
?>