<?php 
    $mysqli = new mysqli("127.0.0.1", "root", "August2007", "barcampsps");
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

 
$query = "select * from participants;";





  $time=null;
if (!empty($_POST["time1"])) {
    $time=$_POST["time1"];
} elseif (!empty($_POST["time2"])) {
    $time=$_POST["time2"];
} elseif (!empty($_POST["time3"])) {
    $time=$_POST["time3"];
} elseif (!empty($_POST["time4"])) {
    $time=$_POST["time4"];
} elseif (!empty($_POST["time5"])) {
    $time=$_POST["time5"];
} elseif (!empty($_POST["time6"])) {
    $time=$_POST["time6"];
}

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
{
//echo 'yes';
if(empty($time)||empty($_POST["name"])||empty($_POST["tema"]))
   $error="esta malo";
 else
 {
    $error="";
 

  
 $stmt = $mysqli->stmt_init();
 $stmt = $mysqli->prepare("INSERT INTO participants(name,time,tema) VALUES (?, ?,?)");
 $stmt->bind_param('sss', $_POST["name"],$time,$_POST["tema"]); 

$OK=$stmt->execute(); 
$stmt->close();
$error=null;
   // Redirect to this page.
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();

}
}else
{
	$error=null;
}
//echo $OK;
?>


<!DOCTYPE html>
<html lang="es-419">
<head>
	<meta charset="utf-8" />
	<title>Barcamp San Pedro Sula</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo.min.js" type="text/javascript"></script>
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/functions.js" type="text/javascript"></script>
<style>
table
{
     border-collapse:collapse;
}
table, td, th
{
    border:1px solid black;

}
</style>	
</head>
<body>
	
	<div id="wrapper">
		<!--
		<div class="header-right">
			<div class="socials">
				<a href="https://www.facebook.com/BarcampSPS" target="_blank" class="facebook-ico">facebook</a>
				<a href="https://twitter.com/BarcampSPS" target="_blank" class="twitter-ico">twitter</a>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<div class="cl">&nbsp;</div>
		-->
		<div class="header" style="padding-top:70px;">	
			<div class="shell" >
				<h1 id="logo"><a href="#">barcampsps</a></h1>
				<nav id="navigation">
					<ul>
						<li><a href="javascript:$.scrollTo('#barcamp',800);">¿Qué es BarCamp?</a></li>
						<li><a href="javascript:$.scrollTo('#fecha-lugar',800);">Fecha y Lugar</a></li>
						<li><a href="javascript:$.scrollTo('#calendario',800);">Calendario</a></li>
						<li><a href="javascript:$.scrollTo('#participa',800);">Participa</a></li>
						<li><a href="javascript:$.scrollTo('#organizadores',800);">Organizadores</a></li>
						<li><a href="javascript:$.scrollTo('#patrocinadores',800);">Patrocinadores</a></li>						
					</ul>
				</nav>
				
				<div class="slider-holder">
					<span class="left"></span>
					<span class="right"></span>					
					<img src="css/images/barcampsps-logo.png"  style="margin-left:60px;height:280px;width:800px;"/>
				</div>
			</div>
		</div>
		
		
		<div class="main" >
			<div style="height:100px;" ></div>
			<div class="shell">
				
				<section id="fecha-lugar" class="cols">
					<div class="col">
						<h3>Fecha </h3>						
						<div class="cnt">
							<h4> 
								11 de Agosto 2013 
								<br/>
								8:00AM - 6:00PM
							</h4>
							
						</div>
					</div>
					<div class="col">
						<h3>Registrate</h3>
						<div class="cnt">
							<h4>Entrada Gratis</h4>
							
						</div>
					</div>
					<div class="col">
						<h3>Lugar</h3>						
						<div class="cnt">
							<p>
								Ceutec San Pedro Sula
								<br />
								<iframe width="320" height="154" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=ceutec+san+pedro+sula+honduras&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=47.215051,85.078125&amp;ie=UTF8&amp;hq=ceutec&amp;hnear=San+Pedro+Sula,+Cort%C3%A9s,+Honduras&amp;ll=15.530385,-88.031806&amp;spn=0.063173,0.008945&amp;t=m&amp;output=embed"></iframe><br />
							</p>
							
						</div>
					</div>
					<div class="cl">&nbsp;</div>
				</section>
				
				<section id="barcamp" class="cols">
					<h3> ¿Qué es BarCamp? </h3>
					<div style="text-align: justify;width:800px;font-size:14px;">
						<p> BarCamp es una red internacional de "desconferencias" (eventos abiertos y participativos), cuyo contenido es provisto por los participantes.</p>
						<p>Iniciada en Palo Alto, California 2005, BarCamp quickly grew into an international network of user-generated conferences, often focusing on early-stage web applications and related open source technologies, social protocols, and open data formats </p>
				    	<p>You might have heard BarCamp referred to as an unconference. That’s because there’s no speaker list or fixed schedule until the actual event. All content comes from attendees. Anyone can host a session, participate in discussions, demo a project, talk about code, share cautionary tales, and pretty much do anything techy or geeky. </p>
				    </div>
				</section>
				
				<section id="calendario" class="cols">
					<h3> Calendario </h3>
					<table>


					</table>	

					
				</section>

				<section id="participa" class="cols">
					<h3> Participa </h3>
    <form method="post" name="contactform" action="index.php" >        
        <table>
           <tr>
             <td align="center" width="190px">Nombre:</td>
             <td align="center" width="190px">Tema:</td>
             <td align="center" colspan="11">11 de Agosto</td>
           </tr>


           <tr>
              <td></td>
              <td></td>
              <td align="center" width="80px">9:00-9:40</td>
              <td align="center" width="80px">9:50-10:30</td>
              <td align="center" width="80px">10:40-11:20</td>
              <td align="center" width="80px">11:30-12:10</td>
              <td align="center" width="80px">1:30-2:10</td>
              <td align="center" width="80px">2:20-3:00</td>
              <td align="center" width="80px">3:10-3:50</td>
              <td align="center" width="80px">4:00-4:40</td>
              <td align="center" width="80px">4:50-5:30</td>
              <td align="center" width="80px">5:40-6:20</td>
           </tr>
           <?php 
              if ($result = $mysqli->query($query)) 
              {                
                $var1=null; $var2=null; $var3=null; $var4=null; $var5=null; $var6=null; $var7=null;
                 $var8=null; $var9=null; $var10=null;   
                  while ($row = $result->fetch_row()) 
                 {                                    
                   echo "<tr>";
                    echo "<td style='padding-left:15px;'>"; echo $row[1]; echo "</td>";
                    echo "<td style='padding-left:15px;'>"; echo $row[3]; echo "</td>";
                    if($row[2]=="9:00-9:40")
                    { 
                       echo "<td align='center'><input type='checkbox' name='time1' value='9:00-9:40' checked disabled";   echo "></td>";
                       $var1="disabled";
                    }
                    else 
                    {
                       echo "<td align='center'><input type='checkbox' name='time1' value='9:00-9:40' ";   echo "></td>";
                    }                     
                   
                    if($row[2]=="9:50-10:30")
                    {
                      echo "<td align='center'><input type='checkbox' name='time2' value='9:50-10:30' checked disabled"; echo"></td>";
                      $var2="disabled";
                    }
                    else
                    {
                      echo "<td align='center'><input type='checkbox' name='time2' value='9:50-10:30'"; echo"></td>";
                    }

                    if($row[2]=="10:40-11:20")
                    {
                        echo "<td align='center'><input type='checkbox' name='time3' value='10:40-11:20' checked disabled"; echo"></td>";
                        $var3="disabled";
                    }
                    else
                    {
                        echo "<td align='center'><input type='checkbox' name='time3' value='10:40-11:20'"; echo"></td>";
                    } 

                    if($row[2]=="11:30-12:10")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='11:30-12:10' checked disabled"; echo"></td>";
                      $var4="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='11:30-12:10'"; echo"></td>";
                    }              
                    if($row[2]=="1:30-2:10")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='1:30-2:10' checked disabled"; echo"></td>";
                      $var5="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='11:30-12:10'"; echo"></td>";
                    }                       
                    if($row[2]=="2:20-3:00")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='2:20-3:00' checked disabled"; echo"></td>";
                      $var6="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='2:20-3:00'"; echo"></td>";
                    }                       
                    if($row[2]=="3:10-3:50")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='3:10-3:50' checked disabled"; echo"></td>";
                      $var7="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='3:10-3:50'"; echo"></td>";
                    }                       
                    if($row[2]=="4:00-4:40")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='4:00-4:40' checked disabled"; echo"></td>";
                      $var8="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='4:00-4:40'"; echo"></td>";
                    }                       
                    if($row[2]=="4:50-5:30")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='4:50-5:30' checked disabled"; echo"></td>";
                      $var9="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='4:50-5:30'"; echo"></td>";
                    }                       
                    if($row[2]=="5:40-6:20")
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='5:40-6:20' checked disabled"; echo"></td>";
                      $var10="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center'><input type='checkbox' name='time4' value='5:40-6:20'"; echo"></td>";
                    }                       

                   echo "</tr>";
                 } 
                /* free result set */
                $result->close();
              }
           ?>
           <tr> 
              <td align='center' ><input type="text" name="name"></td>
              <td align='center' ><input type="text" name="tema"></td>
              <td align='center'><input type="checkbox" name="time1" value="9:00-9:40"  <?php echo $var1; ?> ></td>
              <td align='center'><input type="checkbox" name="time2" value="9:50-10:30" <?php echo $var2; ?> ></td>
              <td align='center'><input type="checkbox" name="time3" value="10:40-11:20" <?php echo $var3; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="11:30-12:10"  <?php echo $var4; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="1:30-2:10"<?php echo $var5; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="2:20-3:00"<?php echo $var6; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="3:10-3:50"<?php echo $var7; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="4:00-4:40"<?php echo $var8; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="4:50-5:30"<?php echo $var9; ?> ></td>
              <td align='center'><input type="checkbox" name="time4" value="5:40-6:20"<?php echo $var10; ?> ></td>

           </tr> 
           <tr style="border-style:none;height:40px;">
               <td style="border-style:none;border-width:0px;" colspan="10"> </td>           
               <td style="border-style:none;border-width:0px;" ><input type="submit" style="width:50px"value="Save"> </td> 
           </tr>
           <tr>
             <td colspan="6" style="border-style:none;border-width:0px;"></td>
              <td colspan="6" style="border-style:none;border-width:0px;">
               <?php 
                
                  
                  echo $error;

                 ?>
             </td>
           </tr> 
       </table>
      </form>  

					
				</section>

				<section id="organizadores" class="cols">
					<h3> Organizadores </h3>	

					<p> Mas informacion Proximamente </p>
				</section>

				<div id="patrocinadores" class="content">
					<h3>Patrocinadores</h3>
					<div class="entry">
						<div class="date">
							<strong style="font-size:15px;">Bar<small>2013</small></strong>
							<em>camp</em>
						</div>
						
						<div class="cnt">
							<h4>Aun No tenemos patrocinadores</h4>
							<p>Deseas colaborar? --> BarcampSanPedroSula@gmail.com</p>
							
						</div>
					</div>
					<!--
					<div class="entry" >
						<div class="date">
							<strong>22<small>2012</small></strong>
							<em>APR</em>
						</div>
						<div class="cnt">
							<h4>News Title 1 Goes Right Here</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie condimentum conse am leom. Aenean neque dolor, tristique eu fermentum quis, imperdiet tincidunt ligula. </p>
							
						</div>
					</div>
					-->
				</div>

				<div style="height:300px;"></div>
			</div>
		</div>
	
		<div id="footer-push" ></div>
	</div>
	
	<div id="footer" >
		<div class="shell">
			<div class="footer-nav">
				<div style="color:white;">
					Barcamp San Pedro Sula 
				</div>
			</div>
			<p class="copy">© Barcampsps 2013<span>
		</div>
	</div>
	<script type="text/javascript">
		window.scrollBy(0,70);
	</script>
</body>
</html>