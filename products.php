<?php
    
session_start();
	include("admin/php/connect_to_mysql.php");
	include("admin/php/myFunctions.php");
	$u="";
	if(isset($_SESSION['valid_uid']))
	{$u=base64_encode($_SESSION['valid_uid']);}
	$displayProdCat = "";
	$prodCatCtr = 0;
	if(!empty($_GET['keyword'])){
		$productName = $_GET['keyword'];
		$sqlSelectSearchProduct = mysql_query("select * from tblproduct where prod_name like '$productName%'") or die(mysql_error());
		if(mysql_num_rows($sqlSelectSearchProduct) >= 1){
			while($getRowSearchProduct = mysql_fetch_array($sqlSelectSearchProduct)){
				$prodNo = $getRowSearchProduct["prod_no"];
				//$prodId = $getRowSearchProduct["prod_id"];
				$prodName = $getRowSearchProduct["prod_name"];
				$prodPrice = $getRowSearchProduct["prod_price"];
				
				$displayProdCat .= '<div class="col col_14 product_gallery">
				<a href="productdetail.php?p='.base64_encode($prodNo).'&sd='.base64_encode($u).'"><img src="images/product/'.$prodNo.'.jpg" width="170" height="150" /></a>
				<h3>'.$prodName.'</h3>
				<p class="product_price">₹'.$prodPrice.'</p>
				<a href="logcheck.php?p='.base64_encode($prodNo).'&sd='.$u.'" class="add_to_cart">BUY</a></div>';
			}
		}
		else{
		$displayProdCat .='<center><br><br><br><p style="color:#009688;font-size:16px;">"'.$productName.'"<span>&nbsp;&nbsp;&nbsp;</span>is not available</p></center>';}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>getmybooks</title>
<link href="css/slider.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<link rel="stylesheet" type="text/css" href="css/styles.css" />

<script language="javascript" type="text/javascript">

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

</head>

<body id="subpage">

<div id="main_wrapper">
	<div id="main_header">
    	<div id="site_title"><h1><font color="#000000" size="+1"><img src='images/get1.png' style="opacity:0.78;"/></font></h1></div>
        
        <div id="header_right">
            <div id="main_search">
                <form action="products.php" method="get" name="search_form">
                  <input type="text" value="Search" name="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
         </div> <!-- END -->
    </div> <!-- END of header -->
    
    <div id="main_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="user.php">Home</a></li>
            <li>&nbsp;&nbsp;&nbsp;</li>
            <li>&nbsp;&nbsp;&nbsp;</li>
			<!--<li><a href="login.php">Login</a></li>
            <li><a href="about.php">About</a></li>
			<li><a href="admin/index.php">Admin Login</a></li> -->
        </ul>
        <br style="clear: left" />
    </div> <!-- end of menu -->
    
    <div class="cleaner h20"></div>
    <div id="main_top"></div>
    <div id="main">
    	
        <div id="sidebar">
            <h3>Categories</h3>
            <ul class="sidebar_menu">
               
           	<li><a href='index.php?cat=Engineering'>Engineering</a></li>
<li><a href='index.php?cat=Technology'>Technology</a></li>
<li><a href='index.php?cat=compitative '>compitative </a></li>
<li><a href='index.php?cat=Teaching Resources'>Teaching Resources</a></li>
<li><a href='index.php?cat= Medical'> Medical</a></li>
<li><a href='index.php?cat=computing'>computing</a></li>
<li><a href='index.php?cat=Art and Photography'>Art & Photography</a></li>
<li><a href='index.php?cat=Audio Books'>Audio Books</a></li>
<li><a href='index.php?cat=Biography'>Biography</a></li>
<li><a href='index.php?cat=Business, Finance and Law'>Business, Finance & Law</a></li>
<li><a href='index.php?cat=Crime and Thriller'>Crime & Thriller</a></li>
<li><a href='index.php?cat=Dictionaries and Languages'>Dictionaries & Languages</a></li>
<li><a href='index.php?cat=Entertainment'>Entertainment</a></li>
<li><a href='index.php?cat=Health'>Health</a></li>
<li><a href='index.php?cat=History and Archaeology'>History & Archaeology</a></li>
<li><a href='index.php?cat=Humour'>Humour</a></li>
<li><a href='index.php?cat=Mind, Body and Spirit'>Mind, Body & Spirit</a></li>
<li><a href='index.php?cat=Natural History'>Natural History</a></li>
<li><a href='index.php?cat=Personal Development'>Personal Development</a></li>
<li><a href='index.php?cat=Poetry and Drama'>Poetry & Drama</a></li>
<li><a href='index.php?cat=Reference'>Reference</a></li>
<li><a href='index.php?cat=Religion'>Religion</a></li>
<li><a href='index.php?cat=Science and Geography'>Science & Geography</a></li>
<li><a href='index.php?cat=Science Fiction'>Science Fiction</a></li>
<li><a href='index.php?cat=Society and Social Sciences'>Society & Social Sciences</a></li>
<li><a href='index.php?cat=Sport'>Sport</a></li>
<li><a href='index.php?cat=Teaching Resources'>Teaching Resources</a></li>
<li><a href='index.php?cat=Transport'>Transport</a></li>
<li><a href='index.php?cat=Travel and Holiday Guides'>Travel & Holiday Guides</a></li>
		</ul>
        </div> <!-- END of sidebar -->
        
        <div id="content">
		<?php echo $displayProdCat; ?>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    <div id="main_footer">   
        <div class="cleaner h40"></div>
		<center>
			Copyright © 2015 getmybooks.co
		</center>
    </div> <!-- END of footer -->   
   
</div>


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>
