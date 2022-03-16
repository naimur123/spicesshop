<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
?>

	<style>
		.pvi{
			display: inline;
			font-family:Courier;
			color: #36332F;
			font-size:16px;
			font-weight:bold;
		}

}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
	
	</style>

<br/>

<div class="container" >
    
    
	<div class="row hidden-xs">
		<div class="col-md-12" align="center">
			<h2 class="h2" style="font-family:Courier"><b>Our Product Category</b></h2>
		</div>
	</div>
	
	<br/>
	
	<div class="row hidden-xs" >

	<div class="col-md-12">
		
		<div class="row" >
			
			<div class="col-md-4" style="padding-right:1px;">
				<a href="spicies.php"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-7" align="right" style="padding:10px;"><p 

class="pvi">Spices</p></div>
						<div class="col-md-5" align="center" style="padding:10px;"><img 

src="include/images/spice.jpg" height="40px" alt="Spicies" ></div>
					</div>	
				</div></a>	
			</div>
			
			<div class="col-md-4" style="padding-right:1px;">
				<a href="dry.php"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-8" align="right" style="padding:10px;"><p class="pvi">Nut & Dry Fruits</p></div>
						<div class="col-md-4" align="center" style="padding:10px;"><img src="include/images/dryfruit.jpg" height="40px" alt="Dry Food" ></div>
					</div>	
				</div></a>	
			</div>

			<div class="col-md-4" style="padding-right:1px;">
				<a href="herbal.php"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-7" align="right" style="padding:10px;"><p class="pvi" 

>Herbs</p></div>
						<div class="col-md-5" align="center" style="padding:10px;"><img 

src="include/images/herb.jpg" height="40px" alt="Bashmati" ></div>
					</div>	
				</div></a>	
			</div>
			
			
			
		
		</div>
		
		<br/>
		
		<div class="row">
			
			<div class="col-md-4" style="padding-right:1px;">
				<a href="spices_herbs.php"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-8" align="right" style="padding:10px;"><p class="pvi" 

>Spices & Herbs Powder</p></div>
						<div class="col-md-4" align="center" style="padding:10px;"><img 

src="include/images/powder.jpg" height="40px" alt="Herbal" ></div>
					</div>	
				</div></a>	
			</div>
			
			
			<div class="col-md-4" style="padding-right:1px;">
				<a href="others.php"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-9" align="right" style="padding:10px;"><p class="pvi" 

>Cooking & Bakery</p></div>
						<div class="col-md-3" align="center" style="padding:10px;"><img 

src="include/images/basmatis.jpg" height="40px" alt="Powder Item" ></div>
					</div>	
				</div></a>	
			</div>
			
			<div class="col-md-4" style="padding-right:1px;">
				<a href="#"><div style="border: 1px solid #D0D3D4" align="center">
					<div class="row">
						<div class="col-md-7" align="right" style="padding:10px;"><p class="pvi" 

>Others</p></div>
						<div class="col-md-5" align="center" style="padding:10px;"><img 

src="include/images/programs.jpg" height="40px" alt="Programs" ></div>
					</div>	
				</div></a>	
			</div>
		
		</div>
	
	</div>
	
	</div>
	
</div>
	
	<br/>



<div class="container-fluid visible-xs">
	
	 <div class="row">
		<div class="col-xs-12" align="center" style="background-color:gray">
			<h4 class="h4" style="color:#fff;font-family:Courier;">SHOP BY CATEGORY </h4>
		</div>
	</div>
	
    <div class="row text-center" style="backgroumd:#ddd;">
        <div class="col-xs-6">
            <div class="footer-part-1"><a href="spicies.php"><img src="include/images/spice.jpg" height="40px" alt="Spicies" >  Spices </a></div>
        </div>
        <div class="col-xs-6">
             <div class="footer-part-1"><a href="dry.php"><img src="include/images/dryfruit.jpg" height="40px" alt="Dry Food" > Dry Fruits</a></div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-6">
             <div class="footer-part-1"><a href="herbal.php"><img src="include/images/herb.jpg" height="40px" alt="Herbs" >  Herbs </a></div>
        </div>
        <div class="col-xs-6">
             <div class="footer-part-1"><a href="spices_herbs.php"><img src="include/images/powder.jpg" height="40px" alt="Herbal" > Powder </a></div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-6">
             <div class="footer-part-1"><a href="others.php"><img src="include/images/basmatis.jpg" height="40px" alt="Powder Item" > Cooking </a></div>
        </div>
        <div class="col-xs-6">
             <div class="footer-part-1"><a href="#"> <img src="include/images/programs.jpg" height="40px" alt="Programs" >  Others</a></div>
        </div>
    </div>
	
</div>



<style>
    .footer-part-1{
		height:55px;
        margin:0px;
        padding:0px;
        margin-top:5px;
        border:2px solid #ddd;
        padding:5px 0px;
        border-radius:5px;
        box-shadow:1px 2px 5px #ddd;
    }
</style>
	
