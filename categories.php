<?php require'inc.php';head('Menu');echo"<h2>Food Categories</h2><div class=grid>";
foreach(rows("SELECT * FROM categories WHERE status=1") as $c)echo"<div class=card>".img($c['image'])."<h3>".e($c['name'])."</h3><small>".e($c['description'])."</small><p><a class=btn href='products.php?cat={$c['id']}'>View Dishes</a></p></div>";
echo"</div>";foot();
