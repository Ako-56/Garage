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
		  padding:0 !important;
		}
		hr {
		  background-color: #fff !important;
		}
		.footer-section {
		  color: #fff;
		  text-align: justify !important;
		}
		.footer-section a {
		  color: #fff;
		  transition: 0.3s;
		  font-weight: 600;
		  text-decoration: none;
		}

		.footer-section a:hover {
		  transition: 0.3s;
		  color: orangered;
		}

		/*Below code for copyright section*/

		.copyright-section {
		  padding: 20px;
		  background-color: rgb(32, 32, 34);
		}
		.copyright-text {
		  color: #cac6c6;
		  font-size: 1rem;
		}
		.copyright-text a {
		  transition: 0.3s;
		  text-decoration: none;
		  text-transform: uppercase;
		  color: #cac6c6;
		}
		.copyright-text a:hover {
		  transition: 0.3s;
		  color: orangered;
		}
		.welcome-area h2 {
		  text-transform: capitalize;
		  font-weight: 700;
		  color: #4f138f;
		}
		.welcome-front {
		  color: rgb(28, 73, 7);
		}
		.font-metamorphous {
		  font-family: "Metamorphous", cursive;
		}
		 .container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			text-align:left;
		}

		.item {
			width: 30%; /* Adjust the width as needed */
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			background-color:#ffffe6;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}
		
		body {
			background: linear-gradient(rgba(255, 255, 255, 0.900), rgba(0, 0, 0, 0.671));
		}

		.bubble {
			position: absolute;
			width: 120px;
			height: 120px;
			border-radius: 50%;
			background-color: rgba(255, 255, 255, 0.5); /* Change the RGB values and alpha to your desired bubble color */
			animation: floatBubble linear infinite;
		}

		@keyframes floatBubble {
			0% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(-100px);
			}
			100% {
				transform: translateY(0);
			}
		}
	</style>
</head>
<body>
	  <div class="container-lg navbar-wrapper">
    <nav class="my-nav navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><div style="max-height: 50px;width:100%;color:teal;font-size:20pt;text-align:center;font-family: Cherry Swash, cursive;"><b>MOTI</b></div></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse order-3" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#About">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#1">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#1">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="bubble" style="top: 100px; left: 50px;"></div>
<div class="bubble" style="top: 200px; left: 150px;"></div>
<div class="bubble" style="top: 300px; left: 250px;"></div>
  <section class="about-section" id="About">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-6 about-part">
            <div class="welcome-area">
              <h2 class="font-metamorphous">
                <span class="welcome-front">Welcome To Moti Garage Ltd: </span> Your Trusted Auto Care Partner
              </h2>
              <div class="welcome-underline"></div>
              <div class="content-text">
                At Moti Garage Ltd, we take pride in being your reliable destination for all your automotive needs.
				With a legacy of excellence spanning several years, our garage is dedicated to providing top-tier vehicle 
				care and exceptional service. Our team of skilled technicians and mechanics 
				is committed to ensuring your vehicle runs at its best, delivering performance, safety, and longevity.<br/>
				<b>Services Offered:</b>
				From routine maintenance to intricate repairs, Moti Garage Ltd offers a comprehensive range
				 of services tailored to meet your vehicle's specific requirements. Our state-of-the-art facility 
				 is equipped with the latest diagnostic tools and equipment, ensuring accurate assessments and efficient solutions. 
				Whether it's a simple oil change, brake service, or complex engine repair, our experts are equipped to handle it all.<br/>
				<b>Visit Us Today:</b>
				Experience automotive care like no other at Moti Garage Ltd. We invite you to
				 visit our garage and discover the difference of quality service, professionalism, and dedication.
				 Your vehicle deserves the best – and so do you. Trust us to keep you moving forward with confidence.
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 ">
            <div class="card mb-3 ml-auto" style="max-width: 30rem;">
                <img src="imgs/logo.jpg" style="width:400pt">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section style="width:90%;margin:auto;text-align:center;">
	<div class="card-header"><h4>Brands We deal with</h4></div>
	<div>
		 <img src="imgs/brands.jpg" width="80%">
	</div>
  </section>
  
  <section style="width:90%;margin:auto;text-align:center;" id="1">
	<div class="card-header"><h4>Our products and Services</h4></div>
	<div>
		<div class="container">
		<div class="item">
			<h3>Oil and Fluids</h3>
			<ul>
				<li>Engine oil</li>
				<li>Transmission fluid</li>
				<li>Brake fluid</li>
				<li>Power steering fluid</li>
				<li>Coolant/antifreeze</li>
			</ul>
		</div>
		<div class="item">
			<h3>Filters</h3>
			<ul>
				<li>Oil filter</li>
				<li>Air filter</li>
				<li>Cabin air filter</li>
				<li>Fuel filter</li>
			</ul>
		</div>
		<div class="item">
			<h3>Belts</h3>
			<ul>
				<li>Serpentine belt</li>
				<li>Timing belt</li>
				<li>Drive belt</li>
			</ul>
		</div>
	</div>

	<div class="container">
    <div class="item">
        <h3>Brake System</h3>
        <ul>
            <li>Brake pads</li>
            <li>Brake rotors/discs</li>
            <li>Brake calipers</li>
            <li>Brake lines</li>
            <li>Brake master cylinder</li>
        </ul>
    </div>
    <div class="item">
        <h3>Suspension and Steering</h3>
        <ul>
            <li>Shocks/struts</li>
            <li>Control arms</li>
            <li>Tie rod ends</li>
            <li>Ball joints</li>
            <li>Steering rack</li>
        </ul>
    </div>
    <div class="item">
        <h3>Electrical Components</h3>
        <ul>
            <li>Spark plugs</li>
            <li>Ignition coils</li>
            <li>Alternator</li>
            <li>Starter motor</li>
            <li>Battery</li>
        </ul>
    </div>
</div>
 <div class="bubble" style="top: 400px; right: 50px;"></div>
<div class="bubble" style="top: 500px; right: 150px;"></div>
<div class="bubble" style="top: 600px; right: 250px;"></div>
		<div class="container">
			<div class="item">
				<h3>Exhaust System</h3>
				<ul>
					<li>Muffler</li>
					<li>Catalytic converter</li>
					<li>Exhaust pipes</li>
					<li>Oxygen sensors</li>
				</ul>
			</div>
			<div class="item">
				<h3>Cooling System</h3>
				<ul>
					<li>Radiator</li>
					<li>Thermostat</li>
					<li>Water pump</li>
					<li>Cooling fan</li>
				</ul>
			</div>
			<div class="item">
				<h3>Engine Components</h3>
				<ul>
					<li>Air intake components</li>
					<li>Camshaft and crankshaft sensors</li>
					<li>EGR valve</li>
					<li>PCV valve</li>
				</ul>
			</div>
		</div>
	</div>
  </section>
  
  <footer id="contact">
    <div class="footer-section bg-dark p-1">
        <!-- Footer Links -->
    <div class="container text-justify text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Moti Garage LTD</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p class="text-justify">A motor hospital where your car get the right treatment. All types and 
			makes are done to perfection with keen attention to detail.</p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Useful links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"><br>
            <a href="login">Login</a><br>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"><br>
            <i class="fas fa-map-marker-alt"></i> KONA<br>
            <i class="fas fa-envelope"></i> info@moti.com<br>
            <i class="fas fa-phone"></i> +254 00 90000<br>
            <i class="fas fa-print"></i> +254 00 08800<br>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->
    </div>
	 <div class="container-fluid copyright-section">
      <div class="container text-center copyright-text">
        Copyright © 2023 <strong><a title="Moti" href="#">Moti Garage Ltd.</a>&nbsp;</strong>
      </div>
    </div>
  </footer>
</body>