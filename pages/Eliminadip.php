<?php
	//connessione al database
	$conn = mysql_connect("localhost", "root", "") or die('Connessione fallita: ' . mysql_error());//connessione al server MySQL
	$Db = mysql_select_db("smartmuseum", $conn) or die('Connessione fallita: ' . mysql_error()); //seleziono il db
	
	

	//Inserimento in tabella
	//prende tutti i campi di un form e li inserisce in variabili
	$ID = $_POST["ID"];

	
	$ParzRes = mysql_query("SELECT * from dipendente where '$ID' = IDdip");
	$trovato = mysql_num_rows($ParzRes); 
	if($trovato == 0) { echo "<script type='text/javascript'>alert('Dipendente non trovato');</script>";
		header("Refresh:0; URL=inputdipdel.php");
	}
	else{
		$res = mysql_fetch_row($ParzRes);
		$update = "DELETE FROM dipendente WHERE IDDip = '$ID'";
		$res = mysql_query($update);
		if(!$res)
			die ("Errore nella query" .mysql_error() );
			header("Refresh:0; URL=dipendenti.php");
		}
	
	if($query)
	{
		echo "<script> alert('Eliminazione avvenuta con successo')</script>";
		header("Refresh:0; URL=dipendenti.php");
	}
	mysql_close($conn);
?>