<?php
	$loginname=$_POST["loginname"];
	$i=$_POST["i"];
	$title=$_POST["title"];
	$describe=$_POST["describe"];
	$classify=$_POST["classify"];
	$want=$_POST["want"];
	$login=file("eswap/$loginname/goods/$i/inf.txt",FILE_IGNORE_NEW_LINES);	
	$info=array($title,$describe,$classify,$want,date("Y-m-d h:ia"));
	$info1=implode("\n", $info);
	file_put_contents("eswap/$loginname/goods/$i/inf.txt", $info1);
	header("Location:goods.php?i=$i");

?>