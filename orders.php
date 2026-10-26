<?php require'inc.php';need();head('My Orders');
if(isset($_GET['id'])){$o=row("SELECT * FROM orders WHERE id=? AND user_id=?",'ii',(int)$_GET['id'],$_SESSION['uid']);if($o)orderView($o);echo"<a href=orders.php>← Back</a>";}
else{echo"<h2>Order History</h2><table><tr><th>ID<th>Date<th>Items<th>Total<th>Payment<th>Status<th></tr>";
foreach(rows("SELECT o.*,(SELECT SUM(qty) FROM order_items WHERE order_id=o.id) n FROM orders o WHERE user_id=? ORDER BY id DESC",'i',$_SESSION['uid']) as $o)echo"<tr><td>#{$o['id']}<td>{$o['created_at']}<td>{$o['n']}<td>₹".number_format($o['total'])."<td>{$o['payment_method']}<td>{$o['status']}<td><a href='?id={$o['id']}'>Details</a></tr>";echo"</table>";}foot();
