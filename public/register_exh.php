<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Registration Form - Exhibitor</title>
	<link rel="stylesheet" type="text/css" href="reg_form.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>

<img class="imgcenter" src="/icon/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">

<p class="desc">Join the event as an exhibitor for FREE! Grab the chance to promote your products and/or services. Register now and our team will contact you soon!</p> 

<div class="wrapper">
    <div class="title">
      <h4>Register As Exhibitor</h4>
    </div>
	
	
	<?php if(isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>
		
	<?php if(isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
				<?php } ?>
				
	<form action="register_exh_process.php" method="POST">
    <div class="form">
       <div class="inputfield">
          <span class="input-icon"><i class="fas fa fa-user"></i></span>
          <input type="text" class="form-control input" name="fname" id="fname" placeholder="First Name" required>
       </div>  
        <div class="inputfield">
          <span class="input-icon"><i class="fas fa fa-user"></i></span>
          <input type="text" class="form-control input" name="lname" id="lname" placeholder="Last Name" required>
       </div>  
       <div class="inputfield">
         <span class="input-icon"><i class="fas fa fa-envelope"></i></span>
          <input type="email" class="form-control input" name="email" id="email" placeholder="Email" required>
       </div>  
      <div class="inputfield">
          <span class="input-icon"><i class="fas fa fa-phone"></i></span>
          <input type="text" class="form-control input" name="contact_no" id="contact_no" placeholder="Contact No." required>
       </div> 
        <div class="inputfield">
          <span class="input-icon"><i class="fas fa fa-building"></i></span>
          <input type="text" class="form-control input" name="companyname" id="companyname" placeholder="Company Name" required>
       </div> 
      <div class="inputfield">
          <span class="input-icon" style="font-size:18px;"><i class="fas fa fa-address-card"></i></span>
          <input type="text" class="form-control input" name="jobposition" id="jobposition" placeholder="Job Position" required>
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
	</form>
</div>	

</body>
</html>