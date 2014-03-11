<?php
  function timeago($difference)
{
    $seconds = $difference % 60;            //seconds
	$difference = floor($difference / 60);
	$min = $difference % 60;              // min
	$difference = floor($difference / 60);
	$hours = $difference % 24 ;  //hours
	$difference = floor($difference / 24);
	$days= $difference % 24 ;  //days
	if($days>0){
	if($days == 1)
		echo "<td>" . $days . " day ago" . "</td>";
	else
		echo "<td>" . $days . " days ago" . "</td>";
	}
	else if($hours>0){
	if($hours == 1)
		echo "<td>" . $hours . " hour ago" . "</td>";
	else
		echo "<td>" . $hours . " hours ago" . "</td>";
	}
	else if($min>0){
	if($min == 1)
		echo "<td>" . $min . " minute ago" . "</td>";
	else
		echo "<td>" . $min . " minutes ago" . "</td>";
	}		
	else{
	if($seconds == 1)
		echo "<td>" . $seconds . " second ago" . "</td>";
	else
		echo "<td>" . $seconds . " seconds ago" . "</td>";
	}
}

  function timeago2($difference)
{
    $seconds = $difference % 60;            //seconds
	$difference = floor($difference / 60);
	$min = $difference % 60;              // min
	$difference = floor($difference / 60);
	$hours = $difference % 24 ;  //hours
	$difference = floor($difference / 24);
	$days= $difference % 24 ;  //days
	if($days>0){
	if($days == 1)
		echo  $days . " day ago" ;
	else
		echo  $days . " days ago" ;
	}
	else if($hours>0){
	if($hours == 1)
		echo  $hours . " hour ago" ;
	else
		echo  $hours . " hours ago" ;
	}
	else if($min>0){
	if($min == 1)
		echo  $min . " minute ago" ;
	else
		echo  $min . " minutes ago" ;
	}		
	else{
	if($seconds == 1)
		echo  $seconds . " second ago" ;
	else
		echo  $seconds . " seconds ago" ;
	}
}
?> 