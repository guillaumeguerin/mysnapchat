<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
$e = strval($_POST['e']); 
$ne = strval($_POST['ne']);
$np = strval($_POST['np']);
$nn = strval($_POST['nn']);
$nd = strval($_POST['nd']);

include '../connect.php';


if($_POST['nn']!="")
{
$sql = "UPDATE user SET NAME='".$nn."' WHERE EMAIL = '".$e."'";
mysql_query($sql);
}

if($_POST['nd']!="")
{
$sql = "UPDATE user SET DESCRIPTION='".$nd."' WHERE EMAIL = '".$e."'";
mysql_query($sql);
}

if($_POST['np']!="")
{
$sql = "UPDATE user SET PASSWORD='".$np."' WHERE EMAIL = '".$e."'";
mysql_query($sql);
}

if($_POST['ne']!="")
{
$sql = "UPDATE user SET EMAIL='".$ne."' WHERE EMAIL = '".$e."'";
mysql_query($sql);
}


mysql_close($con);
}
?> 