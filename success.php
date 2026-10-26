<?php require'inc.php';need();$o=row("SELECT * FROM orders WHERE id=? AND user_id=?",'ii',(int)($_GET['id']??0),$_SESSION['uid']);head('Order Placed');
if(!$o)echo"Order not found";else{echo"<div class=msg>✅ Order placed successfully!</div>";orderView($o);}
echo"<a class=btn href=categories.php>Continue Shopping</a> <a class=btn href=orders.php>Order History</a>";foot();
