<?php
	include("pageurl.php");
?>

<?php
// include database configuration file
include ('include\config\dbcon_req.php');
?>

<?php
	include("header.php");
?>


<?php

	error_reporting( ~E_NOTICE ); // avoid notice
		
	if(isset($_POST['btnsavemedicineimage']))
	{
		$fullname= $_POST['your_name'];// Full name
		$mobilenum= $_POST['mobile_number'];// Mobile number
		$emailaddress= $_POST['email_id'];// Email address
		$presentaddress= $_POST['your_address'];// Present address
		$flag='0';
		
		$imgFile = $_FILES['book_image']['name'];
		$tmp_dir = $_FILES['book_image']['tmp_name'];
		$imgSize = $_FILES['book_image']['size'];
		
		if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else if(empty($fullname)){
			$errMSG = "Please Insert Your Full Name.";
		}
		else if(empty($mobilenum)){
			$errMSG = "Please Insert Your Mobile Number.";
		}
		else if(empty($emailaddress)){
			$errMSG = "Please Insert Email Address.";
		}
		else if(empty($presentaddress)){
			$errMSG = "Please Insert Present Address.";
		}
		
		else
		{
			$upload_dir = 'include/images/request_medicine/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$slidingpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$slidingpic);
				}
				else{
					$errMSG = "Sorry, your file is too large";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO request_book (full_name,mobile_number,email_id,present_address,image_file,flag,create_date) VALUES(:fname,:mnumber,:emailid,:preaddress,:imgname,:flag,Now())');
			
			$stmt->bindParam(':imgname',$imgFile);
			$stmt->bindParam(':fname',$fullname);
			$stmt->bindParam(':mnumber',$mobilenum);
			$stmt->bindParam(':emailid',$emailaddress);
			$stmt->bindParam(':preaddress',$presentaddress);
			$stmt->bindParam(':flag',$flag);

			if($stmt->execute())
			{
				$successMSG = "Your medicine prescription request succesfully submitted";
			}
			else
			{
				$errMSG = "Error while submitting!";
			}
		}
	}
?>

<?php
	error_reporting( ~E_NOTICE ); // avoid notice
		
	if(isset($_POST['btnsavemedicine']))
	{
		$medicinename= $_POST['medicine_name'];// Full name
		$companyname= $_POST['company_name'];// Mobile number
		$fullname= $_POST['your_name'];// Full name
		$mobilenum= $_POST['mobile_number'];// Mobile number
		$emailaddress= $_POST['email_id'];// Email address
		$presentaddress= $_POST['your_address'];// Present address
		$flag='0';
		
		if(empty($medicinename)){
			$errMSG = "Please Insert Your Medicine Name.";
		}
		else if(empty($companyname)){
			$errMSG = "Please Insert Your Company Name.";
		}
		else if(empty($fullname)){
			$errMSG = "Please Insert Your Full Name.";
		}
		else if(empty($mobilenum)){
			$errMSG = "Please Insert Your Mobile Number.";
		}
		else if(empty($emailaddress)){
			$errMSG = "Please Insert Email Address.";
		}
		else if(empty($presentaddress)){
			$errMSG = "Please Insert Present Address.";
		}
		
		else
		{
			
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO request_medicine (medicine_name,company_name ,full_name,mobile_number,email_id,present_address,flag,create_date) VALUES(:mname,:cname,:fname,:mnumber,:emailid,:preaddress,:flag, Now())');
			
			$stmt->bindParam(':mname',$medicinename);
			$stmt->bindParam(':cname',$companyname);
			$stmt->bindParam(':fname',$fullname);
			$stmt->bindParam(':mnumber',$mobilenum);
			$stmt->bindParam(':emailid',$emailaddress);
			$stmt->bindParam(':preaddress',$presentaddress);
			$stmt->bindParam(':flag',$flag);

			if($stmt->execute())
			{
				$successMSG = "Your medicine request succesfully submitted";
			}
			else
			{
				$errMSG = "Error while submitting!";
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	

</head>

<body>

<div class="container-fluid">
	

	<div class="row">
		
		<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>  
	
	</div>
	
	<div class="row">
		
		<div class="col-md-3">
			<?php include('sidemenu.php'); ?>
		</div>

		<div class="col-md-4">
							
				<form method="post" enctype="multipart/form-data" name="myForm">
				
				<table class="table table-bordered table-responsive">
					
					<thead style="background-color:#DE1234;color:white" >

						<tr>
							<td colspan="2"><h1 class="h1" align="center" >Request for Medicine</h1></td>
						</tr>
					</thead>
					<tbody>
					
					<tr>
						<td><label class="control-label">Medicine Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Medicine Name" type="text" style="width:100%"  name="medicine_name" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Company Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Company Name" type="text" style="width:100%"  name="company_name" /></td>
					</tr>
														
					<tr>
						<td><label class="control-label">Your Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Name" type="text" name="your_name" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Mobille</label></td>
						<td><input class="input-group" maxlength="11" placeholder="Insert Mobile Number" type="text" style="width:100%" name="mobile_number" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Email</label></td>
						<td><input class="input-group" placeholder="Insert Your Email Address" type="text" style="width:100%" name="email_id" /></td>
					</tr>					
					
					<tr>
						<td><label class="control-label">Address</label></td>
						<td><textarea class="form-control" placeholder="Enter Your Present Address" style="width:100%"  name="your_address"></textarea></td>
					</tr>

					<tr align="center">
						<td colspan="2"><button type="submit" name="btnsavemedicine" class="btn btn-primary" onclick="validate()">
							<span class="glyphicon glyphicon-save"></span> &nbsp; Submit
							</button>
							<a class="btn btn-danger" href="#"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
						</td>
					</tr>
					</tbody>
    
				</table>
    
				</form>
			
		</div>
		
		<div class="col-md-1">
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div align="center">
				<h2 class="h2"><b>Or</b></h2>
			</div>
			<div align="center">
				<p class="just-lead" align="center"><b>Just Upload Doctor Prescription Image</b></p>
			</div>

		</div>
		
		<div class="col-md-4">
			
			<form method="post" enctype="multipart/form-data" name="myForm">
				
				<table class="table table-bordered table-responsive">
					
					<thead style="background-color:#DE1234;color:white">	
						<tr>
							<td colspan="2"><h1 class="h1" align="center"><b>Request for Medicine</b></h1></td>
						</tr>
					</thead>
					<tbody>
					
					<tr>
						<td><label class="control-label">Medicine Image</label></td>
						<td><input class="input-group" type="file" name="book_image" accept="image/*" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Your Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Full Name" type="text" style="width:100%"  name="your_name" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Mobille</label></td>
						<td><input class="input-group" maxlength="11" placeholder="Insert Mobile Number" type="text" style="width:100%" name="mobile_number" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Email</label></td>
						<td><input class="input-group" placeholder="Insert Your Email Address" type="text" style="width:100%" name="email_id" /></td>
					</tr>					
					
					<tr>
						<td><label class="control-label">Address</label></td>
						<td><textarea class="form-control" placeholder="Insert Your Present Address" style="width:100%" name="your_address"></textarea></td>
					</tr>

					<tr align="center">
						<td colspan="2"><button type="submit" name="btnsavemedicineimage" class="btn btn-primary" onclick="validate()">
							<span class="glyphicon glyphicon-save"></span> &nbsp; Submit
							</button>
							<a class="btn btn-danger" href="#"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
						</td>
					</tr>
					</tbody>
    
				</table>
    
				</form>
		
		</div>
	
	</div>
		
</div>


</body>
</html>


<?php 
	include 'footer.php'; 
?>	