<?php include("../Foot_Head/header.php"); ?>
<?php
  session_start();
  if($_POST){
    if(($_POST['usuario']=="alu")&&($_POST['password']=="123")){

      $_SESSION['usuario']="ok";
      $_SESSION['nombreUsuario']="123";
      header('Location:../Admin/inicio_admin.php');
    }else{
      $mensaje="Error: El usuario o contraseña son incorrectos";
    }



    
  }
?>

  <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">LOGIN <img src='../Imagenes/logos/login.png' width="50" alt='Cpus'/></h1>
  </div>
  
  <main>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Inicio de Sesion
            </div>
            <div class="card-body">
            <?php if(isset($mensaje)) {?>
               <div class="alert alert-danger" role="alert">
                <?php echo $mensaje; ?>
                <div align="center"><img src='../Imagenes/logos/ban.gif' width="60%" height="auto" alt='Cpus'/></div>
              </div>
              <?php } ?>
            
             
              

            <form method="POST">
              <div class = "form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Introduce el usuario">
              </div>
              <br>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Introduce su contraseña">
              </div>
              <br>
              <button type="submit" class="btn btn-primary mt-2">Iniciar Sesión</button>
            </form>
             
            </div>
           
          </div>
        </div>
      </div>
    </div>


  </main>

<?php include("../Foot_Head/footer.php"); ?>