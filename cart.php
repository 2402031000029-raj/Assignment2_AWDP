<?php require'inc.php';$c=&$_SESSION['cart'];$c=$c??[];
if(isset($_POST['add'])){$id=(int)$_POST['add'];$c[$id]=($c[$id]??0)+max(1,(int)($_POST['qty']??1));header('Location: '.(isset($_POST['buy'])?'checkout.php':'cart.php'));exit;}
if(isset($_GET['inc']))$c[(int)$_GET['inc']]++;
if(isset($_GET['dec'])){$i=(int)$_GET['dec'];if(--$c[$i]<1)unset($c[$i]);}
if(isset($_GET['rm']))unset($c[(int)$_GET['rm']]);
if($_GET){header('Location: cart.php');exit;}
head('Cart');echo"<h2>Your Cart</h2>";$it=items();
if(!$it)echo"<p>Cart is empty.</p>";else{echo"<table><tr><th>Item<th>Price<th>Qty<th>Subtotal<th></tr>";
foreach($it as $p)echo"<tr><td>".e($p['name'])."<td>₹".number_format(price($p))."<td><a href='?dec={$p['id']}'>−</a> {$p['qty']} <a href='?inc={$p['id']}'>+</a><td>₹".number_format($p['sub'])."<td><a href='?rm={$p['id']}'>✕</a></tr>";
echo"</table><h3>Total: ₹".number_format(total($it))."</h3><a class=btn href=checkout.php>Proceed to Checkout</a>";}foot();
