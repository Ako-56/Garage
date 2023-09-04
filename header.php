<?php 
	session_start();
	include 'config/config.php';
	include 'function/query.php';
	if(!isset($_SESSION['username'])){header("location:login");}
	$ECode = $_SESSION['username']; 
?>
<html>
	<head>
		<title>Moti Garages</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="icon.ico">
		<link rel="stylesheet" href="style/bootstrap4.css">
		<link rel="stylesheet" href="style/form.css">
		<link rel="stylesheet" href="style/style.css">
		<style>
			.navbar-wrapper {
			  width:100%;
			  max-width: 100% !important;
			  padding-left:0 !important;
			}
			.my-nav {
			  z-index: 999;
			}
			.my-nav ul li a {
			  text-transform: uppercase;
			  font-weight: 500;
			}
			
			.sidenav {
			  height: 100%;
			  width: 220px;
			  position: fixed;
			  z-index: 1;
			  top: 0;
			  left: 0;
			  background-color: #343a40;
			  overflow-x: hidden;
			  padding-top: 2px;
			}

			.sidenav a,.top {
			  padding: 4px 4px 4px 16px;
			  text-decoration: none;
			  font-size: 17px;
			  color: #fff;
			  display: block;
			  font-weight:bold;
			}

			.sidenav a:hover {
			  color: #f1f1f1;
			}

			.main {
			  margin-left: 220px;
			  padding: 0px 1pt;
			  background: linear-gradient(rgba(255, 255, 255, 0.900), rgba(0, 0, 0, 0.671)),
			  url("imgs/logo.jpg");
			  background-size: cover;
			}
			
			.dropdown-container {
			  display: none;
			  background-color: #343a40;
			  padding-left: 8px;
			}

			.down {
			  float: right;
			  padding-right: 8px;
			}


			@media screen and (max-height: 450px) {
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}
			}
			.top{
				background-color:#fff;
				color:black !important;
			}
			.heads{
				color: hsl(218, 81%, 95%);
				text-decoration:none;
				font-size:20pt;
				font-weight:bold;
			}
		</style>
		<script src="js/search.js"></script>
		<script>      
			if ( window.history.replaceState ) {
			  window.history.replaceState( null, null, window.location.href ); }
		</script>
		<script>
			function filterTable(inputID, tableID, sIndex) {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById(inputID);
			  filter = input.value.toUpperCase();
			  table = document.getElementById(tableID);
			  tr = table.getElementsByTagName("tr");
			  for (i = 1; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[sIndex];
				if (td) {
				  txtValue = td.textContent || td.innerText;
				  if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}       
			  }
			}
		</script>
		<script>
			 function printData() {
			  var divToPrint = document.querySelectorAll("[id='printTable']");
			  var printWindow = window.open("", "Print");
			  var printStyles = document.createElement("style");
			  printStyles.setAttribute("media", "print");
			  printStyles.innerHTML = `
				@media print {
				  /* Define styles for printing */
					 @page {
					  margin: 5pt;
					 }
				  #printTable {
					font-size: 8pt;
					line-height: 1.2;
					border-collapse:collapse;
					border:1px solid gray;
				  }
				  
				  #printTable tr,td,th{
					  border:1px solid gray;
				  }
				  /* Hide the header and footer of the page */
				  header, footer,.m {
					display: none;
				  }

				  /* Adjust the margins and padding of the page */
				  body {
					counter-reset: page;
					margin: 0;
					padding: 0;
				  }
				  
				  #pageFooter {
						display: table-footer-group;
						float:right;
					}

				 #pageFooter:after {
					content:"Page " counter(page);
					counter-increment: page;
				  }

				  /* Adjust the size of the table to fit the page */
				  #printTable {
					width: 90%;
					max-width: 100%;
					margin: 30 auto;
					padding: 0;
				  }
				}
			  `;
			  printWindow.document.head.appendChild(printStyles);
			  for (var i = 0; i < divToPrint.length; i++) {
				printWindow.document.body.innerHTML += divToPrint[i].outerHTML;
			  }
			  printWindow.print();
			  printWindow.close();
			}
		</script>
	</head>
	<body>
		<section>
			<div class="sidenav">
			  <a class="navbar-brand" href="dashboard" aria-label="logo" style="cursor:pointer">
				<div style="max-height: 50px;width:100%;color:teal;font-size:20pt;text-align:center;font-family: Cherry Swash, cursive;"><b>MOTI</b></div>
			  </a>
			  <a href="dashboard">Home</a>
			  <a href="#" class="top">Applications Menu <span class="down">&#x25BC;</span></a>
				<div class="dropdown-container">
				  <a href="spares">Record Spares</a>
				  <a href="cars">Record Cars</a>
				  <a href="diag">Diagnosis Report</a>
				</div>
			  <a href="#" class="top">Finance Menu </a>
				<a href="pay">Record Payment</a>
				<a href="release">Release Car</a>
			  <a href="#" class="top">Reports <span class="down">&#x25BC;</span></a>
				  <div class="dropdown-container">
					<a href="catalogue">Spares Catalogue</a>
					<a href="pyrep">Payments</a>
					<a href="states">Cars In-Service</a>
				  </div>
			  <a href="#" class="top">Administration <span class="down">&#x25BC;</span></a>
				  <div class="dropdown-container">
					 <a href="employees">Record Employees</a>
				  </div>
			</div>
		</section>
		<section class="main">
			<div class="container-lg navbar-wrapper">
				<nav class="my-nav navbar navbar-expand-lg navbar-dark bg-dark">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
					<span class="heads">Moti Garage LTD</span>
				  <div class="collapse navbar-collapse order-3" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
					  <li class="nav-item">
						<a class="nav-link" href="login" style="color:#fff;font-family:italic;">
						<img src="imgs/prof.png" style="width:20pt;background-color:#fff;border-radius:50%;">
						<cite><?php echo $ECode; ?></cite></a>
					  </li> 
					  <li class="nav-item">
						<a class="nav-link" href="login" style="color:#fff;">Logout</a>
					  </li>
					</ul>
				  </div>
				</nav>
			</div>
		</section>
<script>
  var dropdown = document.getElementsByClassName("top");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      var isActive = this.classList.contains("active");

      // Close all expanded dropdowns
      closeAllDropdowns();

      // Expand or collapse the clicked dropdown
      if (!isActive) {
        this.classList.add("active");
        var dropdownContent = this.nextElementSibling;
        dropdownContent.style.display = "block";
      }
    });
  }

  function closeAllDropdowns() {
    var dropdowns = document.getElementsByClassName("top");
    for (var i = 0; i < dropdowns.length; i++) {
      var dropdownContent = dropdowns[i].nextElementSibling;
      dropdowns[i].classList.remove("active");
      dropdownContent.style.display = "none";
    }
  }
</script>