<?php require'inc.php';need();$co=$_SESSION['co']??null;$it=items();if(!$co||!$it){header('Location: cart.php');exit;}$t=total($it);
if(isset($_POST['pay'])){$m=$co['method'];
$s=q("INSERT INTO orders(user_id,name,email,mobile,billing,address,city,state,pincode,total,payment_method,payment_status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)",'issssssssdss',$_SESSION['uid'],$co['name'],$co['email'],$co['mobile'],$co['billing'],$co['address'],$co['city'],$co['state'],$co['pincode'],$t,$m,$m=='COD'?'Pending':'Paid');$oid=$s->insert_id;
foreach($it as $p){q("INSERT INTO order_items(order_id,product_id,name,price,qty) VALUES(?,?,?,?,?)",'iisdi',$oid,$p['id'],$p['name'],price($p),$p['qty']);q("UPDATE products SET stock=GREATEST(stock-?,0) WHERE id=?",'ii',$p['qty'],$p['id']);}
$_SESSION['cart']=[];unset($_SESSION['co']);header("Location: success.php?id=$oid");exit;}
head('Payment');echo"<h2>Payment</h2><p>Method: <b>".e($co['method'])."</b> · Amount: <b>₹".number_format($t)."</b></p><form method=post>";
if($co['method']=='UPI')echo"UPI ID<input required placeholder=name@upi>";
if($co['method']=='Card')echo"Card number<input required maxlength=16 pattern='\d{16}'>Expiry<input required placeholder=MM/YY>";
echo"<button name=pay>Confirm & Place Order</button></form><small>Demo payment — no real transaction.</small>";foot();
