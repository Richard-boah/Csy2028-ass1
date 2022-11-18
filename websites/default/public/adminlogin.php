<?php
include 'header.php';


if(isset($_POST['login'])) {

    if ($_POST['email'] === 'admin@gmail.com' && $_POST['password'] === 'password'){

        $_SESSION['loggedin'] = true;

        echo '<p> corrcet</p>';
        echo '<a href="categoryMenu.php"> go back</a>';



    }else{
echo '<p> incorccet</p>';
echo '<a href="adminlogin.php"> category menu</a>';


    }


}











else{

?>
<form action="adminlogin.php" method="POST">
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="Login" name="login" />
</form>
<?php
}
?>

<?php
include 'footer.php';
?>