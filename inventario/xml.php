<?php
include("sesion.php");
$sql="SELECT * FROM productos";
$conProd=mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="estilos/estilosB.css">
    <title>Producto</title>
    
</head>
<body>
	<div>
		<h1>Productos disponibles</h1>
		<table >
						<thead class="table">
							<tr>
								<th>Id</th>
								<th>Producto</th>
								<th>Marca</th>
								<th>Proveedor</th>
								<th>Cantidad</th>
								<th>Costo</th>    
							</tr>
						</thead>

						<tbody>
							<?php
							
								while($row=mysqli_fetch_array($conProd)){
							?>
							<tr>
								<th><?php echo $row['idProducto']?></th>
								<th><?php echo $row['producto']?></th>
								<th><?php echo $row['marca']?></th>
								<th><?php echo $row['proveedor']?></th>
								<th><?php echo $row['cantidad']?></th>
								<th><?php echo $row['costo']?></th> 
							</tr>
							<?php
							}
							?>

						</tbody>
		</table >
	</div>
	<div class="xml">
		<h1>XML</h1>
		<?php
			include("sesion.php");
			$query="SELECT * FROM productos";
			$result = filterRecord($query);

			function filterRecord($query)
			{
				include("sesion.php");
				$filter_result = mysqli_query($con, $query);
				return $filter_result;
			}

			$result = filterRecord($query);
			$cadena= mysql_XML($result);
			echo $cadena;

			function mysql_XML($resultado)
			{
				// creamos el documento XML		
				//header ("Content-type: text/xml");
				$contenido = '&lt; informacion &gt;<br>';
				
				while ($row = mysqli_fetch_array($resultado)) {
					$contenido.="&lt;productos&gt;"; 
					$contenido.="&lt;idProducto&gt;".$row['idProducto']."&lt;/idProducto&gt;";
					$contenido.="&lt;producto&gt;".$row['producto']."&lt;/producto&gt;";
					$contenido.="&lt;marca&gt;".$row['marca'] ."&lt;/marca&gt;";
					$contenido.="&lt;proveedor&gt;".$row['proveedor']."&lt;/proveedor&gt;";
					$contenido.="&lt;cantidad&gt;".$row['cantidad']."&lt;/cantidad&gt;";
					$contenido.="&lt;costo&gt;".$row['costo']."&lt;/costo&gt;";
					$contenido.="&lt;/productos&gt;<br>";	
				}

				$contenido.='&lt; /informacion &gt;';
				return $contenido;
			}
			?>
	 <br>
	</div> <br>
	<form class="salir2"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>
	
</body>
</html> 