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
     //$error="esta malo";
      $error="<font size='2'><img src='http://images.wikia.com/banjokazooie/images/a/ab/Warning_icon.png' width='15px' height='15px'><b> ERROR DE CAPA 8:</b> ¡No puedes dejar campos vacíos!</font>";
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
     //header("Location: " . $_SERVER['REQUEST_URI']);
    //document.getElementById("participa").scrollIntoView();
    header("Location: " . $_SERVER['http://dev.barcampsps.com/barcamp-2/index.php#participa']);
     //javascript:$.scrollTo('#participa',800);

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
    <link rel="stylesheet" href="css/flexslider.css" type="text/css"
        media="all" />

    <script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
    <script src="js/jquery.scrollTo.min.js" type="text/javascript"></script>

    <script src="js/functions.js" type="text/javascript"></script>    
    <link href="css/bootstrap.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="css/go-to-top.css" media="screen"/>

    <!--
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> 

    <link href="css/bootstrap.css" rel="stylesheet" media="screen">  -->
    
      <style>
      table {
        border-collapse: collapse;
      }

      table,td,th {
        border: 1px solid black;
      }
      </style>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=577641888949945";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </head>
    <body>
        
      <script src="bootstrap/js/bootstrap.min.js"></script>  
        
    <div class="header" style="padding-top: 70px;">      
      <div class="shell">

        <h1 id="logo">
          <a href="#">barcampsps</a>
        </h1>
        <nav id="navigation">
          <ul>
            <li><a href="javascript:$.scrollTo('#barcamp',800);">¿Qué
              es BarCamp?</a></li>
              <li><a href="javascript:$.scrollTo('#fecha-lugar',800);">Fecha
                y Lugar</a></li>
                <li><a href="javascript:$.scrollTo('#calendario',800);">Calendario</a></li>
                <li><a href="javascript:$.scrollTo('#participa',800);">Participa</a></li>
                <li><a href="javascript:$.scrollTo('#organizadores',800);">Organizadores</a></li>
                <li><a href="javascript:$.scrollTo('#patrocinadores',800);">Patrocinadores</a></li>
              </ul>
            </nav>

            <div class="slider-holder">
              <span class="left"></span> <span class="right"></span> <img
              src="css/images/barcampsps-logo.png"
              style="margin-left: 60px; height: 280px; width: 800px;" />
            </div>
          </div>
        </div>
        <div class="main">
          <div style="height: 100px;"></div>
          <div class="shell">

            <section  id="fecha-lugar" class="cols">
              <div class="col">
                <h3>Fecha</h3>
                <div class="cnt">
                  <h4>
                   Pendiente <br /> 8:00AM - 6:00PM
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
                  Ceutec San Pedro Sula <br />
                  <iframe width="320" height="154" frameborder="0" scrolling="no"
                  marginheight="0" marginwidth="0"
                  src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=ceutec+san+pedro+sula+honduras&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=47.215051,85.078125&amp;ie=UTF8&amp;hq=ceutec&amp;hnear=San+Pedro+Sula,+Cort%C3%A9s,+Honduras&amp;ll=15.530385,-88.031806&amp;spn=0.063173,0.008945&amp;t=m&amp;output=embed"></iframe>
                  <br />
                </p>

              </div>
            </div>
            <div class="cl">&nbsp;</div>
          </section>

          <section id="barcamp" class="cols">
            <h3>¿Qué es BarCamp?</h3>
            <div style="text-align: justify; width: 800px; font-size: 14px;">
              <p>BarCamp es una red internacional de "desconferencias"
                (eventos abiertos y participativos), cuyo contenido es provisto
                por los participantes.</p>
                <p>Iniciada en Palo Alto, California 2005, BarCamp 
                  rápidamente se convirtió en una red internacional de conferencias
                  generados por los usuarios, a menudo centradas en aplicaciones en 
                  fase inicial web y las tecnologías de código abierto relacionados,
                  protocolos sociales, y los formatos de datos abiertos.                
                </p>
                <p>
                  Usted puede haber oído BarCamp denomina desconferencia. Esto se debe a que no 
                  hay lista de oradores o el horario fijo hasta que el evento en sí. Todo el
                  contenido proviene de los asistentes. Cualquiera puede organizar una reunión, 
                  participar en las discusiones, un proyecto de demostración, charla sobre el código,
                  compartir cuentos con moraleja, y casi cualquier cosa tecnológica o geek.
                </p>
              </div>
            </section>

            <section id="calendario" class="">
              <h3>Calendario</h3>
              <div style="font-size:14px;">Estamos trabajando en los detalles, pero aquí está usualmente lo que sucede en BarCamp:</div>
              <table style="border-style:none;max-width:1100px;">
                <tr style="border-style:none;height:200px;">
                  <td style="border-style:none; max-width:300px;">
                    <div style="color:#c61024;font-size:16px;text-align:center;height:30px"><b>Inscripción y KICK-OFF</b></div>  
                    <div style="" /> </div>        
                    <div style="color:#c61024" /> 8:00am - 8:50am (Aug. 10)  8:00am - 8:50am (Aug. 11) </div>        
                    <div style="text-align:justify;margin-left:5px;font-size:14px;">
                      Empezamos el día con una sesión corta para cualquier persona que presente los temas de discusión.
                    </div>  
                  </td> 
                  <td style="width:390px;border-style:none;padding-left:50px">
                   <div style="color:#c61024;font-size:16px;text-align:center;height:30px;"><b>Sesiones Matutinas</b> </div>
                   <div style="" /></div>         
                   <div style="color:#c61024" /> 9:00am - 12:10pm (Aug. 10)  9:00am - 12:10pm (Aug. 11) </div>                           
                   <div style="text-align:justify;margin-left:5px;font-size:14px;">
                    Varias sesiones tendrán lugar en diferentes salas durante el día.Echa un vistazo a la 
                    <a href="javascript:$.scrollTo('#participa',800);"
                    >pared</a> del calendario para detalles de la sesión.                  
                  </div> 
                </td> 
                <td style="border-style:none;width:300px;padding-left:40px">
                  <div style="color:#c61024;font-size:16px;text-align:center;height:30px;"><b> Almuerzo </b> </div>                                
                  <div style="color:#c61024" />   12:10pm - 1:20pm (Aug. 10) 12:10pm - 1:20pm (Aug. 11)</div>        
                  <div style="text-align:justify;margin-left:5px;font-size:14px;">
                    Con tantos restaurantes en San Pedro Sula, que está obligado a encontrar algo que te gusta.
                  </div>  
                </td> 
              </tr>
              <tr style="margin-top:160px;">
                <td style="border-style:none; width:300px;">
                  <div style="color:#c61024;font-size:16px;text-align:center;height:30px"><b>Sesiones Vespertinas</b></div>  
                  <div style="" /> </div>        
                  <div style="color:#c61024" /> 1:30pm - 6:20pm (Aug. 10)  1:30pm - 6:20pm (Aug. 11) </div>        
                  <div style="text-align:justify;margin-left:5px;font-size:14px;">
                    Empezamos el día con una sesión corta para cualquier persona que presente los temas de discusión.
                  </div>  
                </td> 
                <td style="width:390px;border-style:none;padding-left:50px">
                 <div style="color:#c61024;font-size:16px;text-align:center;height:30px;"><b>Cierre y Diversion</b> </div>
                 <div style="" /></div>         
                 <div style="color:#c61024" /> 6:20pm - 8:00pm (Aug. 10)  6:20pm - 8:00pm (Aug. 11) </div>                           
                 <div style="text-align:justify;margin-left:5px;font-size:14px;">
                  Vamos a terminar el día con algunos refrescos se tendran videojuegos, a continuación, tomar una foto de grupo como esta. No se olvide de ayudar a limpiar las habitaciones!
                </div> 
              </td> 
              <td style="border-style:none;width:300px;padding-left:40px">
              </td>               
            </tr>            
          </table>
        </section>
        <section id="participa" class="cols">

          <h3>Participa</h3>
          <form method="post" name="contactform" action="index.php">  
            <table>
              <tr>
                <td align="center" width="190px" style="background:#e38559;"><font color="#7e2c11">Nombre:</font></td>
                <td align="center" width="190px" style="background:#e38559;"><font color="#7e2c11">Tema:</font></td>
                <td align="center" colspan="11" style="background:#e38559;"><font color="#7e2c11">11 de Agosto</font></td>
              </tr>


              <tr>
                <td></td>
                <td></td>
                <td align="center" width="80px" style="background:#f2dacc;">9:00-9:40</td>
                <td align="center" width="80px" style="background:#f2dacc;">9:50-10:30</td>
                <td align="center" width="80px" style="background:#f2dacc;">10:40-11:20</td>
                <td align="center" width="80px" style="background:#f2dacc;">11:30-12:10</td>
                <td align="center" width="80px" style="background:#f2dacc;">1:30-2:10</td>
                <td align="center" width="80px" style="background:#f2dacc;">2:20-3:00</td>
                <td align="center" width="80px" style="background:#f2dacc;">3:10-3:50</td>
                <td align="center" width="80px" style="background:#f2dacc;">4:00-4:40</td>
                <td align="center" width="80px" style="background:#f2dacc;">4:50-5:30</td>
                <td align="center" width="80px" style="background:#f2dacc;">5:40-6:20</td>
              </tr>
              <?php 
              if ($result = $mysqli->query($query)) 
              {                
                $var1=null; $var2=null; $var3=null; $var4=null; $var5=null; $var6=null; $var7=null;
                 $var8=null; $var9=null; $var10=null;   
                  while ($row = $result->fetch_row()) 
                 {                                    
                   echo "<tr>";
                    echo "<td style='padding-left:15px; background:#aae8ff;'>"; echo $row[1]; echo "</td>";
                    echo "<td style='padding-left:15px; background:#aae8ff;#000000'>"; echo $row[3]; echo "</td>";
                    if($row[2]=="9:00-9:40")
                    { 
                       echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time1' value='9:00-9:40' checked disabled";   echo "></td>";
                       $var1="disabled";
                    }
                    else 
                    {
                       echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time1' value='9:00-9:40' ";   echo "></td>";
                    }                     
                   
                    if($row[2]=="9:50-10:30")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time2' value='9:50-10:30' checked disabled"; echo"></td>";
                      $var2="disabled";
                    }
                    else
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time2' value='9:50-10:30'"; echo"></td>";
                    }

                    if($row[2]=="10:40-11:20")
                    {
                        echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time3' value='10:40-11:20' checked disabled"; echo"></td>";
                        $var3="disabled";
                    }
                    else
                    {
                        echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time3' value='10:40-11:20'"; echo"></td>";
                    } 

                    if($row[2]=="11:30-12:10")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='11:30-12:10' checked disabled"; echo"></td>";
                      $var4="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='11:30-12:10'"; echo"></td>";
                    }              
                    if($row[2]=="1:30-2:10")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='1:30-2:10' checked disabled"; echo"></td>";
                      $var5="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='11:30-12:10'"; echo"></td>";
                    }                       
                    if($row[2]=="2:20-3:00")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='2:20-3:00' checked disabled"; echo"></td>";
                      $var6="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='2:20-3:00'"; echo"></td>";
                    }                       
                    if($row[2]=="3:10-3:50")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='3:10-3:50' checked disabled"; echo"></td>";
                      $var7="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='3:10-3:50'"; echo"></td>";
                    }                       
                    if($row[2]=="4:00-4:40")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='4:00-4:40' checked disabled"; echo"></td>";
                      $var8="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='4:00-4:40'"; echo"></td>";
                    }                       
                    if($row[2]=="4:50-5:30")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='4:50-5:30' checked disabled"; echo"></td>";
                      $var9="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='4:50-5:30'"; echo"></td>";
                    }                       
                    if($row[2]=="5:40-6:20")
                    {
                      echo "<td align='center' style='background:#ff503e;'><input type='checkbox' name='time4' value='5:40-6:20' checked disabled"; echo"></td>";
                      $var10="disabled";
                    }                      
                    else 
                    {
                      echo "<td align='center' style='background:#c5ff81;'><input type='checkbox' name='time4' value='5:40-6:20'"; echo"></td>";
                    }                       

                   echo "</tr>";
                 } 
                /* free result set */
                $result->close();
              }
           ?>
              <tr>
                <td align='center' style="background:#5bacc1;"><input type="text" name="name"></td>
                <td align='center' style="background:#5bacc1;"><input type="text" name="tema"></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time1"
                  value="9:00-9:40"<?php echo $var1; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time2"
                  value="9:50-10:30"<?php echo $var2; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time3"
                  value="10:40-11:20"<?php echo $var3; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="11:30-12:10"<?php echo $var4; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="1:30-2:10"<?php echo $var5; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="2:20-3:00"<?php echo $var6; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="3:10-3:50"<?php echo $var7; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="4:00-4:40"<?php echo $var8; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="4:50-5:30"<?php echo $var9; ?> ></td>
                <td align='center' style="background:#aaf33c;"><input type="checkbox" name="time4"
                  value="5:40-6:20"<?php echo $var10; ?> ></td>

              </tr>
              <tr style="border-style: none; height: 40px;">
                <td style="border-style: none; border-width: 0px;" colspan="10">
                </td>
                <td style="border-style: none; border-width: 0px;"><input
                  type="submit" style="width: 60px; border: 3px solid #44609D; background:#44609D; color:#fff; position:relative; left:500" value="Save"></td>
              </tr>
              <tr>
                <td colspan="6" style="border-style: none; border-width: 0px;"></td>
                <td colspan="6" style="border-style: none; border-width: 0px;">
                  <?php 
                
                  
                  echo $error;

                 ?>
                </td>
              </tr>
            </table>
                              </form>
                            </section>
                            <section id="organizadores" class="cols">
                              <h3>Organizadores</h3>
                              <table style="border-style:none;">
                               <tr style="border-style:none;">
                                <td style="border-style:none; width:300px;"> 
                                 <center><img src="images/jw.png" width="200" height="200"></center>
                               </td>
                               <td style="border-style:none; width:300px;"> 
                                 <center><img src="images/rs.png" width="200" height="200"></center>
                               </td>
                               <td style="border-style:none; width:300px;"> 
                                 <center><img src="images/ls.png" width="200" height="200"></center>
                               </td>
                               <td style="border-style:none; width:300px;"> 
                                 <center><img src="images/hs.png" width="200" height="200"></center>
                               </td>
                             </tr>
                             <tr style="border-style:none;">
                              <td style="border-style:none;">
                               <center><p><b>Joshua Welchez</b></p></center>
                             </td>
                             <td style="border-style:none;">
                               <center><p><b>Richard Siwady</b></p></center>
                             </td>
                             <td style="border-style:none;">
                               <center><p><b>Leonel Sánchez</b></p></center>
                             </td>
                             <td style="border-style:none;">
                               <center><p><b>Hector Sabillón</b></p></center>
                             </td>
                           </tr> 

                         </table>
                       </section>

                       <div id="patrocinadores" class="content">
                        <h3>Patrocinadores</h3>
                        <div class="entry">
                          <div class="date">
                            <strong style="font-size: 15px;">Bar<small>2013</small></strong>
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

        <div style="height: 300px;"></div>
      </div>
    </div>

    <div id="footer-push"></div>
    </div>

  <div id="footer">
    <div class="shell">
      <div class="footer-nav">        
        <!--<div style="color: white;border-style:solid">Barcamp San Pedro Sula</div>        -->
      </div>
      <p class="copy">
        © Barcampsps 2013<span>
        <div class="fb-like" data-href="https://www.facebook.com/BarcampSPS" data-send="false" data-width="450" data-show-faces="true" data-font="lucida grande"></div>
        <a href="https://twitter.com/BarcampSPS" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @BarcampSPS</a>
      </p>  
    </div>
    <a href="#" class="go-top" style="text-decoration:none; color:white;">Go Top</a>
  </div>

  <script type="text/javascript">
  window.scrollBy(0,70);
  </script>
  </body>
  </html>