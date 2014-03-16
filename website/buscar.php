<?php
/* Asunto: Buscador de textos en BBDD.
/* Descripción: Buscar un texto en todos los campos dentro de las tablas seleccionadas de una Base de Datos local o remota.
/* Fecha: Mayo 2007
/*
/* Marcos Rojas / mrojas@2mdc.com
/*
/* [Código de libre distribución]
/* www.2mdc.com
*/


//Desactivamos la notificación de errores en el script
ini_set('display_errors','0');


//Se inicia la sesion:
session_start();


//Si hago logout
if(isset($_GET['salir'])){

	session_unset();
	session_destroy();
	header("Location: ".$_SERVER['PHP_SELF']);
	exit();

}


?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

function remarcar($cadena,$strip=TRUE){

		if($strip==TRUE) $cadena=strip_tags($cadena);

		$palabra=strtolower($_POST['palabra']);
		$cadena=str_replace ( $palabra, '<span style="color: red;">'.$palabra."</span>", $cadena);

		$palabra=ucfirst($palabra);
		$cadena=str_replace ( $palabra, '<span style="color: red;">'.$palabra."</span>", $cadena);

		$palabra=strtoupper($palabra);
		$cadena=str_replace ( $palabra, '<span style="color: red;">'.$palabra."</span>", $cadena);

		return $cadena;
		
}

//Si es la 1a vez que entro (sin pasar variables por formulario) y la variable de sesión está vacía, pinto el formulario de acceso-conexión:
if(empty($_POST) && empty($_SESSION['servidor'])){

?>

<form name="forma" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

Servidor/URL <input type="text" name="servidor" value="localhost">

Base de Datos <input type="text" name="bbdd" value="">

Usuario  <input type="text" name="usuario" value="">

Password <input type="password" name="password" value="">

<input type="submit" name="abrir" value="Abrir BBDD">

</form>

<?

//salgo de la ejecución:
exit();

}

//------------------------------------------------------------------------------------------

//2a entrada, con campos del formulario POST llenos:
else{
		//limpiamos los campos
		if(isset($_POST['servidor'])){
				$_SESSION['servidor']		=	addslashes(trim($_POST['servidor']));
				$_SESSION['usuario']		=	addslashes(trim($_POST['usuario']));
				$_SESSION['password']		=	addslashes(trim($_POST['password']));
				$_SESSION['bbdd']			=	addslashes(trim($_POST['bbdd']));
		}		


		//conectamos a la BBDD:
		$conexion=mysql_connect($_SESSION['servidor'],$_SESSION['usuario'],$_SESSION['password']) or exit('Error en la conexi&oacute;n<br><a href="'.$_SERVER['PHP_SELF'].'?salir=true">Volver</a>');

		//seleccionamos cierta base de datos:
		$seleccion=mysql_select_db($_SESSION['bbdd']) or exit('Error en la seleccion de la BBDD<br><br><a href="'.$_SERVER['PHP_SELF'].'?salir=true">Volver</a>');

		//si logramos conectar lo registramos en la sesion:	
		$_SESSION['conectado']=($seleccion!==FALSE)? TRUE : FALSE;




		//Estamos conectados pero aun no hemos enviado la busqueda. Vemos las tablas de la BBDD en cuestion llamando a explora_BD()
		if($_SESSION['conectado'] && (!isset($_POST['palabra']) || isset($_POST['abrir'])) ){
				
				if ($seleccion!==FALSE){
				
						echo 'Conexi&oacute;n establecida como '.$_SESSION['usuario']."@".$_SESSION['servidor']." en ".$_SESSION['bbdd'].'.<hr color="#992222">';
						explora_BD();
				
				}
		
		}
		//Ya hemos explorado y pasamos un formulario con un array $_POST['tabla'] generado por los checkboxes de tablas.
		else{
				
				//registro el tiempo inicial:
				$tiempo_ini=microtime();

				//Abro una a una las tablas y miro entre sus columnas buscando el valor pasado:
				foreach($_POST['tabla'] AS $indice => $valor){

						$cad="SHOW COLUMNS FROM ".$_SESSION['bbdd'].".".$valor;
						$que=mysql_query($cad) or exit($cad);

						$cad_or="SELECT * FROM ".$valor." WHERE ";
						$nombre_columna=Array();

						//Monto una cadena SQL con ORs por cada columna hallada en la tabla: WHERE columna1 LIKE "%%" OR columna2 LIKE "%%"...
						while($fila=mysql_fetch_array($que)){

								//Genero array de nombres de columna:
								$nombre_columna[]=$fila[0];
								//empalmo cadena de SQL
								$cad_or.=" ".$fila[0]." LIKE '%".$_POST['palabra']."%' OR ";

						}

						//Pinto una cabecera:

						echo'<br><table width="100%"><tr><td colspan="'.count($nombre_columna).'">';
						echo '<h3>Busqueda de palabra '.$_POST['palabra'].' en tabla '.$valor.':</h3>';
						echo '</td></tr>';

						//Pinto los nombres de las columnas con el array generado antes:
						echo '<tr>';

						for($j=0;$j < count($nombre_columna);$j++){
									echo '<td bgcolor="#992222"><b><font face="arial" size="2" color="#ffffff">'.$nombre_columna[$j]."</font></b></td>";
						}

						echo "</tr>";

						//Ajusto la cadena SQL creada, limpiando el último OR que sobra:
						$cad_or=substr($cad_or, 0,-3);

						//Consulto
						$quet=mysql_query($cad_or);

						//Resultados de busqueda en todas las columnas de esta tabla.
						if(mysql_num_rows($quet)>0){

								while($filat=mysql_fetch_array($quet)){
					
										echo '<tr>';
										for($ind=0;$ind<count($filat)/2;$ind++){
												// Pinto contenido del registro resaltando en color la palabra buscada:
												echo '<td bgcolor="#999999" nowrap="true">'.remarcar($filat[$ind])."</td>";
										}	
										echo '</tr>';
		
								}


						}
				
						echo '</table>';

				}

				//Pinto un enlace para volver a buscar de nuevo
				echo '<br><hr color="#992222"><br><a href="'.$_SERVER['PHP_SELF'].'">Volver a buscar</a> <a href="'.$_SERVER['PHP_SELF'].'?salir=true">Salir de BBDD</a><br>';
						
				//Capturo el tiempo de nuevo.		
				$tiempo_fin=microtime();
		
				//Calculo y pinto estadísticas:
				echo "<br>Se ha tardado ";
				printf("%f",($tiempo_fin - $tiempo_ini));
				echo " segundos.";
					
	
		}

}


//--------------------------------------------------------------------------------------------------


//Funcion que explora la BBDD y pinta sus tablas:

function explora_BD(){

?>
<script type="text/javascript">

var marcados=true;
function marcatodos(){

if(marcados==false){
		for(i=0;i<document.forma.elements.length;i++){
		
			if(document.forma.elements[i].type=='checkbox')	document.forma.elements[i].checked=true;
		
		}
		marcados=true;
}
else{
		for(i=0;i<document.forma.elements.length;i++){
		
			if(document.forma.elements[i].type=='checkbox')	document.forma.elements[i].checked=false;
		
		}
		marcados=false;
}

}
</script>

<?php


echo '
<form name="forma" action="'.$_SERVER['PHP_SELF'].'" method="post">
<input type="checkbox" name="todos" value="todos" checked="checked" onclick="marcatodos()">Marcar todas las tablas:<br><br>';

//Consulto y pinto las tablas de la BBDD en cuestion:

$cad="SHOW TABLES";
$que=mysql_query($cad);

$i=0;
while($fila=mysql_fetch_array($que)){

		echo '<input type="checkbox" name="tabla[]" value="'.$fila[0].'" checked="checked">'." - ".$fila[0]."<br>\n";
		$i++;

}


//Pinto formulario de busqueda en BBDD:

echo '
<br><input type="text" name="palabra" value=""> Palabra <sup>(*) Insensible a Mayusculas/Minusculas, sensible a acentos</sup><br>
<br><input type="submit" name="buscar" value="Buscar"></form>
<hr color="#992222">
<a href="'.$_SERVER['PHP_SELF'].'?salir=true">Salir de BBDD</a>
';


}


?>
