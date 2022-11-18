

<?php
include 'header.php';
include 'connection.php';
?>

<form action="addCategory.php" method="POST">
    <label>name</label> <input type="text" name="name" />

    <input type="submit" value="add" name="addCat" />
</form>

<?php
if(isset($_POST['addCat'])){
    $query = $pdo->prepare('INSERT INTO category(name)
    VALUES( :name)');

    $values = [
        'name'=> $_POST['name']
    ];

    $query->execute($values);
    echo'category added';
    echo'<li><a href="categoryMenu.php"> go back</a></li>';

}

?>




<?php
include 'footer.php';
?>