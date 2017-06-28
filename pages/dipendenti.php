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

if(isLoggedIn())
{
$user = $_SESSION['email'];

//connessione al server
$conn = mysql_connect('localhost', 'root', '') or die('Connection failed: ' .mysql_error());
//selezione del database
mysql_select_db('smartmuseum', $conn) or die('Connection failed: ' .mysql_error());		

$query = "SELECT Email FROM dipendente WHERE Email = '$user' and isAdmin = '1'";
$results = mysql_query($query);
$number = mysql_num_rows($results);
}

if (!isLoggedIn() || $number == 0)
{
	session_destroy();
	echo '
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel=\'shortcut icon\' type=\'image/x-icon\' href=\'../img/favicon.ico\' />
	
	<title>Employee management</title>
	
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
} else
{
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
	
	<title>Employee management</title>
	
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
	<link href="../css/metro.css" rel="stylesheet">
	<link href="../css/metro-icons.css" rel="stylesheet">
    <link href="../css/metro-responsive.css" rel="stylesheet">
	
	<script src="../js/jquery-2.1.3.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/metro.js"></script>

	<style>
		#acceso
		{
			color: #F05F40;
		}
		#button
		{
			background-color: #F05F40;
		}
		#table
		{
			background-color: #F2F2F2;
		}
		
		#dato
		{
			color: #1D1D1D;
		}
		
		#divtable
		{
			margin: 20px;
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

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="reperti.php">Reperti</a>
                    </li>
                    <li>
                        <a href="dipendenti.php" id="acceso">Employees</a>
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
		<div id="divtable">		               
                    <h1 class="text-light" align="center">Employees</h1>
                    <hr class="thin bg-grayLighter">
                    <a href="formdipendente.php"><button class="button alert" id="button"></span>New</button></a>       
                    <a href="inputdip.php"><button class="button alert" id="button"></span>Modify</button></a>
                    <a href="inputdipdel.php"><button class="button alert" id="button"></span>Delete</button></a>
					
					<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" id="table"> 
					    <thead>
                        <tr>                         						
                            <td class="sortable-column">ID</td>
							<td class="sortable-column">Name</td>
							<td class="sortable-column">Surname</td>
							<td class="sortable-column">Birth date</td>
                            <td class="sortable-column">City</td>
                            <td class="sortable-column">Sex</td>
							<td class="sortable-column">Fiscal Code</td>
                            <td class="sortable-column">Email</td>
                            <td class="sortable-column">Password</td>
							<td class="sortable-column">Admin</td>
                        </tr>
                        </thead>';

						$query = mysql_query("SELECT * FROM dipendente"); 
						while($cicle=mysql_fetch_array($query)){
							
							echo "<tr><td id='dato'>".$cicle['IDDip']."</td>";
							echo "<td id='dato'>".$cicle['Nome']."</td>";
							echo "<td id='dato'>".$cicle['Cognome']."</td>";
							echo "<td id='dato'>".$cicle['DataNascita']."</td>";
							echo "<td id='dato'>".$cicle['Citta']."</td>";
							echo "<td id='dato'>".$cicle['Sesso']."</td>";
							echo "<td id='dato'>".$cicle['CodiceFiscale']."</td>";
							echo "<td id='dato'>".$cicle['Email']."</td>";
							echo "<td id='dato'>".$cicle['Password']."</td>";
							echo "<td id='dato'>".$cicle['isAdmin']."</td></tr>";						
						}
						
						//Disconnessione dal database
						mysql_close($conn);
						
						echo '
					</table>
		</div>
    </section>
	<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/creative.min.js"></script>
</body>
</html> ';
}
?>