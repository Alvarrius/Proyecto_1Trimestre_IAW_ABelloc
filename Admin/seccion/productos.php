<?php include("../cabecera_pie/cabeza_admin.php"); ?>
<?php 
    
    $txtID=(isset($_REQUEST['txtID']))?$_REQUEST['txtID']:"";
    $txtNombre=(isset($_POST['txtNombre']))?$_REQUEST['txtNombre']:"";
    $txtDesc=(isset($_REQUEST['txtDesc']))?$_REQUEST['txtDesc']:"";
    $precio=(isset($_REQUEST['precio']))?$_REQUEST['precio']:"";
    $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
    $accion=(isset($_REQUEST['accion']))?$_REQUEST['accion']:"";

 
    include("../config/bbdd.php");
    

    switch($accion){

        case "Agregar":

            //INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio_producto`, `imagen`) VALUES (NULL, 'PHP', 'Full facha', '1000.20', 'jesus.jpg');
            $sentenciaSQL= $conexion->prepare("INSERT INTO productos (nombre_producto,descripcion,precio_producto,imagen) VALUES (:nombre_producto,:descripcion,:precio_producto,:imagen);");
            $sentenciaSQL->bindParam(':nombre_producto',$txtNombre);
            
            $fecha= new DateTime();
            $NombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagendefecto.png";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!=""){

                move_uploaded_file($tmpImagen,"../../Imagenes/Productos/".$NombreArchivo);
            }

            $sentenciaSQL->bindParam(':descripcion',$txtDesc);
            $sentenciaSQL->bindParam(':precio_producto',$precio);
            $sentenciaSQL->bindParam(':imagen',$NombreArchivo);
            $sentenciaSQL->execute();
            header("Location:productos.php");
            break;
            

        case "Modificar":
            $sentenciaSQL= $conexion->prepare("UPDATE productos set nombre_producto=:nombre_producto where id_producto=:id_producto");
            $sentenciaSQL->bindParam(':nombre_producto',$txtNombre);
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("UPDATE productos set descripcion=:descripcion where id_producto=:id_producto");
            $sentenciaSQL->bindParam(':descripcion',$txtDesc);
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("UPDATE productos set precio_producto=:precio_producto where id_producto=:id_producto");
            $sentenciaSQL->bindParam(':precio_producto',$precio);
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

                $fecha= new DateTime();
                $NombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagendefecto.png";

                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
                move_uploaded_file($tmpImagen,"../../Imagenes/Productos/".$NombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos where id_producto=:id_producto");
                $sentenciaSQL->bindParam(':id_producto',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($producto["imagen"]) &&($producto["imagen"]!="imagendefecto.png") ){

                    if(file_exists("../../Imagenes/Productos/".$producto["imagen"])){

                        unlink("../../Imagenes/Productos/".$producto["imagen"]);
                    }
                }

                $sentenciaSQL= $conexion->prepare("UPDATE productos set imagen=:imagen where id_producto=:id_producto");
                $sentenciaSQL->bindParam(':imagen',$NombreArchivo);
                $sentenciaSQL->bindParam(':id_producto',$txtID);
                $sentenciaSQL->execute();

                
            }
            header("Location:productos.php");
            break;

        case "Cancelar":
            header("Location:productos.php");
            break;

        case "Seleccionar":
            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos where id_producto=:id_producto");
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            $txtNombre=$producto['nombre_producto'];
            $txtImagen=$producto['imagen'];
            $precio=$producto['precio_producto'];
            $txtDesc=$producto['descripcion'];
            
            // echo "Has Seleccionado";
            break;
    
        case "Borrar":
            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos where id_producto=:id_producto");
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($producto["imagen"]) &&($producto["imagen"]!="imagendefecto.png") ){

                if(file_exists("../../Imagenes/Productos/".$producto["imagen"])){

                    unlink("../../Imagenes/Productos/".$producto["imagen"]);
                }
            }

            $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE id_producto=:id_producto");
            $sentenciaSQL->bindParam(':id_producto',$txtID);
            $sentenciaSQL->execute();
            
            header("Location:productos.php");
            break;


    }

    $sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
    $sentenciaSQL->execute();
    $listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
    
<main>      
<div class="container-fluid">
    <div class="row">
    <div class="col-md-5">

        <div class="card">
            <div class="card-header">
                Descripción de Productos
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <div class = "form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                    </div>

                    <div class = "form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
                    </div>

                    <div class = "form-group">
                    <label for="txtDesc">Descripcion:</label>
                    <input type="text" class="form-control" value="<?php echo $txtDesc; ?>" name="txtDesc" id="txtDesc" placeholder="Descripcion del producto">
                    </div>

                    <div class = "form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" class="form-control" value="<?php echo $precio; ?>" name="precio" id="precio" min="0" max="10000" step="0.01" placeholder="Precio del producto">
                    </div>

                    <div class = "form-group">
                    <label for="txtNombre">Imagen:</label>
                    </br>
                    <?php
                        if($txtImagen!=""){ ?>
                        
                        <img class="img-thumbnail rounded" src="../../Imagenes/Productos/<?php echo $txtImagen; ?>" width="50" alt="">

                       
                    <?php   } ?>
                    
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen del producto">
                    </div>

                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
                            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
                            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
                        </div>

                </form>
            </div>
            
        </div>
    
    </div>

    
    <div class="col-md-7">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaproductos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id_producto']; ?></td>
                    <td><?php echo $producto['nombre_producto']; ?></td>
                    <td>
                        
                    <img class="img-thumbnail rounded" src="../../Imagenes/Productos/<?php echo $producto['imagen']; ?>" width="50" alt="">

                    </td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio_producto']; ?></td>

                    <td>

                        <form method="post">

                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id_producto']; ?>">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                        </form>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
    </div>
    </div>
</main>
<?php include("../cabecera_pie/pie_admin.php"); ?>


