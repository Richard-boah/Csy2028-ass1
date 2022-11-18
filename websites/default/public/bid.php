<?php
include 'header.php';
require 'connection.php';

$id = $_GET['id'];

$query = $pdo->prepare('INSERT INTO bid(bid_amount, auctionid )
VALUES( :bid_amount, :auctionid )');


$values = [
    'bid_amount'=> $_POST['bid_amount'],
    'auctionid'=> $id
];

$query->execute($values);

echo'<a href="auction.php?id='.$id.'>Bid Placed Go Back</a>';
include 'footer.php';

?>