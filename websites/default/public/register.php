

<?php
include 'header.php';
include 'connection.php';
?>

<form action="register.php" method="POST">
    <label>name</label> <input type="text" name="name" />
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="register" name="register" />
</form>

<?php
if(isset($_POST['register'])){
    $query = $pdo->prepare('INSERT INTO user(name, email, password)
    VALUES( :name, :email, :password)');

    $upassword = $_POST['password'];

    $hash = password_hash($upassword, PASSWORD_DEFAULT);


    $values = [
        'name'=> $_POST['name'],
        'password'=> $hash,
        'email'=> $_POST['email']
    ];

    $query->execute($values);
    echo'user registered';

}

?>




<?php
include 'footer.php';
?>