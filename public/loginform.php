<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>UniVRse CMS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

</head>
<body>
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
	
	.p_button {
		background-color: #72258B;
		color: white;
	}
	
	.p_button:hover {
		background-color: #3F145C;
		color: white;
	}

    .title {
        font-weight: 600;
        font-size: 48px;
        text-align: center;
        color: #72258B;
    }
	
	.input-group {
		margin: 30px 20px;
	}

    .form-control::placeholder {
        color:white;
    }
	
	.error {
		border: 1px solid #AE0008;
		background-color: #FF656C;
		color: white;
		margin: 0 150px 0 150px;
	}
	
    </style>
    
<div style="margin: 100px 350px;" class="card">
    <div class="card-header border-0">
        <h4 class="title">Login Form</h4>
    </div>

    <center>
	<?php if(isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>
				


    <div class="card-body">
        <form method="POST" action="login.php" enctype="multipart/form-data" autocomplete="off">

            <center>
            <div class="input-group" style="width:75%;">
                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 24px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-user"></i></span></div>
                <input class="form-control" type="text" name="name" id="name" 
                style="padding: 30px;background-color:#8334AB; font-size: 24px; color:white; border-radius: 0 5px 5px 0;" 
                placeholder="Full Name" required>
            </div>

            <div class="input-group" style="width:75%;">
                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 24px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-lock"></i></span></div>
                <input class="form-control" type="password" name="password" id="password" 
                style="padding: 30px;background-color:#8334AB; font-size: 24px; color:white; border-radius: 0 5px 5px 0;" 
                placeholder="Password" required>
            </div>
			
            <div class="form-group">
            <button class="btn p_button" style="padding:6px 15px;" type="submit" name="submit">
                    Login
            </button>
            <a class="btn btn-danger" style="padding:6px 15px;" href=""> Return </a>
            </div>
			
          </center>
        </form>
    </div>
</div>

</body>
</html>