

<?php
include 'header.php';
include 'connection.php';
?>

<form action="login.php" method="POST">
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="Login" name="login" />
</form>


<?php

if(isset($_POST['login'])){
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $values = [
        'email' => $_POST['email']
    ];
    $stmt->execute($values);

    if ($stmt->rowCount() > 0) {
        $_SESSION['loggedin'] = true;
        echo 'You are now logged in';
    }
    else {
        echo 'Sorry, your username and password could not be found';
    }
};


?>
<?php
include 'footer.php';
?>