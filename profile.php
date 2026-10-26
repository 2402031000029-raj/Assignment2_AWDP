<?php require'inc.php';need();$m='';
if($_POST){$s=q("UPDATE users SET name=?,email=?,mobile=?,address=?,city=?,state=?,pincode=? WHERE id=?",'sssssssi',$_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['pincode'],$_SESSION['uid']);$m=$s->errno?'Email already used':'Profile updated';}
$u=row("SELECT * FROM users WHERE id=?",'i',$_SESSION['uid']);head('Profile');echo"<h2>My Profile</h2>".($m?"<div class=msg>$m</div>":"")."<form method=post>";
foreach(['name'=>'Name','email'=>'Email','mobile'=>'Mobile','address'=>'Address','city'=>'City','state'=>'State','pincode'=>'Pincode'] as $k=>$l)echo"$l<input name=$k required value='".e($u[$k])."'>";echo"<button>Update</button></form>";foot();
