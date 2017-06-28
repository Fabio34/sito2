<?php
session_start();
function isLoggedIn()
{
	if(isset($_SESSION['email']))
	{
		return true;
	} else
	{
		return false;
	}
}

if (!isLoggedIn())
{
	$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel=\'shortcut icon\' type=\'image/x-icon\' href=\'../img/favicon.ico\' />

	<title>Reperti management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href=\'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\' rel=\'stylesheet\' type=\'text/css\'>
    <link href=\'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic\' rel=\'stylesheet\' type=\'text/css\'>

	<!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Theme CSS -->
    <link href="../css/creative.min.css" rel="stylesheet">

	<style>
		#repButton
		{
			margin: 10px;
		}

		#dipButton
		{
			margin: 10px;
		}

		#welcome
		{
			color: #F05F40;
		}

		#divback
		{
			text-align: center;
		}
	</style>
</head>

<body class="bg-dark">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="../index.html">Smart museum</a>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

	<section id="">
		<p align="center">You are not authorized to access the following page.</p>
		<div id="divback">
			<a href = "../index.html" id="backhome">Home</a>
		</div>

    </section>
</body>
</html> ';
	echo $html;
} else
{
	$html2 = '
	<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />

		<title>Reperti management</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">

		<!-- Plugin CSS -->
	    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

		<!-- Theme CSS -->
	    <link href="../css/creative.min.css" rel="stylesheet">

		<style>
			#repButton
			{
				margin: 10px;
			}

			#button
			{
				background-color: #F05F40;
			}

			#divform
			{
				margin-left: 10px;
			}

			#NumPassaporto
			{
				color: #1D1D1D;
			}
		</style>
	</head>

	<body class="bg-dark">
	    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
	        <div class="container-fluid">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
	                </button>
	                <a class="navbar-brand page-scroll" href="../index.html">Smart museum</a>
	            </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
						<li>
	                        <a href="reperti2.php" id="acceso">Reperti</a>
	                    </li>
						<li>
							<a href="logout.php">Logout</a>
						</li>
	                </ul>
	            </div>

	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container-fluid -->
	    </nav>

		<section id="">
		<div id="divform">
			<form method = "POST" action = "insert.php">
				Passaporto: <input type="name" name = "NumPassaporto" style= "color: #1D1D1D" required>
				<br><br>
				Titolo: <input type="text" name = "Titolo" style= "color: #1D1D1D" required>
				Autore: <input type="text" name = "Autore" style= "color: #1D1D1D" required>
				<br><br>
				Periodo: <input type="text" name = "Periodo" style= "color: #1D1D1D">
				Categoria <input type="text" name = "Categoria" style= "color: #1D1D1D" required>
				<br><br>
				Locazione: <input type="text" name = "Locazione" style= "color: #1D1D1D">
				Cultura: <input type="text" name = "Cultura" style= "color: #1D1D1D">
				<br><br>
				Dominio: <input type="text" name = "Dominio" style= "color: #1D1D1D">
				Materiali: <input type="text" name = "Materiali" style= "color: #1D1D1D" required>
				<br><br>
				Tecniche: <input type="text" name = "Tecniche" style= "color: #1D1D1D">
				Condizioni: <input type="text" name = "Condizioni" style= "color: #1D1D1D" required>
				<br><br>
				Valore: <input type="float" name = "Valore" style= "color: #1D1D1D">
				Originale: <select name = "Originale" style= "color: #1D1D1D">
						<option>SI</option>
						<option>NO</option>
					</select>
				Origini: <input type="text" name = "Origini" style= "color: #1D1D1D" required>
				<br><br>
				NomeProprietario: <input type="text" name = "NomeProprietario" style= "color: #1D1D1D" required>
				IDProprietario: <input type="name" name = "IDProprietario" style= "color: #1D1D1D" required>
				<br><br><br>
				Descrizione: <textarea rows="5" cols="80" name="Descrizione" style= "color: #1D1D1D"> </textarea>
				<br>
				File VIDEO <input type = "file" name ="FileVideo" size = "100" >
				<br>
				File FOTO <input type = "file" name ="FileFoto" size = "100" >

				<br><br>

				<input class="button alert" type="submit" value="Invia" id="button">
			</form>
		</div>
	    </section>
		<!-- jQuery -->
	    <script src="../vendor/jquery/jquery.min.js"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	    <!-- Theme JavaScript -->
	    <script src="../js/creative.min.js"></script>
	</body>
	</html>';
echo $html2;
}
?>
