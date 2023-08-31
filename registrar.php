<?php

require_once "querysPDO.php";
$alm = new Inventario();
$model = new InventModel();
$Operacion=null;
session_start();
date_default_timezone_set('America/Mexico_City');
echo '<h1>'. date("H:i:s").'</h1>';

$hoy = getdate();
print_r($hoy[0]);



$model->SeleccionarProducto();







?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <title>Document</title>
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

 form{
    background-color:gray;
    padding:30px;
    border-radius:14px;


 }

 #mostrarSalida{

   display:none;

 }

</style>
  
 

  


<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="container">


<div class="row">
<div class="col-3"></div>

<div class="col-6">
  <form action="" method="post" id="formCreate">
  <div class="form-row">

<label for="validationDefault05">Entrada_Salida</label>
  <div style="float:right; margin-right:40px;" class="dropdown">
    <button class="btn btn-success" dropdown-toggle type="button" data-toggle="dropdown">
      Definir Entrada Salida
</button>
    <ul class="dropdown-menu">
      <li id="ocultar"><a href="">Entrada</a></li>
      <li id="mostrar"><a a href="">Salida</a></li>
    
  </ul>
  </div>

<div class="col">


    <input type="hidden" class="form-control" placeholder="First name"  name="id" value="<?php echo $alm->__GET('id'); ?>" required >
</div>

<div class="col">

    <input type="hidden" class="form-control" placeholder="First name"  name="" value="<?php echo $alm->__GET('id'); ?>" required>
  </div>

  <div class="col">
  <label for="productos">Selecciona un Producto:</label><br><br>
  <div style="float:left; margin-right:40px;" class="dropdown">
    <button class="btn btn-success" dropdown-toggle type="button" data-toggle="dropdown">
      Selecciona un Producto.
</button>
    <ul class="dropdown-menu">
    <?php foreach($model->SeleccionarProducto() as $r): ?>
                      
                   
              <li class="" onclick="ObtenerTT_Actuales('<?php echo $r->Producto?>', <?php echo $r->id?>, <?php echo $r->Costo?>)"><a><?php echo $r->Producto?></a></li>
              
             
   <?php endforeach; ?>
   
    
  </ul>
  </div><br><br>
 

<div class="col">
  <label for="validationDefault05">id</label>
    <input type="text" class="form-control" placeholder="id" name="Id_Producto" value="" id="Id_Producto" readonly>
  </div>
<div class="col">
  <label for="validationDefault05">Producto</label>
    <input type="text" class="form-control" placeholder="Producto" name="Producto" value="<?php echo $alm->__GET('Producto'); ?>" id="Producto" readonly>
  </div>

  
  <div class="col" id="mostrarEntrada">
  <label for="validationDefault05">Entrada</label>
    <input type="number" class="form-control" placeholder="Entrada"  name="Entrada" value="0" id="Entrada" required>
  </div>
  <div class="col" id="mostrarSalida">
  <label for="validationDefault05">Salida</label>
    <input type="number" class="form-control" placeholder="Salida" name="Salida" value="0" id="Salida" required>
  </div>
 

  <div class="col">
  <label for="validationDefault05">Costo_Unitario</label>
    <input type="text" class="form-control" placeholder="Costo_Unitario" name="Costo_Unitario" value="<?php echo $alm->__GET('Costo_Unitario');?>" id="Costo_Unitario" readonly>
  </div>

  <div class="col">
  <label for="validationDefault05">Entrada_Salida</label>
    <input type="number" id="EntradaSalida" class="form-control" placeholder="Entrada_Salida" name="Entrada_Salida" value="1"  readonly>
  </div>

  <div class="col">
  <label for="validationDefault05">Fecha</label>
  <?php 

  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
 ?>
    <input type="date" class="form-control" placeholder="Fecha" name="Fecha" id="Fecha"  readonly >

    <input type="hidden" class="form-control" placeholder="Fecha" name="FechaS" id="FechaS"  readonly >
</div>

<div class="col">
  <label for="validationDefault05">Cantidad Total</label>
    <input type="number" class="form-control" placeholder="Cantidad_Total" name="Cantidad_Total" value="<?php echo $alm->__GET('Cantidad_Total');?>" readonly id="Cantidad_Total">

  
</div>
<div class="col">
  <label for="validationDefault05">Costo Total</label>
    <input type="number" class="form-control" placeholder="Costo_Total" name="Costo_Total" value="<?php echo $alm->__GET('Costo_Total');?>" readonly id="Costo_Total">

  
</div>
<div class="col">
  <label for="validationDefault05">Gran Total</label>
    <input type="number" class="form-control" placeholder="Gran_Total" name="Gran_Total" value="<?php echo $alm->__GET('Gran_Total');?>" readonly id="Gran_Total">
 
</div>

<div class="col">

<label for="">Observaciones</label>
<input type="text" class="form-control" placeholder="Observaciones" name="Observaciones" value="<?php echo $alm->__GET('Observaciones')?>" readonly id="Observaciones">
</div>


<br>
<button class="btn btn-primary" type="submit">Submit form</button>
</form>


</div>

 <div class="col-3"></div>

 </div>

 
</div>
<script>
  
$(document).ready(function () {


const capaEfectos = $("#mostrarEntrada");
const capaEfectos2 = $("#mostrarSalida");

const date = new Date();

 

const formatDate = (current_datetime)=>{
    var mes=0;
    var dia=0;
    if(date.getMonth()<10){
      mes= '0'+ (date.getMonth()+1);

    }
    else{

      mes= date.getMonth()+1;
    } 
    if(current_datetime.getDate()<10){
       //current_datetime.getDate()='0'+current_datetime.getDate();
       dia='0'+current_datetime.getDate();

    }else{

      dia=current_datetime.getDate();

    }
    //(current_datetime.getMonth() + 1)
    let formatted_date = current_datetime.getFullYear() + "-" + mes + "-" + dia;
    return formatted_date;
}

  $Fecha=formatDate(date);
  console.log(formatDate(date));
  $("#Fecha").val($Fecha);
  $("#FechaS").val(date.getTime());


  $("#Entrada").change(function(){

   if( $("#Producto").val()){

   if(!$('#Gran_Total').val()){

    $IdProducto=$("#Id_Producto").val();
    $CostoUnitario=$('#Costo_Unitario').val();
    $Producto=$("#Producto").val();

    ObtenerTT_Actuales($Producto, $IdProducto, $CostoUnitario);

    setTimeout(() => {
  
      $Entrada=parseInt($('#Entrada').val());
      $("#Costo_Total").val($CostoUnitario*$Entrada);
      $CostoTotal=parseInt($("#Costo_Total").val());
      $('#Cantidad_Total').val($Entrada);
      $('#Gran_Total').val($CostoTotal);
 

}, "2000");


}
else{

  $IdProducto=$("#Id_Producto").val();
  $CostoUnitario=$('#Costo_Unitario').val();
  $Producto=$("#Producto").val();
 
  ObtenerTT_Actuales($Producto, $IdProducto, $CostoUnitario);

  setTimeout(() => {

    $Entrada=parseInt($('#Entrada').val());
    $Cantidad_Total=parseInt($('#Cantidad_Total').val());
    $Gran_Total= parseInt($('#Gran_Total').val());  
    $("#Costo_Total").val($CostoUnitario*$Entrada);
    $Costo_Total=parseInt($("#Costo_Total").val());
    $Gran_totalN=$Gran_Total+$Costo_Total;
    $Cantidad_TotalN=$Cantidad_Total+$Entrada;
    $('#Cantidad_Total').val($Cantidad_TotalN);
    $('#Gran_Total').val($Gran_totalN);
   
    


 }, "2000");

}
 


}else{
  alert("Producto indefinido");
  $("#Entrada").val(0);

}
});


$("#Salida").change(function(){

  
if($("#Producto").val()){


if(!$('#Gran_Total').val()){

   alert("No existen registros relacionados para este producto");
   $('#Salida').val(0)


}else{

 
    $Salida=parseInt($('#Salida').val());
    $Cantidad_Total=parseInt($('#CantidadTotal').val());


  if($Salida>$Cantidad_Total){
   
   texto="No hay existencias suficientes para realizar la salida solicitada";
   alert(texto);
   $('#Salida').val(0)

  }else{

    $IdProducto=$("#Id_Producto").val();
    $CostoUnitario=$('#Costo_Unitario').val();
    $Producto=$("#Producto").val();
  
    ObtenerTT_Actuales($Producto, $IdProducto, $CostoUnitario);
  

  
  setTimeout(() => {

      $Cantidad_Total=parseInt($('#Cantidad_Total').val());
      $Gran_Total=$('#Gran_Total').val();
      $Costo_UnitarioN=$Gran_Total/$Cantidad_Total;
    
      $("#Costo_Total").val($Costo_UnitarioN*$Salida);
      $CostoTotal=parseInt($("#Costo_Total").val());
      $SumaGranTotal=$Gran_Total-$CostoTotal;
      $('#Costo_Unitario').val($Costo_UnitarioN);
      $('#Cantidad_Total').val($Cantidad_Total-$Salida);
      $('#Gran_Total').val($SumaGranTotal);
     }, "2000")
     
   }
 
}

 
}
else{


alert("Producto indefinido");
$("#Salida").val(0);

}

});



$("#ocultar").click(async function (event) {
  event.preventDefault();
  
  $("#EntradaSalida").val(1);
  capaEfectos2.hide("slow");
  capaEfectos.show(500);
 
});

$("#mostrar").click(async function (event) {
  event.preventDefault();

 
$("#EntradaSalida").val(0);
  capaEfectos2.show(500);
  capaEfectos.hide(500);
  
});

    

});



function ObtenerTT_Actuales(val, val2, val3) { 

 
 
  $("#Producto").val(val);
  $("#Id_Producto").val(val2);
  $("#Costo_Unitario").val(val3);
  

  $.ajax({
    type: "POST",
    url:"querysPDO.php",
    data:{

        type:"getInvent",
        busqued:val    


    },
    success: function(respuesta){
        //si la solicitud es hecha éxitosamente entonces la respuesta representa los datos
      
        
        var namelistB = [];
        console.log(respuesta);
        
        namelistB =respuesta[0];
        const obj = JSON.parse(respuesta);
        if(obj.length>0)
        {
          
        
          $('#Cantidad_Total').val(obj[0].Cantidad_Total);
          $('#Costo_Total').val(obj[0].Costo_Total);
          $('#Gran_Total').val(obj[0].Gran_Total);
       

        }else{


          alert("no  existe  aun el inventario");
          
          $('#Cantidad_Total').val(0);
          $('#Costo_Total').val(0);
          $('#Gran_Total').val(0);
          
        }

         return respuesta;
       }
  });
  
  }

 
$(function(){
    $("#formCreate").on("submit", function(e){
              
        // Cancelamos el evento si se requiere 
        e.preventDefault();
 
        // Obtenemos los datos del formulario 
        var f = $(this);
        var formData = new FormData(document.getElementById("formCreate"));
        formData.append("dato", "valor");
        formData.append("Estado", 1);
        
        
        console.log(formData);
        // Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo 
        
        $.ajax({
            url: "querysPDO.php",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
              $('.msg').html("<img src='img/ajax-loader.gif' />");
            },
        })
        
        
        
        setTimeout(() => {

        window.location.href = "inventarios.php";
        }, "1000");

        
    });

});



</script>


</div>
</body>
</html>
