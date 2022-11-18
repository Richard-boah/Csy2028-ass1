<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<link rel="stylesheet" href="ibuy.css" />
	</head>

	<body>
		<header>
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form action="#">
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" name="submit" value="Search" />
			</form>
		</header>

		<nav>
			<ul>
			<li><a class="CategoryLink" href="index.php">home</a></li>
                <li><a class="CategoryLink" href="login.php">Login</a></li>
				<li><a class="CategoryLink" href="adminlogin.php">Admin</a></li>
                <li><a class="CategoryLink" href="register.php">Register</a></li>
                <?php
                include 'connection.php';

                $query = $pdo->prepare('SELECT * FROM category');
                $query->execute();
                while($cat = $query->fetch()){
                    echo'<li><a class="CategoryLink" href="category.php?id='.$cat['categoryId'].'">'.$cat['name'].'</a></li>';
                }
                
                ?>
			</ul>
		</nav>
		<img src="banners/1.jpg" alt="Banner" />