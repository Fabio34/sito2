<?php
$er = "";
//connessione al database
$conn = mysql_connect("localhost", "root", "");
if(!$conn)
{
	die("Unable to connect to database" .mysql_error());
	header("location: loginform.php");	//da modificare il percorso di redirect
	exit();
}
$Db = mysql_select_db("smartmuseum", $conn);	//seleziono la tabella di riferimento

//Inserimento in tabella
	//prende tutti i campi di un form e li inserisce in variabili
	$NumPassaporto = $_POST["NumPassaporto"];
	$Titolo = $_POST["Titolo"];
	$Autore = $_POST["Autore"];
	$Periodo = $_POST["Periodo"];
	$Categoria = $_POST["Categoria"];
	$Locazione = $_POST["Locazione"];
	$Cultura = $_POST["Cultura"];
	$Dominio = $_POST["Dominio"];
	$Materiali = $_POST["Materiali"];
	$Tecniche = $_POST["Tecniche"];
	$Condizioni = $_POST["Condizioni"];
	$Valore = $_POST["Valore"];
	$Originale = $_POST["Originale"];
	$Origini = $_POST["Origini"];
	$NomeProprietario = $_POST["NomeProprietario"];
	$IDProprietario = $_POST["IDProprietario"];
	$Descrizione = $_POST["Descrizione"];
	//$FileA = $_POST["FileAudio"];
	$FileV = $_POST["FileVideo"];
	$FileF = $_POST["FileFoto"];

	//controllo che non sia già presente in tabella
	if(mysql_num_rows( mysql_query("SELECT NumPassaporto FROM reperto WHERE '$NumPassaporto' = reperto.NumPassaporto") ) != 0 )
	{
		echo "<script type='text/javascript'>alert('Passaporto già presente');</script>";
		header("Refresh:0; URL=loginform.php");
	}

	//query per l'inserimento
	$query = "insert into reperto values (
		'$NumPassaporto', '$Titolo', '$Autore', '$Periodo', '$Categoria', '$Locazione',
		'$Cultura', '$Dominio', '$Materiali', '$Tecniche', '$Condizioni', '$Valore',
		'$Originale', '$Origini', '$NomeProprietario', '$IDProprietario', '$Descrizione')";

	$res = mysql_query($query);	//inserimento nel db
	if(!$res)	{//la query non viene eseguita
		die("Unable to complete the query)" .mysql_error());
		header("location: loginform.php");	//da modificare il percorso di redirect
		exit();
	}
	if($FileV) {	//se è stato caricato un video eseguo la query
				$ins_file = mysql_query("INSERT INTO multimedia VALUES ('', '$NumPassaporto', '$FileV')");
	}
	if($FileF) {	//se è stata caricata una foto eseguo la query
				$ins_file = mysql_query("INSERT INTO multimedia VALUES ('', '$NumPassaporto', '$FileF')");
	}

mysql_close($conn);	//Disconnessione dal database
exit();
?>
