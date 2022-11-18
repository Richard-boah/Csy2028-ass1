<?php
require 'header.php';
require 'connection.php';

$id = $_GET['id'];

$query = $pdo->prepare('SELECT * FROM auction WHERE auctionid =  '.$id.'');
$query->execute();


echo'<ul class="productList">';
echo'<h1> Auction </h1>';

while($rowOfauction = $query->fetch() ){
echo'<section class="product">';
    echo'<li>';
    echo'<h3> title:     '.   $rowOfauction['title'] . '</h3><br></br>';
    echo'<h3> description: '. $rowOfauction['description'] . '</h3><br></br>';
    echo'<h3> end date: '. $rowOfauction['auctionEndDate'] . '</h3><br></br>';
    echo'</li>';
echo'</section>';

echo'</ul>';

echo'<form action="bid.php?id='.$rowOfauction['auctionid'].'"method="POST">';
echo'<input type="text" name="bid_amount" placeholder="0.00">';
echo'<input type="submit" value="BID" name="placeBid">';
echo'</form>';

};

require 'footer.php';
?>