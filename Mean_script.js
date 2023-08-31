console.log(localStorage.getItem("Done"));
localStorage.removeItem("Done");
console.log(localStorage.getItem("Done"));

var idQuery=0;

function DefinirProducto(Producto){



  $("#Buscar").val(Producto);


}


function id_Edit(id){


 


 $(".IndiceEditar").text(id);

idQuery=id;
   



}

function Eliminar(){



  $.ajax({
    url: "querysPDO.php",
    type: 'GET',
    data:{

      type:'EliminarRegistro',
      id:idQuery
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


function Editar(){

 
 idEditar= parseInt($('#IndiceEditar').text()); 
var edit=idEditar;


window.location.href = "actualizar.php?type="+idQuery;
        
}