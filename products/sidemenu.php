<style>
    	.list-group-horizontal .list-group-item {
			display: inline-block;
			
			vertical-align: top;
		}
		.list-group-horizontal .list-group-item {
			margin-bottom: 0;
			margin-left:-4px;
			margin-right: 0;
			vertical-align: top;
		}
		.wrap {
    max-width: 940px;
    margin: 0 auto ;
}


/*Menu !!!!*/
.menu {
    vertical-align: top;
    display: inline-block;
    margin: 10px ;
	border:2px solid #111312;
    
}
.menu-item {
    background-color: #FEFEFE;
    width: 200px;
    height: 150px;
    margin: 10px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
}
.mini-menu{
    width: 250px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #848C8F ;
    font-size: 11px;
    margin: 10px;
}
.mini-menu ul {
    list-style: none;
    margin: 0;
    padding:0;
    text-align:left;
}
.mini-menu > ul > li {
    position: relative;
}
.mini-menu > ul > li > a {
    display: block;	
    outline: 0;	
    padding: 1.2em 1em;	
    text-decoration: none;	
    color:#3C3D41;	
    font-weight: normal;
    letter-spacing: 2px;	
    background: #FEFEFE;
    border-bottom: 1.5px solid #EAEAEA;
   
}

.mini-menu .sub > ul {
    height: 0;
    overflow: hidden;
    background: #848C8F;
}
.mini-menu .sub > ul > li > a {
    font-family:  sans-serif;
    color:#FEFEFE;
    font-size: 12px;
    display: block;
    text-decoration: none;
    padding: .7em 1em;
    text-transform: capitalize;
    font-style: normal; 
    letter-spacing: 1px;
}
/*.mini-menu .sub > ul > li > a:hover,*/
.mini-menu .sub > a.active,
 {
    padding-left: 1.3em;
    color: blue;
    content: "1";
    float: right;
    margin-right:6px;
    line-height: 12px;
}
.mini-menu .sub >  a:after{
    content: "�";
    float: right;
    margin-right:6px;
    line-height: 12px;
}
    </style>
	<!--Menu-->
  <script type="text/javascript">
    $(document).ready(function () {
        $(".sub > a").click(function() {
            var ul = $(this).next(),
                    clone = ul.clone().css({"height":"auto"}).appendTo(".mini-menu"),
                    height = ul.css("height") === "0px" ? ul[0].scrollHeight + "px" : "0px";
            clone.remove();
            ul.animate({"height":height});
            return false;
        });
           $('.mini-menu > ul > li > a').click(function(){
           $('.sub a').removeClass('active');
           $(this).addClass('active');
        }),
           $('.sub ul li a').click(function(){
           $('.sub ul li a').removeClass('active');
           $(this).addClass('active');
        });
    });
</script>




<div class="menu">
        <div class="mini-menu">
            <ul>
        <li>
            <a href="dailybazar.php">Daily Bazar </a>
        </li>
		<li>
            <a href="fastfood.php">Fast Food </a>
        </li>
		<li>
            <a href="chinese.php">Chinese Food </a>
        </li>
        <li class="sub">
            <a href="#">Food </a>
            <ul>
               <li><a href="breakfast.php">Breakfast</a></li>
               <li><a href="beverages.php">Beverages</a></li>
               <li><a href="cooking.php">Cooking</a></li>
			   <li><a href="dairy.php">Dairy</a></li> 
			   <li><a href="meat.php">Fresh Meat</a></li>
               <li><a href="fish.php">Fresh Fish</a></li>
			   <li><a href="frozen.php">Frozen</a></li>
               <li><a href="fruits.php">Fresh Fruits</a></li>
               <li><a href="vegetables.php">Fresh Vegetables</a></li> 
			   <li><a href="snacks.php">Snacks</a></li>   
            </ul>
        </li>
        <li>
            <a href="medicine.php">Medicine </a>
        </li>
		<li>
            <a href="books.php">Books & Stationary </a>
        </li>
		<li>
            <a href="cosmetics.php">Cosmetics </a>
        </li>
		<li>
            <a href="household.php">Household </a>
        </li>
		<li>
            <a href="builders.php">Builders Item </a>
        </li>
		<li>
            <a href="sports.php">Sports </a>
        </li>
        <li class="sub">
            <a href="#">Fashion & Beauty </a>
            <ul>
				<li><a href="#">Men</a></li>
               <li><a href="#">Women</a></li>
               <li><a href="#">Kids</a></li>
            </ul>
        </li>
		<li class="sub">
            <a href="#">Electronics </a>
            <ul>
				<li><a href="#">Smartphone</a></li>
               <li><a href="#">Televisions</a></li>
               <li><a href="#">Computers</a></li>
            </ul>
        </li>
		<li class="sub">
            <a href="#">Appliances </a>
            <ul>
				<li><a href="#">Home Appliances</a></li>
               <li><a href="#">Kitchen Appliances</a></li>
            </ul>
        </li>
    </ul>
        </div>
    </div>