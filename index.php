<?php require'inc.php';head('Home');
echo"<div class=banner><h1>Hungry? Get it delivered hot!</h1><p>Fresh meals from local kitchens</p><a class=btn style='background:#fff;color:#e23744' href=categories.php>Order Now</a></div><h2>Featured Categories</h2><div class=grid>";
foreach(rows("SELECT * FROM categories WHERE status=1 LIMIT 6") as $c)echo"<div class=card>".img($c['image'])."<h3>".e($c['name'])."</h3><a class=btn href='products.php?cat={$c['id']}'>View</a></div>";
echo"</div><h2>Featured Dishes</h2>";grid("SELECT * FROM products WHERE status=1 AND featured=1 LIMIT 8");
echo"<h2>🔥 Offers</h2>";grid("SELECT * FROM products WHERE status=1 AND discount>0 ORDER BY discount DESC LIMIT 4");
echo"<h2>New Arrivals</h2>";grid("SELECT * FROM products WHERE status=1 ORDER BY id DESC LIMIT 4");foot();
