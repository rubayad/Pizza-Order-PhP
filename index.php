<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pizza | Delivery</title>
	<meta name="description" content="This week we will be using OOP PHP to create and read with our CRUD application">
	<meta name="robots" content="noindex, nofollow">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="./css/style.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/pizza-logo.jpg" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="view.php">View</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
	<section class="masthead">
		<div>
			<h1>Pizza delivery</h1>
		</div>
	</section>
  <main class="container">


		<!--Form for the delivery starts here-->

	   <section class="form-row row justify-content-center">
		     <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
					 <h2>Order</h2>

					 <!--Dropbox for selecting pizza-->
					 <div class="form-group">
							<label for="pizza" class="col-sm-2 control-label">Pizza Option</label>
							<div class="col-sm-10">
								<select name="pizza" class="form-control" id="pizza">
									<option>Select Pizza</option>
									<option value="Margherita">Margherita</option>
									<option value="Pepperoni">Pepperoni</option>
									<option value="Vegetarian">Vegetarian</option>
									<option value="Hawaiian">Hawaiian</option>
									<option value="BBQ Chicken">BBQ Chicken</option>
									<option value="Supreme">Supreme</option>
								</select>
							</div>
					</div>

					<!--here goes the first name of the customer-->
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">First Name</label>
						 <div class="col-sm-10">
							 <input type="text" name="fname" class="form-control" id="input1">
						 </div>
					 </div>
					 <!--here goes the last name of the customer-->
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">Last Name</label>
						 <div class="col-sm-10">
							 <input type="text" name="lname" class="form-control" id="input2">
						 </div>
					 </div>
					 <!--here goes the email of the customer-->
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">Email</label>
						 <div class="col-sm-10">
							 <input type="email" name="email" class="form-control" id="input3">
						 </div>
					 </div>
					 <!--here goes the phone number of the customer-->
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">Phone</label>
						 <div class="col-sm-10">
							 <input type="text" name="phone" class="form-control" id="input4">
						 </div>
					 </div>
					 <!--This is the button to SUBMIT-->
					 <div class="form-group">
						 <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Submit">
					 </div>
		     </form>

			 <!--Connection PhP-->
			 <!-- Making our files talk -->
         <div class="form-group submit-message">
           <?php
					 	

						 require_once ('database.php');
						 if(isset($_POST) & !empty($_POST)){
						  $pizza = $database->sanitize($_POST['pizza']);
						  $fname = $database->sanitize($_POST['fname']);
						  $lname = $database->sanitize($_POST['lname']);
						  $phone = $database->sanitize($_POST['phone']);
						  $email = $database->sanitize($_POST['email']);
						  $res = $database->create($pizza, $fname, $lname, $phone, $email);
						  if($res){
							  echo "<p>Record Created</p>";
						  }
						  else
						  {
							  echo "<p>Could not create record</p>";
						  }
			  
						 }
			  
			 ?>
        </div>
      </section>
     </main>
   </body>
</html>
