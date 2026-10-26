<?php require'inc.php';$m='';if($_POST){q("INSERT INTO contacts(name,email,message) VALUES(?,?,?)",'sss',$_POST['name'],$_POST['email'],$_POST['message']);$m='Thanks! We will get back to you.';}
head('Contact');?><h2>Contact Us</h2><p>📍 12 Food Street, Surat, Gujarat · 📞 +91 98765 43210 · ✉️ support@foodiego.com</p>
<?=$m?"<div class=msg>$m</div>":''?><form method=post>Name<input name=name required>Email<input name=email type=email required>Message<textarea name=message required></textarea><button>Send</button></form><?php foot();
