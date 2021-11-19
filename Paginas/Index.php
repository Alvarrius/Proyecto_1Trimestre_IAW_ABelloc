<?php include("../Foot_Head/header.php"); ?>


<?php 
include("../Admin/config/bbdd.php");

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Bienvenidos y a comprar <img src='../Imagenes/logos/alien_emoticono.png' width="60" alt='Cpus'/> <img src='../Imagenes/logos/fachero_emoji.png' width="40" alt='Cpus'/></h1>
    </div>
    
  
    <?php foreach($listaproductos as $producto ) { ?>
    
      <div class="col-md-3 text-center">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><?php echo $producto['nombre_producto']; ?></h4>
          </div>
          <div class="card-body">
            <img class="card-img-top" src="../Imagenes/Productos/<?php echo $producto['imagen']; ?>"/>
            <p class="list-unstyled mt-3 mb-4">
            <?php echo $producto['descripcion']; ?>
            </p>
            <h1 class="card-title pricing-card-title"><?php echo $producto['precio_producto']; ?><small class="text-muted fw-light">€</small></h1>
            <h1 class="card-title pricing-card-title"><small class="text-muted fw-light">(IVA Incl.)</small></h1><br>
            <a href='./anadircarrito.php?txtID=<?php echo $producto['id_producto'];?>&txtNombre=<?php echo $producto['nombre_producto'];?>&precio=<?php echo $producto['precio_producto']; ?>&imagen=<?php echo $producto['imagen'];?>'><button type="button" class="w-100 btn btn-lg btn-outline-primary">Añadir al carrito</button></a>          
          </div>
        </div>
      </div>
      
    
    <?php } ?>
  
<?php include("../Foot_Head/footer.php"); ?>
