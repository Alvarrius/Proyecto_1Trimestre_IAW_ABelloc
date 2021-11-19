<?php include("../Foot_Head/header.php"); ?>

  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">CARRITO <img src='../Imagenes/logos/carrito.jpg' width="70" alt='Cpus'/></h1>
  </div>
  
  <main>
  <h1>Mi carrito</h1>
    <p><a href="vaciarcarrito.php">Vaciar carrito</a></p>
    <?php
        session_start();
         ?>
        <h2>Productos en carrito:</h2>
        <?php
        if(empty($_SESSION)){
            echo "<p>Esta vacio</p>";
        } ?>
        <table class="table table-bordered">
        <tr>
            
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>           
        </tr>
        <?php foreach ($_SESSION as $result){ ?>
            <tr>
            
            <td><?php echo $result[1]; ?></td>
            <td><img class="img-thumbnail rounded" src="/Proyecto_Trimestre_Abelloc/Imagenes/Productos/<?php echo $result[3]; ?>" width="60" alt=""/></td>
            <td><?php echo $result[2]; ?> € (IVA Incl.)</td>
            </tr>     
        <?php } ?>
            <tr>
            <?php
                $productostotal=0.00; 
                foreach($_SESSION as $result) {
                $productostotal=(float)$result[2]+(float)$productostotal;
                }; ?>
              <td></td>
              <td></td>
              <td><b><u>Precio TOTAL:</u></b> <?php echo "$productostotal";?> € (IVA Incl.)</td>
            </tr>
        </table>

        
    
  </main>

<?php include("../Foot_Head/footer.php"); ?>   

