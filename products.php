<?php require'inc.php';head('Dishes');$id=(int)($_GET['cat']??0);$c=row("SELECT * FROM categories WHERE id=?",'i',$id);
echo"<h2>".e($c['name']??'Category not found')."</h2><div class=grid>";
foreach(rows("SELECT * FROM products WHERE category_id=? AND status=1",'i',$id) as $p)echo card($p);echo"</div>";foot();
