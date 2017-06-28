<?php
	//connessione al database
	$conn = mysql_connect("localhost", "root", "") or die('Connessione fallita: ' . mysql_error());//connessione al server MySQL
	$Db = mysql_select_db("smartmuseum", $conn) or die('Connessione fallita: ' . mysql_error()); //seleziono il db
	
	//controllo che l'indirizzo email non sia gia presente
	$Email = $_POST["Email"];
	$query = mysql_query("SELECT * from dipendente where '$Email' = Email");
	$trovato = mysql_num_rows($query); 
	if($trovato == 0) 
	{
		$CodiceFiscale = $_POST["CodiceFiscale"];
		$query = mysql_query("SELECT * from dipendente where '$CodiceFiscale' = CodiceFiscale");
		$trovato = mysql_num_rows($query); 
		if($trovato == 0) 
		{
			//Inserimento in tabella
			//prende tutti i campi di un form e li inserisce in variabili
			$Nome = $_POST["Nome"];
			$Cognome = $_POST["Cognome"];
			$DataNascita = $_POST["DataNascita"];
			$Citta = $_POST["Citta"];
			$Sesso = $_POST["Sesso"];
			$Password = $_POST["Password"];
			
			//CRIPTAZIONE PASSWORD
			$Hash= hash('sha512', $Password);
			
			//query per l'inserimento
			$query = "INSERT INTO dipendente VALUES ('', '$Nome', '$Cognome', '$DataNascita', '$Citta', '$Sesso', '$CodiceFiscale', '$Email', '$Hash', '')";
			mysql_query($query);
			if($query){echo "<script type='text/javascript'>alert('Inserimento avvenuto con successo');</script>";
				header("Refresh:0; URL=admin.php");
			}
			else {echo "<script type='text/javascript'>alert('Inserimento fallito');</script>";
				header("Refresh:0; URL=formdipendente.php");
			}
		}
		else {echo "<script type='text/javascript'>alert('ATTENZIONE! Codice Fiscale già presente');</script>";
			header("Refresh:0; URL=formdipendente.php");
		}
	}
	else  {echo "<script type='text/javascript'>alert('ATTENZIONE! Indirizzo Email già presente');</script>";
		header("Refresh:0; URL=formdipendente.php");
	}
	
	//Disconnessione dal database
	mysql_close($conn);	
	?>