<?php
	require_once('include/config/dbconfigin.php');
?>



<div class="container">
    <div class="row">
	
	<div class="col-md-12" style= "padding:0;">	
	
  <div id="myCarouselslide" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarouselslide" data-slide-to="0" class="active"></li>
      <li data-target="#myCarouselslide" data-slide-to="1"></li>
      <li data-target="#myCarouselslide" data-slide-to="2"></li>
	  <li data-target="#myCarouselslide" data-slide-to="3"></li>
      <li data-target="#myCarouselslide" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      
      <div class="item active">
				
				<?php
	
	$stmt = $DB_con->prepare("SELECT image_name FROM `home_image_slideshow` where slideshow_active='A' order by id DESC LIMIT 1 OFFSET 0");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-12">
				
				<img src="admin/include/images/slideshow/<?php echo $row['image_name']; ?>"  class="img-responsive " style="width:100%; height:400px"/>
				
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found
            </div>
        </div>
        <?php
	}
	?>	
						
      </div>

      <div class="item">
								<?php
	
	$stmt = $DB_con->prepare("SELECT image_name FROM `home_image_slideshow` where slideshow_active='A' order by id DESC LIMIT 1 OFFSET 1");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-12">
				
				<img src="admin/include/images/slideshow/<?php echo $row['image_name']; ?>"  class="img-responsive " style="width:100%; height:400px"/>
				
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found
            </div>
        </div>
        <?php
	}
	?>
	
      </div>
    
      <div class="item">
								<?php
	
	$stmt = $DB_con->prepare("SELECT image_name FROM `home_image_slideshow` where slideshow_active='A' order by id DESC LIMIT 1 OFFSET 2");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-12">
				
				<img src="admin/include/images/slideshow/<?php echo $row['image_name']; ?>"  class="img-responsive " style="width:100%; height:400px"/>
				
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found
            </div>
        </div>
        <?php
	}
	?>
	
      </div>
	  
	  <div class="item">
								<?php
	
	$stmt = $DB_con->prepare("SELECT image_name FROM `home_image_slideshow` where slideshow_active='A' order by id DESC LIMIT 1 OFFSET 3");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-12">
				
				<img src="admin/include/images/slideshow/<?php echo $row['image_name']; ?>"  class="img-responsive " style="width:100%; height:400px"/>
				
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found
            </div>
        </div>
        <?php
	}
	?>
	
      </div>
	  
	  <div class="item">
								<?php
	
	$stmt = $DB_con->prepare("SELECT image_name FROM `home_image_slideshow` where slideshow_active='A' order by id DESC LIMIT 1 OFFSET 4");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-12">
				
				<img src="admin/include/images/slideshow/<?php echo $row['image_name']; ?>"  class="img-responsive " style="width:100%; height:400px"/>
				
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found
            </div>
        </div>
        <?php
	}
	?>
	
      </div>
	  
    </div>
    	
  </div>
	
	</div>	
		
</div>
	</div>	