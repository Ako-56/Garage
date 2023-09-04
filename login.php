<html>
	<head>
		<title>Moti</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="icon.ico">
		<link rel="stylesheet" href="style/bootstrap4.css">
		
		<style>
			body{
				background: linear-gradient(rgba(255, 255, 255, 0.700), rgba(0, 0, 0, 0.950)),url(imgs/flats.jpg);
				background-position: center;
				background-size: cover;
				color: #494747;
				justify-content:center;
			}
			
			.bg-glass {
			  background-color: hsla(0, 0%, 100%, 0.9) !important;
			  backdrop-filter: saturate(200%) blur(25px);
			}
			
			.container{
				margin:100 auto;
			}
			input[type=text],input[type=password]{
				border:none;
				border-bottom:1px solid black;
				outline:none;
				text-align:center
			}
		</style>
		<script>      
			if ( window.history.replaceState ) {
		  window.history.replaceState( null, null, window.location.href ); }
		</script>
		<script>
			function myFunction() {
			  var x = document.getElementById("myInput");
			  if (x.type === "password") {
				x.type = "text";
			  } else {
				x.type = "password";
			  }
			}
		</script>
	</head>
	<body>
		<section >
			<div class="container text-center " style="width:80%;">
				<div class="row gx-lg-5 align-items-center mb-1">
				  <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
					<h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
					  Moti Garage LTD <br />
					  <span style="color: hsl(218, 81%, 75%)">for Quality service</span>
					</h1>
					<p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
					  A motor hospital where your car get the right treatment. All types and 
					  makes are done to perfection with keen attention to detail<br/><a href="index" style="font-size:16pt;color:#fff;text-decoration:none;">Home</a>
					</p>
				  </div>

				  <div class="col-sm-5 position-relative " style="margin-left:70;width:40%;">
					<div class="card bg-glass">
					  <div class="card-body px-5 py-5 px-md-5">
						<form method="post" autocomplete="off" action="logpr">
						  <div class="form-outline mb-1 justify-content-left">
							<label class="form-label">Username</label>
							<input type="text" name="ECode" class="form-control"  required />
						  </div>

						  <div class="form-outline mb-1">
						  <label class="form-label">Password</label>
							<input type="password" class="form-control" name="pwd" id="myInput" required />
						  </div>

						  <div class="form-check d-flex justify-content-left mb-1">
							<label class="form-check-label"><input class="form-check-input me-2" type="checkbox" onclick="myFunction()" />
							Show Password</label>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block mb-4">
							Login
						  </button>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
		</section>
	</body>
</html>