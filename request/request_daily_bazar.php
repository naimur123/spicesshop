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
		
	if(isset($_POST['btnsavedailybazarimage']))
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
			$upload_dir = 'include/images/request_daily_bazar/'; // upload directory
	
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
			$stmt = $DB_con->prepare('INSERT INTO request_daily_bazar (full_name,mobile_number,email_id,present_address,image_file,flag,create_date) VALUES(:fname,:mnumber,:emailid,:preaddress,:imgname,:flag,Now())');
			
			$stmt->bindParam(':imgname',$imgFile);
			$stmt->bindParam(':fname',$fullname);
			$stmt->bindParam(':mnumber',$mobilenum);
			$stmt->bindParam(':emailid',$emailaddress);
			$stmt->bindParam(':preaddress',$presentaddress);
			$stmt->bindParam(':flag',$flag);

			if($stmt->execute())
			{
				$successMSG = "Your bazar list image request succesfully submitted";
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
		
	if(isset($_POST['btnsavedailybazar']))
	{
		$bazarlist= $_POST['bazar_list'];// Bazar List name
		$fullname= $_POST['your_name'];// Full name
		$mobilenum= $_POST['mobile_number'];// Mobile number
		$emailaddress= $_POST['email_id'];// Email address
		$presentaddress= $_POST['your_address'];// Present address
		$flag='0';
		
		if(empty($bazarlist)){
			$errMSG = "Please Insert Your Bazar List.";
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
			$stmt = $DB_con->prepare('INSERT INTO request_daily_bazar (bazar_list,full_name,mobile_number,email_id,present_address,flag,create_date) VALUES(:blist,:fname,:mnumber,:emailid,:preaddress,:flag, Now())');
			
			$stmt->bindParam(':blist',$bazarlist);
			$stmt->bindParam(':fname',$fullname);
			$stmt->bindParam(':mnumber',$mobilenum);
			$stmt->bindParam(':emailid',$emailaddress);
			$stmt->bindParam(':preaddress',$presentaddress);
			$stmt->bindParam(':flag',$flag);
			
			if($stmt->execute())
			{
				$successMSG = "Your bazar list request succesfully submitted";
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
							<td colspan="2"><h2 class="h2" align="center"><b>Request for Daily Bazar List</b></h2></td>
						</tr>
					</thead>
					<tbody>
					
					<tr>
						<td><label class="control-label">Bazar List</label></td>
						<td><input class="input-group" placeholder="Insert Your Bazar List" type="text" name="bazar_list" /></td>
					</tr>
								
					<tr>
						<td><label class="control-label">Your Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Name" type="text" name="your_name" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Mobille</label></td>
						<td><input class="input-group" maxlength="11" placeholder="Insert Mobile Number" type="text" name="mobile_number" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Email</label></td>
						<td><input class="input-group" placeholder="Insert Your Email Address" type="text" name="email_id" /></td>
					</tr>					
					
					<tr>
						<td><label class="control-label">Address</label></td>
						<td><textarea class="form-control" placeholder="Enter Your Present Address" name="your_address"></textarea></td>
					</tr>

					<tr align="center">
						<td colspan="2"><button type="submit" name="btnsavedailybazar" class="btn btn-primary" onclick="validate()">
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
				<p class="just-lead" align="center"><b>Just Upload Daily Bazar List Image</b></p>
			</div>

		</div>
		
		<div class="col-md-4">
			
			<form method="post" enctype="multipart/form-data" name="myForm">
				
				<table class="table table-bordered table-responsive">
					
					<thead style="background-color:#DE1234;color:white">	
						<tr>
							<td colspan="2"><h2 class="h2" align="center"><b>Request for Daily Bazar List</b></h2></td>
						</tr>
					</thead>
					<tbody>
					
					<tr>
						<td><label class="control-label">Bazar List</label></td>
						<td><input class="input-group" type="file" name="book_image" accept="image/*" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Your Name</label></td>
						<td><input class="input-group" placeholder="Insert Your Full Name" type="text" style="width:100%"  name="your_name" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Mobille</label></td>
						<td><input class="input-group" maxlength="11" placeholder="Insert Mobile Number" style="width:100%"  type="text" name="mobile_number" /></td>
					</tr>
					
					<tr>
						<td><label class="control-label">Email</label></td>
						<td><input class="input-group" placeholder="Insert Your Email Address" type="text" style="width:100%"  name="email_id" /></td>
					</tr>					
					
					<tr>
						<td><label class="control-label">Address</label></td>
						<td><textarea class="form-control" placeholder="Insert Your Present Address" style="width:100%"  name="your_address"></textarea></td>
					</tr>

					<tr align="center">
						<td colspan="2"><button type="submit" name="btnsavedailybazarimage" class="btn btn-primary" onclick="validate()">
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