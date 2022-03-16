<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
	include('header.php');
	require_once 'include/config/dbconcus.php';
	
	error_reporting( ~E_NOTICE ); // avoid notice
	
	if(isset($_POST['btnsave']))
	{
		$vfullname= trim($_POST['full_name']);// full name
		$vemail= trim($_POST['email']);// Email
		$vphone= trim($_POST['phonenum']);// Phone
		$vaddress= trim($_POST['presentadd']);// Address
		$vcuscountry= trim($_POST['countryname']);// Country
		$vcusdistrict= trim($_POST['districtname']);// District
		$vcusarea= trim($_POST['areaname']);// Area
		$vconfpass= trim($_POST['password_confirmation']);// Password
		$flag='1';
		require_once('config.php');
		$duplicate=$dbcon->prepare('select email,phone from customer_registration where email=:pemail or phone=:pphone');
		$duplicate->bindParam(':pemail', $vemail);
		$duplicate->bindParam(':pphone', $vphone);
		$duplicate->execute();
		
		if ($duplicate->rowCount()!=0){
		
			$errMSG = "Already You are Registered!";
		}
		// if no error occured, continue ....
		else		
		{
			$stmt = $DB_con->prepare('INSERT INTO customer_registration (full_name,email,phone,address,country,district,customer_area,conf_pass,flag,create_date) VALUES(:pfname, :pemail, :pphone, :paddress, :pcuscountry, :pcusdistrict, :pcusarea,  :pconfpass, :pflag, Now())');
			
			$stmt->bindParam(':pfname',$vfullname);
			$stmt->bindParam(':pemail',$vemail);
			$stmt->bindParam(':pphone',$vphone);
			$stmt->bindParam(':paddress',$vaddress);
			$stmt->bindParam(':pcuscountry',$vcuscountry);
			$stmt->bindParam(':pcusdistrict',$vcusdistrict);
			$stmt->bindParam(':pcusarea',$vcusarea);
			$stmt->bindParam(':pconfpass',$vconfpass);
			$stmt->bindParam(':pflag',$flag);
			
			if($stmt->execute())
			{
				$successMSG = "Your Registration Succesfully Submitted";
				//header("refresh:5;customer_register.php"); // redirects image view page after 5 seconds.
				//echo'<script>window.location.href="customer_register.php";</script>';
			}
			else
			{
				$errMSG = "Error While Inserting!";
			}
		}
	}
?>

	
	<script type="text/javascript">
		function validateForm() {
    var fullname = document.forms["myForm"]["full_name"].value;
	var emailid = document.forms["myForm"]["email"].value;
	var phone_number = document.forms["myForm"]["phonenum"].value;
	var present_address = document.forms["myForm"]["presentadd"].value;
	var countryzone = document.forms["myForm"]["countryname"].value;
	var districtzone = document.forms["myForm"]["districtname"].value;
	var areazone = document.forms["myForm"]["areaname"].value;
	var pass = document.forms["myForm"]["password"].value;
	var conpass = document.forms["myForm"]["password_confirmation"].value;
	
	var atpos = emailid.indexOf("@");
    var dotpos = emailid.lastIndexOf(".");
   	
    if (fullname == "") {
        alert("Please insert your full name");
        return false;
    }
	//else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=emailid.length) {
    //    alert("Please insert your valid email id");
    //    return false;
    //}
	else if (phone_number == "") {
        alert("Please insert your phone number");
        return false;
    }
	else if (present_address == "") {
        alert("Please insert your present address");
        return false;
    }
    else if (countryzone == "") {
        alert("Please select your country");
        return false;
    }
    else if (districtzone == "") {
        alert("Please select your district");
        return false;
    }
	else if (areazone == "") {
        alert("Please select your area");
        return false;
    }
	else if (pass.length<6) {
        alert("Please insert at least 6 digit password");
        return false;
    }
	else if (conpass.length<6) {
        alert("Please insert at least 6 digit confirm password");
        return false;
    }
	else if (pass.length>20){
        alert("Please insert maximum 20 digit password");
        return false;
    }
	else if (conpass.length>20){
        alert("Please insert maximum 20 digit confirm password");
        return false;
    }

}
</script>

	<script type="text/javascript">

function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password_confirmation');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  

</script>

<style>
    
    html, body {
        width: auto!important; overflow-x: hidden!important;
        min-width: 392px;
    } 
    
    .tkinline{
		display:inline;
	}
	
		.top-right {
    position: absolute;
    top: 37px;
    right: 23px;
    
</style>

<div class="container-fluid">
        <div class="row">
		
		<div class="col-md-4">
				
		</div>
		
        <div class="col-md-4">
		
			<div align="center">
				<h3 class="h3"><b>Customer Registration</b></h3>
			</div>
				
			
        	<div class="panel panel-default">

				<div class="panel form-group">
					
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
			 			<div class="panel-body">
			    		<form name="myForm" onsubmit="return validateForm()" method="post">	
			    			<div class="form-group">
								<input type="text" name="full_name" id="full_name" class="form-control input-sm" placeholder="Full Name">
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
							
							<div class="form-group">
			    				<input type="text" name="phonenum" id="phonenum" class="form-control input-sm" placeholder="Phone Number">
			    			</div>
							
							<div class="form-group">
								<textarea name="presentadd" id="presentadd" class="form-control input-sm" placeholder="Present Address"></textarea>
			    				
			    			</div>
			    			
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<select class="form-control round" name="countryname" id="countryname">
							<option value="">Select Your Country</option>
                            <?php
									require_once 'include/config/config.php';
									$a_flag ='1';
									$stmt = $dbcon->prepare('SELECT country_name FROM customer_country where country_flag=:aflag order by country_name');
									$stmt->bindParam(':aflag', $a_flag);
									$stmt->execute();
        
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
							?>
									<option value="<?php echo $country_name; ?>"><?php echo $country_name; ?></option>
							
							<?php
									}
							?>
								</select>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<select class="form-control round" name="districtname" id="districtname">
							<option value="">Select Your District</option>
                            <?php
									require_once 'include/config/config.php';
									$a_flag ='1';
									$stmt = $dbcon->prepare('SELECT district_name FROM customer_district where district_flag=:aflag order by district_name');
									$stmt->bindParam(':aflag', $a_flag);
									$stmt->execute();
        
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
							?>
									<option value="<?php echo $district_name; ?>"><?php echo $district_name; ?></option>
							
							<?php
									}
							?>
								</select>
			    					</div>
			    				</div>
			    			</div>
							
							<div class="form-group">
			    				<select class="form-control round" name="areaname" id="areaname">
							<option value="">Select Your Area</option>
                            <?php
									require_once 'include/config/config.php';
									$a_flag ='1';
									$stmt = $dbcon->prepare('SELECT area_name FROM customer_area where area_flag=:aflag order by area_name');
									$stmt->bindParam(':aflag', $a_flag);
									$stmt->execute();
        
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
							?>
									<option value="<?php echo $area_name; ?>"><?php echo $area_name; ?></option>
							
							<?php
									}
							?>
								</select>
			    			</div>
							
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" onkeyup="checkPass(); return false;">
			    					</div>
			    				</div>
			    			</div>
							
							<div class="form-group">
								<span id="confirmMessage" class="confirmMessage"></span>
								<p> **At least 6 digit password</p> 
								
							</div>
			    			
			    			<input type="submit" value="Register" name="btnsave" class="btn btn-primary btn-block">
							
							<br/>
							
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<h4 class="text-right"><b>Already Member?</b></h4>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<button type="button" style="background-color:#08B066" class="btn btn-lg btn-block"><a href="login.php"style="text-decoration:none;color:white" height="40px"><span class="glyphicon glyphicon-user" style="color:white;font-weight: bold"></span>&nbsp;<b> Login </b></a></button>
			    					</div>
			    				</div>
			    			</div>
			    		
			    		</form>
						
						
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
	
<?php include('footer.php') ?>
