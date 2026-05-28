<?php
$categories = ["Football Gear", "Basketball Footwear", "Gym Apparel", "Fitness Accessories"];
echo "<h3>Available Sports Categories:</h3><ul>";
foreach ($categories as $item) {
    echo "<li>" . htmlspecialchars($item) . "</li>";
}
echo "</ul>";
?>