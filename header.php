
<?php 
session_start();




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
      <title>Optica Ceop</title>
    <link rel=”stylesheet” type=”text/css” href=”estilos.css”>
    </head>
    
    <style>

      


     body{

      padding:3px;
     }

    .prueba{


        background-color:red;
        width:40px;
        height:40px;
        clip-path: polygon(0% 0%, 100% 300px, 100% 100%, 0% calc(100% – 50px));
    }

    .imagenPadre{

        
        position: relative;
        height:400px;
    

       


    }

    .imagenHeader{

       
        position: absolute;
        width:100%;
        height:400px;
        border-radius:12px;
      
    }

    .imagenEfectoBlue{
        background-color:rgba(116, 159, 223, 0.5);
        width:100%;
        height:350px;
        position: absolute;
        border-radius:10px;

    }

      li{

      color: gray;
      border-right: 2px solid gray;
      display:inline-block;
      margin-left:30px;
      padding-right:30px;
    }
    .Marca{

        
        width:100px;
        height:100px;
        color: rgba(12, 2, 54, 0.9);
        font-size:28px;
        margin-top:30px;
        font-family: 'Kotta One', serif;
        margin-left:30px;
        text-align:center;
        font-weight:bold;
        
    }
    .Flex{
        display:flex;
    }


    table{

        backgroundscolor:white;
        border-style: double;
        border-width: 2px;
        
    }

    td {

        backgroundscolor:white;
        border-style: double;
        border-width: 2px


    }

    hr{

        width:7px;
        background-color:cyan;
    }
    
    
    .carrusel {
    padding:30px;
    display:inline-block;
    width:400px;
    height:500px;
    background-color:aqua;


  }
  .filter{

    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }

}



</style>


</head>
<body>
<nav><ul><li>Prueba Crud PHP</li><li>Nosotros</li><li><a href="?action=salir"><button class="btn btn-danger">Dejar session</button></a></li><li></li><li style="float: right;"><img src="imagenes/user.jfif" alt="" width="30px" height ="30px"></li></ul></nav>

<div class="container">
<div class="row">
 <div class="col-3"><img src="imagenes/logo.jpeg" alt="" width="300px" height ="250px"></div>
 <div class="col-6"><img src="imagenes/logo.jfif" alt="" width="900px" height="250px" class="filter"></div>
 <div class="col-3"><div class="Marca" style="padding-top:40px;"></div></div>


</div>

<div class="row">
 <div class="col-3"></div>
 <div class="col-6"><h2>Bienvenido a la Junta de accion comunal barrio  quiroga Primer Sector</h2></div>
 <div class="col-3"></div>


</div>
<div class="row">
  <br>
  <hr>
</div>


</div>

<br><br>
<div>


<hr>



</div>


<br><br><br>





</figure>
</div>
<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Collapsed content</h5>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


</div>


<br><br>
<hr>





</body>
</html>
