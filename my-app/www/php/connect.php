<?php
$con = mysql_connect("sql301.0fees.net","fees0_14337243","j3qxtbh9");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("fees0_14337243_snapchat",$con);
?> 