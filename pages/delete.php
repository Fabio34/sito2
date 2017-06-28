<?php
$connect = mysql_pconnect("localhost", "root", "");
if(!$connect) {
	$str= "<script type='text/javascript'>alert(Unable to reach the database');</script>";
	echo $str;
	header("Refresh:0; URL=loginform.php");
}

$db = mysql_select_db("smartmuseum", $connect);
//$db = mysql_select_db(, $connect);

$NumPassaporto = $_POST['NumPassaporto'];

$temp = mysql_query("SELECT NumPassaporto FROM reperto WHERE '$NumPassaporto' = reperto.NumPassaporto");
if(mysql_num_rows($temp) == 0) {	//ovvero nessun reperto con quel passaporto
	$str2= "<script type='text/javascript'>alert('Numero passaporto non trovato!');</script>";
	echo $str2;
	header("Refresh:0; URL=loginform.php");
}

$query_destroy = "delete from reperto where '$NumPassaporto' = reperto.NumPassaporto";
$res = mysql_query($query_destroy);

//se ci sono file multimediali
if(mysql_num_rows( mysql_query("SELECT * FROM multimedia WHERE '$NumPassaporto' = multimedia.NumPassaporto") ) > 0)
	$multi_des = mysql_query("DELETE FROM multimedia WHERE '$NumPassaporto' = multimedia.NumPassaporto");

mysql_close($connect);
?>
