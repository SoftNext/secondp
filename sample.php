


<?php
$link = mysql_connect ('172.31.12.34', 'micar', 'micar@123');
if (!$link) {
   die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>
