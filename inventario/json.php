<?php
include("sesion.php");
$query="SELECT * FROM productos";
$conProd=mysqli_query($con, $query);
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
	<div class="estilojson">
		<h1>JSON</h1>
		<?php
			include("sesion.php");   
            //generamos la consulta
            $sql = "SELECT * FROM productos";
            mysqli_set_charset($con, "utf8"); //formato de datos utf8

            if(!$result = mysqli_query($con, $sql)) die();

            $usuarios = array(); //creamos un array
            while($row = mysqli_fetch_array($result)) 
            { 	
                $idProducto=$row['idProducto'];
                $producto=$row['producto'];
                $marca= $row['marca'] ;
                $proveedor=$row['proveedor'];
                $cantidad=$row['cantidad'];
                $costo=$row['costo'];
                
                $productos[] = array('idProducto'=> $idProducto, 'producto'=> $producto, 'marca'=> $marca,
                                    'proveedor'=> $proveedor,'cantidad'=> $cantidad, 'costo'=> $costo);

            }
                
            //desconectamos la base de datos
            $close = mysqli_close($con) 
            or die("Ha sucedido un error inexperado");
            

            //Creamos el JSON
            $json_string = json_encode($productos);
            echo $json_string;

            //Si queremos crear un archivo json, sería de esta forma:
            /*
            $file = 'productos.json';
            file_put_contents($file, $json_string);
            */
	
	    ?>
	 <br> <br>
	</div> <br>
	<form class="salir2"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>
	
</body>
</html> 