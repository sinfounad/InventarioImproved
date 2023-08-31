  <?php

require_once "querysPDO.php";
$alm = new Inventario();
$model = new InventModel();
$Operacion=null;
session_start();


$valorDefault=0;
$model->SeleccionarProducto();
$reg=$model->Obtener_Id_Producto($_GET['type']);
$JsonReg=json_encode($reg[0]);

$hoy = getdate();
//print_r($hoy[0]);
//var_dump($hoy[0]);


if(isset($maroma)){

 echo $nmaroma;


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

 .italic {font-style: italic;} 
 .oblique {font-style: oblique;} 

</style>
  
 
<br>

<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Editar</button>
<div class="container">

<div class="row">
<div class="col-3"></div>

<div class="col-6">

  <div class="" id='respuesta'></div>
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


    <input type="text" class="form-control" placeholder="First name"  name="id" value="<?php echo $reg[0]->id ?>" readonly>
</div>

<div class="col">

    <input type="hidden" class="form-control" placeholder="First name"  name="Event" value="0" required>
  </div>

  <div class="col">
  <label for="productos">Choose a Producto:</label><br><br>
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
    <input type="text" class="form-control" placeholder="id" name="Id_Producto" value="<?php echo $reg[0]->Id_producto ?>" id="Id_Producto" required>
  </div>
<div class="col">
  <label for="validationDefault05">Producto</label>
    <input type="text" class="form-control" placeholder="Producto" name="Producto" value="<?php echo $reg[0]->producto?>" id="Producto" readonly>
  </div>


  <div class="col" id="mostrarEntrada">
  <label for="validationDefault05">Entrada</label>
    <input type="number" class="form-control" placeholder="Entrada"  name="Entrada" value="<?php echo $reg[0]->Entrada?>" id="Entrada" required>
  </div>
  <div class="col" id="mostrarSalida">
  <label for="validationDefault05">Salida</label>
    <input type="number" class="form-control" placeholder="Salida" name="Salida" value="<?php  echo $reg[0]->Salida?>" id="Salida" required>
  </div>
 
 
  <div class="col">
  <label for="validationDefault05">Costo_Unitario</label>
    <input type="text" class="form-control" placeholder="Costo_Unitario" name="Costo_Unitario" value="<?php echo $reg[0]->Costo_Unitario?>" id="Costo_Unitario" readonly>
  </div>

  <div class="col">
  <label for="validationDefault05">Entrada_Salida</label>
    <input type="number" id="EntradaSalida" class="form-control" placeholder="Entrada_Salida" name="Entrada_Salida" value="<?php echo $reg[0]->Entrada_Salida?>"  readonly>
  </div>

  <div class="col">
  <label for="validationDefault05">Fecha</label>
  <?php 

  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
 ?>
    <input type="date" class="form-control" placeholder="Fecha" name="Fecha" value="" id="Fecha" readonly >

    <input type="hidden" class="form-control" placeholder="Fecha" name="FechaS" value="" id="FechaS" readonly >
</div>

<div class="col">
  <label for="validationDefault05">Cantidad Total</label>
    <input type="number" class="form-control" placeholder="Cantidad_Total" name="Cantidad_Total" value="" readonly id="Cantidad_Total" >

  
</div>
<div class="col">
  <label for="validationDefault05">Costo Total</label>
    <input type="number" class="form-control" placeholder="Costo_Total" name="Costo_Total" value="" readonly id="Costo_Total">

  
</div>
<div class="col">
  <label for="validationDefault05">Gran Total</label>
    <input type="number" class="form-control" placeholder="Gran_Total" name="Gran_Total" value="" readonly id="Gran_Total">

  
</div>

<div class="col">

<label for="">Observaciones</label>
<input type="text" class="form-control" placeholder="Observaciones" name="Observaciones" value="<?php echo $reg[0]->Observaciones?>" readonly id="Observaciones">
</div>

<br>

<input type="button" onclick="resetform()" value="Reiniciar" id="Reiniciar">
<button class="btn btn-primary" type="submit">Submit form</button>
</form>


</div>

 <div class="col-3"></div>
<div class="para" style="color:red;"></div>
 </div>



<script>
$(document).ready(function () {

const capaEfectos = $("#mostrarEntrada");
const capaEfectos2 = $("#mostrarSalida");
const botonResetear = $("#Reiniciar");
botonResetear.hide();
if(!localStorage.getItem("Done")){
    localStorage.setItem("Done", "OK")
  


if($('#Producto').val()){
   
  val=$('#Producto').val(),

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

          var Data= <?php echo $JsonReg ?>;
          var TT_Temporales=InventarioEditar(Data);
       
          
                  
          obj_Cantidad_Total=parseInt(obj[0].Cantidad_Total);
          obj_Gran_Total=parseInt(obj[0].Gran_Total);
          TT_TemporalesCosto_Total=parseInt(TT_Temporales.Costo_Total);
          TT_TemporalesEntrada=parseInt(TT_Temporales.Entrada);
          TT_TemporalesSalida=parseInt(TT_Temporales.Salida);
          Cantidad_Total_New=obj_Cantidad_Total+TT_TemporalesEntrada+TT_TemporalesSalida;
          Gran_Total_New=obj_Gran_Total+TT_TemporalesCosto_Total;
          Id_Eliminar=TT_Temporales.id;
          
      
          if(Gran_Total_New>=0){
            
            const date = new Date();
            $Fecha=formatDate(date);
            console.log(formatDate(date));
            $("#Fecha").val($Fecha);
            $("#FechaS").val(date.getTime());
          
            $("#resultado").empty().append(obj[0].producto);
            $('#Cantidad_Total').val(Cantidad_Total_New);
          if(TT_Temporales.Costo_Total>0){
             $('#Costo_Total').val(TT_Temporales.Costo_Total);
          }else{
             $('#Costo_Total').val(TT_Temporales.Costo_Total*-1);

          }
          
          $('#Gran_Total').val(Gran_Total_New);

         

          devuelvePromesa()
          .then( respuesta => console.log(respuesta) )
          .catch( error => console.log(error) )

        
        }else{

            alert('No se puede hacer esta operacion ya que se excede existencias'); 

          }

         
        
          //[{"id":"23","Id_producto":"2","producto":"Lapiz Weston","Entrada":"4","Salida":"0","Cantidad_Total":"129","Costo_Unitario":"12500","Costo_Total":"50000","Entrada_Salida":"1","Fecha":"2023-04-12","Gran_Total":"175000","Observaciones":""}]
          
        }else{


          alert("Se creara un nuevo inventario para el producto ingresado");
          
        }

          
       }
  });

}

}




$("#Entrada").change(function(){


     if( $("#Producto").val()){

      if(!$('#Gran_Total').val()){

      $CostoUnitario=$('#Costo_Unitario').val();
      $Entrada=parseInt($('#Entrada').val());
      $("#Costo_Total").val($CostoUnitario*$Entrada);
       $CostoTotal=parseInt($("#Costo_Total").val());
       $('#Cantidad_Total').val($Entrada);
       $('#Gran_Total').val($("#Costo_Total").val());


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
      $SumaGranTotal=$Gran_Total+$Costo_Total;
      $('#Cantidad_Total').val($Cantidad_Total+$Entrada);
      $('#Gran_Total').val($SumaGranTotal);

        
      }, "2000")
   

     }
      
   
 
     }else{
       alert("Producto indefinido");
       $("#Entrada").val(0);

 
     }
});


$("#Salida").change(function(){


  if( $("#Producto").val()){


  if(!$('#Gran_Total').val()){

     alert("No existes registros relacionados para este producto");
     $('#Salida').val(0)

  }else{

    $Salida=parseInt($('#Salida').val());
    $Cantidad_Total=parseInt($('#Cantidad_Total').val());

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


        
       $Gran_Total= parseInt($('#Gran_Total').val());  
       $("#Costo_Total").val($CostoUnitario*$Salida);
       $CostoTotal=parseInt($("#Costo_Total").val());
       $SumaGranTotal=$Gran_Total-$CostoTotal;
       
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




function InventarioEditar($ArregloInventario){


if($ArregloInventario.Entrada_Salida==0){
    

    const inventario = $ArregloInventario;
   
      return inventario;
}else{
  Resta=-1;
  $ArregloInventario.Entrada=$ArregloInventario.Entrada*Resta;
  $ArregloInventario.Costo_Total=$ArregloInventario.Costo_Total*Resta;
  
  const inventario = $ArregloInventario;
  return inventario;
}

   

}


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
        alert("ya existe inventario");
        $("#resultado").empty().append(obj[0].producto);
        $('#Cantidad_Total').val(obj[0].Cantidad_Total);
        $('#Costo_Total').val(obj[0].Costo_Total);
        $('#Gran_Total').val(obj[0].Gran_Total);
        

      }else{
        $('#Cantidad_Total').val(0);
        $('#Costo_Total').val(0);
        $('#Gran_Total').val(0);

        alert("no  existe  aun el inventario");
        
      }

        return respuesta;
     }
});


}


function devuelvePromesa() {
          return new Promise( (resolve, reject) => {
            setTimeout(() => {
            let todoCorrecto=guardarData();
            if (todoCorrecto) {
              resolve('Todo ha ido bien');
              resetearValores();
            } else{
              reject('something wrong');

            }
          }, 2000)
        })
}

function guardarData()
{    

  const botonResetear = $("#Reiniciar");
  botonResetear.show();

 var f = $(this);
        var formData = new FormData(document.getElementById("formCreate"));
        formData.append("dato", "valor");
        formData.append("Estado", 0);
        formData.append("Nota", "<span style='color:red'; class='italic'>Registro editado de id No"+formData.get('id')+" </span>"); 
        console.log(formData);
        
       
        var Entrada_Salida=formData.get('Entrada_Salida');
        console.log( formData.get('Entrada'));
        console.log( formData.get('Salida'));
        console.log(Entrada_Salida);
        if(Entrada_Salida==1){

          Salida=formData.get('Entrada');
          formData.set("Salida", Salida);
          formData.set("Entrada", 0);
          
          formData.set("Entrada_Salida", 0);
        }else{
          //resetear entrada a cero ya que se hace el registro automatico y el usuario va ingresar un valor 
          //cualquiera
          Entrada=formData.get('Salida');
          formData.set("Entrada", Entrada);
          formData.set("Salida", 0);
          formData.set("Entrada_Salida", 1);


        }
        
        console.log(Entrada_Salida);
        ObservacionesEdit=formData.get('Nota')+formData.get('Observaciones');
        formData.set("Observaciones", ObservacionesEdit);
        console.log(ObservacionesEdit);
        console.log(formData);
        console.log( formData.get('Salida'));
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
              $('.msg').html("<img src='img/ajax-loader.gif'/>");
            },
        })  
        
        return true;

}


function Eliminar(Id_Eliminar, obj){

 console.log(obj + "/"+Id_Eliminar);

$.ajax({
  url: "querysPDO.php",
  type: 'GET',
  data:{

    type:'EliminarRegistro',
    id:Id_Eliminar
  },
  success: function(res) {
      console.log(res);
      
      Swal.fire(
                      'Registro Eliminado',
                      res,
                      'warning'
                  )

    
    window.location.href = "inventarios.php";
      
  }
});

}



function resetearValores(){

  
  
  
  var formData = new FormData(document.getElementById("formCreate"));
  const date = new Date();
  $Fecha=formatDate(date);
  console.log(formatDate(date));
  $("#Salida").val(0);
  $("#Entrada").val(0);
  console.log(formatDate(date));
  $("#Fecha").val($Fecha);
  $("#FechaS").val(date.getTime());
   $("#Observaciones").val('');
  
};





$(function(){

    $("#formCreate").on("submit", function(e){
              
        // Cancelamos el evento si se requiere 
        e.preventDefault();
 
        // Obtenemos los datos del formulario 
        var f = $(this);
        var formData = new FormData(document.getElementById("formCreate"));
        formData.append("dato", "valor");
        formData.append("Estado", 1);
        
        const date = new Date();
        
       

       
      
        // Enviamos los datos al archivo PHP que procesará el envio de los datos a un determinado correo 
        /*
        $.ajax({
            url: "querysPDO.php",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
            
            },
        })
*/

    $.ajax({
    url: "querysPDO.php",
    type: 'post',
    dataType:"json",
    data:formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(res) {
        console.log(res);
        
    

      
        
   
    }});


    setTimeout(() => {

     window.location.href = "inventarios.php";

    }, "1000");


   
});

});


const formatDate = (current_datetime)=>{
    var mes=0;
    var dia=0;
    if(current_datetime.getMonth()<10){
      mes= '0'+ (current_datetime.getMonth()+1);

    }
    else{

      mes= current_datetime.getMonth()+1;
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

</script>

<script>
    function resetform() {
     //$("form select").each(function() { this.selectedIndex = 0 });
     $("form input[type=text] , input[type=number] ").each(function() { this.value = '' });
     $("#EntradaSalida").val(1);
}
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>

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

</body>
</html>
