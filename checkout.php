<?php require'inc.php';need();$it=items();if(!$it){header('Location: cart.php');exit;}
if($_POST){$_SESSION['co']=$_POST;header('Location: payment.php');exit;}
$u=row("SELECT * FROM users WHERE id=?",'i',$_SESSION['uid']);head('Checkout');echo"<h2>Checkout</h2><table>";
foreach($it as $p)echo"<tr><td>".e($p['name'])." × {$p['qty']}<td>₹".number_format($p['sub']);
echo"<tr><th>Total<th>₹".number_format(total($it))."</table><form method=post>";
foreach(['name'=>'Name','email'=>'Email','mobile'=>'Mobile','billing'=>'Billing Address','address'=>'Shipping Address','city'=>'City','state'=>'State','pincode'=>'Pincode'] as $k=>$l)echo"$l<input name=$k required value='".e($k=='billing'?$u['address']:$u[$k])."'>";
echo"Payment Method<select name=method><option value=COD>Cash on Delivery<option value=UPI>UPI<option value=Card>Card</select><button>Continue to Payment</button></form>";foot();
