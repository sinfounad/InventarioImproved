 
<?php 

require_once "querysPDO.php";
require_once "session.php";



$alm = new Inventario();
$model = new InventModel();

$Indice=0;

 if(isset($_REQUEST['action']))
{

  switch($_REQUEST['action'])
    {
        case 'Buscar_Us':
        $ParametroBuscar= $_REQUEST['ParamBuscar'];
        $_SESSION['id']=$ParametroBuscar;
        $resul=$model->Obtener_Inventario($ParametroBuscar);

        if(isset($_SESSION["Resultado_Usuario"])){
          $resul=$_SESSION["Resultado_Usuario"];
         

      }
      break;
      
      case'volver':
            //session_destroy();
          
            unset($_SESSION["SinResultados"]);
          
            header('Location:inventarios.php');
            break;
        

       

  

        
        }

        
     }
     
    
?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="Mean_script.js" language="javascript" type="text/javascript"></script>
  <link rel=stylesheet type="text/css" href="Estilos.css">
  <title>Document</title>
</head>

<body style="padding: 8px;">
   <div class="container">

   <style type="text/css"> 
   .italic {font-style: italic;} 
   .oblique {font-style: oblique;} 
   .fondoNav{background-color:black;
     width:100%;
  }
   </style> 

<!-- Button trigger modal -->


   <div class="row">
<nav class="fondoNav">

<div class="row">
<div class="col-4">

  <li class="nav-item">
  <a class="" href="../Menu.php">
    <img src="../imagenes/home.png" title="Agrega un usuario" alt="Nuevo"  width="30px" height="30px">
  </a>
  </li>

</div>
<div class="col-4">

<li class="nav-item">
    <a class="" href="registrar.php"><img src="../imagenes/new.png" title="Agrega un usuario" alt="Nuevo"  width="40px" height="40px">
  </a>
  </li>
</div>
<div class="col-4">

<li class="nav-item">
    <a class="" href="#"><img src="../imagenes/tel.png" title="Agrega un usuario" alt="Nuevo"  width="40px" height="40px">
  </a>
  </li>
</div>
</div>
</nav>
</div>


  <div class="row">
    <div class="col-lg-4 col-sm-1">
    
    </div>
    <div class="col-lg-4 col-sm-1">

    <br>
    <div class=""><span style="font-size:1.3vw margin-rigth:5px;">Buscar </span><span><img src="../imagenes/lupa_2.png" title="Agrega un usuario" alt="Nuevo"  width="30px" height="20px"></span>
    
    
     </div>
     <br>
     
    <div>
     <button class="btn btn-success" dropdown-toggle type="button" data-toggle="dropdown">
        Selecciona un Producto.
      </button>
    
      <ul class="dropdown-menu">
    <?php foreach($model->SeleccionarProducto() as $r): ?>
                    
                   
                      <li class="" onclick="DefinirProducto('<?php echo $r->Producto?>')"><a><?php echo $r->Producto?></a></li>
                      <span>   <?php $ret=$model->Obtener_Id_Producto($r->Producto); 
                        $Ext=count($ret);
                        $ArrayRegistrosFinales;
                       
                        if($Ext>0){

                          //echo $ret[0]->id;
                          $ArrayRegistrosFinales[$Indice]=$ret[0]->id;
                        
                          $Indice++;
                        } 

                     
                      ?></span> 
                     
   <?php
   
  
  
  endforeach; 
   
   
   ?>
    
    
  </ul> 
      <form action="?action=Buscar_Us" method="post"><input type="text" Name='ParamBuscar' id="Buscar">
      
  
      <button type="submit" class="btn btn-primary">Buscar</button></form>
      
    </div>
     
    
      
    </div>
    <div class="col-lg-4 col-sm-1">
 

    </div>
  </div>
</div>
<div>

<div style="row">
    <div class="col-sm-4">
    
    </div>
    <div class="col-sm-4">

       <?php
      
      if(isset($_SESSION["SinResultados"])){

        echo '<h3>'.$_SESSION["SinResultados"].'</h3>';
        echo '<br><br>';
       }
      
      
      ?>
    </div>
     
    <div class="col-sm-4">
    
      
    </div>
  </div>
  
<?php 
if(isset($resul)){
  

?>
 <div class="row">
   <div class="col-4"></div>
   <div class="col-4"><a href="?action=volver"><button class="btn btn-primary" style="width:90px; height:50px; margin-left:200px;"><img src="../imagenes/volver.png" alt="" width="30px;" heigth="10px;" title="Regresar"></button></a>
   </div>
  <div class="col-4"></div>
</div>


  <?php foreach($model->Obtener_Inventario($_SESSION['id']) as $ri): ?>
 
<div class="card cardIResul" style="width: 30rem; margin-left:150px; margin:16%;">
  <div class="card-header">
    
    <h2>Registro</h2>
  
  </div>


  <ul class="list-group list-group-flush">
    <li class="list-group-item"><h3> Id:</h3><span><?php echo $ri->id ?></span></li>
    <li class="list-group-item"> <h3>producto:</h3> <span><?php $ri->producto ?></span></li>
    <li class="list-group-item"> <h3>proveedor:</h3>  <span><?php echo $ri->proveedor?></span></li>
    <li class="list-group-item"><h3>Entrada:</h3><span><?php echo $ri->Entrada  ?></span></li>
    <li class="list-group-item"> <h3>Salida:</h3> <span><?php echo $ri->Salida?></span></li>
     <li class="list-group-item"><h3>Costo:</h3>  <span><?php echo $ri->Costo ?></span></li>
    <li class="list-group-item"><h3>Fecha:</h3><span><?php echo $ri->Fecha?></span></li>
    <li class="list-group-item"><h3>Costo_Total:</h3><span></span><?php echo  $ri->Costo_Total?></li>
    <li class="list-group-item"><h3>Gran_Total:</h3><span></span><?php echo  $ri->Gran_Total?></li>
    <li class="list-group-item"><h3>Observaciones:</h3><span></span><?php echo  $ri->Observaciones?></li>
    
    <?php if($ri->Estado==1){ ?>
    <li  class="list-group-item centrado"><span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="id_Edit(<?php echo $ri->id ?>)">
     Editar
   </button></span></li>
   <?php

    }else{
    ?>
      <li class="list-group-item centrado">
      <button type="button" class="btn btn-info" onclick="alert('El registro ya ha sido editado');"><img src="../imagenes/diss1.png" title="Opcion desabilitada" alt="Nuevo"  width="30px" height="30px"></button>
    </li>
  
    <?php

    }  ?>
    <?php  
  $PrintBtnEliminar=false;
  foreach($ArrayRegistrosFinales as $rf): 
  
 
  if($rf==$ri->id){ 
    $PrintBtnEliminar=true;
    ?>
   <?php }
 
   ?>
    
  <?php endforeach;?>
    <?php 
    if($PrintBtnEliminar==false){
      ?>
        <span class="centrado"><a href=""><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" onclick="id_Edit(<?php echo $ri->id ?>)">Eliminar</button></a></span></li>
    
    <?php
       }

    ?>
    <?php 

if($PrintBtnEliminar==true){
  ?>
    
<td>  
<li class="list-group-item centrado" ><button type="button" class="btn btn-light">
<img src="../imagenes/diss2.png" title="Este registro no es posible elimanrlo ya que es contiene el inventario final del producto" alt="Nuevo"  width="30px" height="30px">
</button></li>
</td> 
<?php }

?>
   
</ul>
</div>


 

<?php endforeach; ?>


<table class="tableResul table table-bordered table-striped">
 
<tr>
    <th>Id</th>
    <th>Producto</th>
    <th>Proveedor</th>
    <th>Entrada</th>
    <th>Salida</th>
    <th>Costo</th>
    <th>Fecha</th>
    <th>Cantidad Total</th> 
    <th>Costo_Total</th>
    <th>Gran_Total</th>
    <th>Observaciones</th>
    

</tr>
<?php foreach($model->Obtener_Inventario($_SESSION['id']) as $ri): ?>

  <tr>
    
    <td><?php echo $ri->id?></td>
    <td><?php echo $ri->producto?></td>
    <td><?php echo $ri->proveedor?></td>
    <td><?php echo $ri->Entrada?></td>
    <td><?php echo $ri->Salida?></td>
    <td><?php echo $ri->Costo?></td>
    <td><?php echo $ri->Fecha?></td>
    <td><?php echo $ri->Cantidad_Total?></td>
    <td><?php echo $ri->Costo_Total?></td>
    <td><?php echo $ri->Gran_Total?></td>
    <td><?php echo $ri->Observaciones?></td>
      
    <?php if($ri->Estado==1){ ?>
     <td>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="id_Edit(<?php echo $ri->id ?>)">Editar</button>
    </td>
   <?php
    }else{
    ?>
      <td>
      <button type="button" class="btn btn-info" onclick="alert('El registro ya ha sido editado');"><img src="../imagenes/diss1.png" title="Opcion desabilitada" alt="Nuevo"  width="30px" height="30px"></button>
      </td>
  
    <?php

    }  ?>

  
      
  <?php  
  $PrintBtnEliminar=false;
  foreach($ArrayRegistrosFinales as $rf): 
  
 
  if($rf==$ri->id){ 
    $PrintBtnEliminar=true;
    ?>
   <?php }
 
   ?>
    
  <?php endforeach;?>
    <?php 
    if($PrintBtnEliminar==false){
      ?>
        
      <td>  
       <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" onclick="id_Edit(<?php echo $ri->id ?>)">Eliminar</button>
     </td>

  
    <?php
       }

    ?>
    
    <?php 

if($PrintBtnEliminar==true){
  ?>
    
<td>  
 <button type="button" class="btn btn-light">
 <img src="../imagenes/diss2.png" title="Este registro no es posible eliminarlo ya que es contiene el inventario final del producto" alt="Nuevo"  width="30px" height="30px">
  </button>
</td> 


<?php }

?>

<?php endforeach; ?>
    
  </tr>
                

</table>

<?php


}else{
  

  ?>
   <?php foreach($model->Listar() as $r): ?>
    
 <div class="cardIR" style="width:30rem; margin:16%;">
  <div class="card-header">
    <h3 class="italic">Registro Numero<span><?php echo $r->id; ?></span></h3>
  </div>
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> <h3>Id:</h3> <span><?php echo $r->id; ?></span></li>
    <li class="list-group-item"> <h3>Producto:</h3> <span><?php  echo $r->producto?></span></li>
    <li class="list-group-item"> <h3>Proveedor:</h3>  <span><?php echo $r->proveedor ?></span></li>
    <li class="list-group-item"><h3>Entrada:</h3>  <span><?php echo $r->Entrada ?></span></li>
    <li class="list-group-item"> <h3>Salida:</h3> <span><?php echo $r->Salida?></span></li>
    <li class="list-group-item"><h3>Costo Compra:</h3><span><?php echo $r->Costo?></span></li>
    <li class="list-group-item"><h3>Costo_Unitario</h3><span><?php echo $r->Costo_Unitario?></span></li>
    <li class="list-group-item"><h3>Fecha:</h3>  <span><?php echo $r->Fecha?></span></li>
    <li class="list-group-item"><h3>Cantidad_Total:</h3><span></span><?php echo $r->Cantidad_Total?></li>
    <li class="list-group-item"><h3>Costo_Total:</h3><span></span><?php echo $r->Costo_Total?></li>
    <li class="list-group-item"><h3>Entrada_Salida:</h3><span></span><?php echo $r->Entrada_Salida?></li>
    <li class="list-group-item"><h3>Gran_Total:</h3><span></span><?php echo $r->Gran_Total?></li>
    <li class="list-group-item"><h3>Observaciones:</h3><span></span><?php echo $r->Observaciones ?></li>


  <?php if($r->Estado==1){ ?>
    <li  class="list-group-item centrado"><span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="id_Edit(<?php echo $r->id ?>)">
  Editar
  </button></span></li>
   <?php
    }else{
    ?>
      <li class="list-group-item centrado">
      <button type="button" class="btn btn-info" onclick="alert('El registro ya ha sido editado');"><img src="../imagenes/diss1.png" title="Opcion desabilitada" alt="Nuevo"  width="30px" height="30px"></button>
    </li>
  
    <?php

    }  ?>
    
     <?php  
  $PrintBtnEliminar=true;
  foreach($ArrayRegistrosFinales as $rf): 
  
 
  if($rf==$r->id){ 
    $PrintBtnEliminar=false;
    ?>

   <?php
   
   
  }
  ?>
    
  <?php endforeach;?>
    <?php 
    if($PrintBtnEliminar==false){
      ?>
         
    <li class="list-group-item centrado" ><button type="button" class="btn btn-light">
      <img src="../imagenes/diss2.png" title="Este registro no es posible elimanrlo ya que es contiene el inventario final del producto" alt="Nuevo"  width="30px" height="30px">
    </button></li>

    <?php
       }

    ?>
    <?php 

if($PrintBtnEliminar==true){
  ?>
    

    <li class="list-group-item centrado" ><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" onclick="id_Edit(<?php echo $r->id ?>)">Eliminar</button></li>

 
<?php }

?>
    
</div>




<?php endforeach;?>
<div style="margin-left:15px;">
<table class="tableR table table-bordered table-striped">
 
 <tr>
   <th>Id</th>
   <th>Producto</th>
   <th>Proveedor</th>
   <th>Entrada</th>
   <th>Salida</th>
   <th>Costo Compra</th>
   <th>Costo
    Unitario</th>
   <th>Fecha</th>
   <th>Cantidad
     Total</th> 
   <th>Costo
    Total</th>
   <th>Entrada_Salida</th>
   <th>Gran_Total</th>
   <th>Observaciones</th>
   
   
</tr>


   <?php
   
   foreach($model->Listar() as $r): ?>
    <tr>
    <td><?php echo $r->id?></td>
    <td><?php echo $r->producto?></td>
    <td><?php echo $r->proveedor?></td>
    <td><?php echo $r->Entrada?></td>
    <td><?php echo $r->Salida?></td>
    <td><?php echo $r->Costo?></td>
    <td><?php echo $r->Costo_Unitario?></td>
    <td><?php echo $r->Fecha?></td>
    <td><?php echo $r->Cantidad_Total?></td>
    <td><?php echo $r->Costo_Total?></td>
    <td><?php echo $r->Entrada_Salida?></td>
    <td><?php echo $r->Gran_Total?></td>
    <td><?php echo $r->Observaciones?></td>

    <?php if($r->Estado==1){ ?>
     <td>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="id_Edit(<?php echo $r->id ?>)">Editar</button>
    </td>
   <?php
    }else{
    ?>
      <td>
      <button type="button" class="btn btn-info" onclick="alert('El registro ya ha sido editado');"><img src="../imagenes/diss1.png" title="Opcion desabilitada" alt="Nuevo"  width="30px" height="30px"></button>
      </td>
  
    <?php

    }  ?>

   
  
  <?php  


  $PrintBtnEliminar=true;
  foreach($ArrayRegistrosFinales as $rf): 
  
 
  if($rf==$r->id){ 
    $PrintBtnEliminar=false;
  ?>

       
   <?php }
 
   ?>
    
  <?php endforeach;?>

    <?php 
    if($PrintBtnEliminar==false){
      ?>

<td>

   <button type="button" class="btn btn-light">
   <img src="../imagenes/diss2.png" title="Este registro no es posible eliminarlo ya que es contiene el inventario final del producto" alt="Nuevo"  width="30px" height="30px">
   </button>

</td> 
 
    <?php
       }

    ?>
    
    <?php 

  if($PrintBtnEliminar==true){
  ?>
    
           
    <td>  
    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" onclick="id_Edit(<?php echo $r->id ?>)">Eliminar</button>
    </td>


<?php }
?>

<?php endforeach; ?>
 
</tr>

</table>

</div>
<?php
}
?>



    <!-- Button trigger modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p>Esta seguro que desea eliminar este Registro?, Si lo hace este desaparacera del listado de entradas y salidas sin afectar el Inventario.</p>
        el id a editar es: <span class="IndiceEditar"></span>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"onclick="Editar()" data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p>Esta seguro que desea eliminar este Registro?, Si lo hace este desaparacera del listado de entradas y salidas sin afectar el Inventario.</p>
        el id a eliminar es: <span class="IndiceEditar"></span>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="Eliminar()" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

</div>





</body>

<?php

require_once "footer.php"
?>

</html>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>