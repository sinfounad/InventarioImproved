 
<?php 


require_once "querysTest.php";
session_start();
$alm = new Usuario();
$model = new UsuarioModel();
$session=null;
$Mensaje="Ingresa tu usuario y contraseña";
//session_destroy();





if(isset($_REQUEST['Access']))
{
  $Usuario= $_REQUEST['Usuario']; 
  $Contraseña= $_REQUEST['Contraseña'];
     

 
  $session=$model->ObtenerUser($Usuario, $Contraseña);
  if($session=1){

    $_SESSION['Login']=true;
    
  if($_SESSION['Login']==true){
    
     header('Location:usuarios.php');

  
 }
  }

  
}



?>





<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Kotta+One&display=swap" rel="stylesheet">
      <title>Optica Ceop</title>
    <link rel=”stylesheet” type=”text/css” href=”estilos.css”>
    </head>

    <body>

  <style>
    .formulario{
    
    
    position: relative;
    background-color:aqua;
    width:40%;
    height:400px;
    border-radius:12px;
    display:block;
    padding:30px;
    margin-left:30%;
    margin-bottom:4px;
    
    }
    
    .formulario2{
    
    
    position: relative;
    background-color:rgb(138, 196, 196);
    width:40%;
    height:400px;
    border-radius:12px;
    display:block;
    padding:30px;
    margin-left:30%;
    margin-bottom:4px;
   
    }
    .linea{


        border-style: double;
        border-width:4px;
        border-color: red;
    }
    .marcaForm{

      font-family: 'Kotta One', serif;
      font-weight:bold;
      font-size:26px;
      color:rgb(18, 4, 95);

    }
    .formStyle{
      width:50%;
      text-align: center;
      margin-left:25%;
      padding:20px;
    }
    input{

      height:30px;
      width:200px;
    }
    .sizeButton{
      height:40px;
      width:120px;

    }
    .title{
      font-family: 'Kotta One', serif;
      font-weight:bold;
      font-size:18px;
    }

    </style>
    
    

    
<div class="container">

<div class="row">
  <div class="col-sm-4">
   
   
  </div>

  <?php
  if(isset($Msg_UsarioIncorrecto )){
    
  ?>
    <div class="col-sm-4">
    
    <h3 style="text-align:center;"><?php echo $Msg_UsarioIncorrecto?></h3>        
    
  </div>
  <?php
    }
  ?>
  <div class="col-sm-4">
   
  </div>
  
  
  <hr class="linea"><br>
 
</div>


<div class="container formulario2" id="crearUsu">



<div class="row">
  <div class="col-sm-4">
                
                <img src="imagenes/Logo.png" alt="Logo" width="50px" height="50px">
                
              </div>
                <div class="col-sm-4 title">
                Inicia Sesion
                
                
              </div>
              <div class="col-sm-4">
                <h3 class="marcaForm"></h3>        
                
              </div> 
              <hr class="linea">
    
  </div>


  <form action="" method="post" class="formStyle">

   <h4>Usuario</h4>
   <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>"/><br>
   <input type="hidden" name="Access" value=""/><br>
   <input type="text" name="Usuario" required/><br><br>
   <h4>Contraseña</h4> <br>
    <input type="password" name="Contraseña" required ?><br><br>
    <button type="submit" class="btn btn-primary sizeButton">Guardar</button><br>
              
</form>
   

    <hr class="linea">
</div>

</div>

</body>
</html>

<?php

require_once "footer.php";
?>
