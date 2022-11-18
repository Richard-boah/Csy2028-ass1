<?php
include 'header.php';
include 'connection.php';
$query = $pdo->prepare('SELECT * FROM auction ORDER BY auctionEndDate ASC LIMIT 10 ');
$query->execute();
   
echo'
<h1>Latest Listings </h1>
			<ul class="productList">';
            while ($rowOfAuction = $query->fetch()){
                $query2 = $pdo->prepare('SELECT name FROM category WHERE categoryId =  '.$rowOfAuction['categoryId'].'');
                $query2->execute();
                $catName = $query2->fetch();

				$currentAuctionId = $rowOfAuction['auctionid'];
				$query3 = $pdo->prepare("SELECT * FROM bid WHERE auctionid ='$currentAuctionId' ORDER BY bid_amount  DESC LIMIT 1; ");
                $query3->execute();
                $currentBid = $query3->fetch();
echo'				<li>
					<img src="product.png" alt="product name">
					<article>';
						echo'<h2>'.$rowOfAuction['title'].'</h2>';
						echo'<h3>'.$catName['name'].'</h3>';
						echo'<p>'.$rowOfAuction['description'].'</p>';
						echo'<p>'.$rowOfAuction['auctionEndDate'].'</p>';						
						echo'<p class="price">Current bid: £';
						$bidCheck = $query3->rowCount();
						if($bidCheck > 0 ){
							echo' '.$currentBid['bid_amount'].'</p>';}
						else{
							echo'No bid!!</p>';} ;
						echo'<a href="auction.php?id='.$rowOfAuction['auctionid'].'"class="more auctionLink">More &gt;&gt;</a>';
					echo'</article>
				</li>';
            }


include 'footer.php';
?>