<?php require'inc.php';$err='';
if($_POST){$u=row("SELECT * FROM users WHERE email=? AND status=1",'s',$_POST['email']);
if($u&&password_verify($_POST['password'],$u['password'])){$_SESSION['uid']=$u['id'];header('Location: '.(preg_match('/^\w+\.php$/',$_GET['next']??'')?$_GET['next']:'index.php'));exit;}$err='Invalid credentials or account disabled';}
head('Login');echo"<h2>Login</h2>".(isset($_GET['ok'])?"<div class=msg>Registered! Please log in.</div>":"").($err?"<div class=msg>$err</div>":"")."<form method=post>Email<input name=email type=email required>Password<input name=password type=password required><button>Login</button></form><p>New? <a href=register.php>Register</a></p>";foot();
