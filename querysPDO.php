<?php



class Inventario
{


   private $id;
   private $Id_Producto;
   private $Producto;
   private $Entrada;
   private $Salida;
   private $Cantidad_Total;
   private $Costo_Unitario;
   private $Fecha;
   private $Costo_Total;
   private $Gran_Total;
   private $Observaciones;
 
   

 

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }


 
}

class Producto
{


   private $id;
   private $Producto;
   private $Proveedor;
   private $Descripcion;
   private $Costo;
   private $Precio_de_Venta;
   
   public function __GET($k){ return $this->$k; }
   public function __SET($k, $v){ return $this->$k = $v; }

}


 




class InventModel
{ 
    private $pdo;
 
   public function codigos(){
    $result = array();

    $Existe= "SELECT table_name FROM information_schema.tables WHERE table_schema = 'ceop_bd' AND table_name = 'inventarios_costos'";
    $stm = $this->pdo->prepare($Existe);
    $stm->execute();
    $cuenta = $stm->rowCount();
    

    
    if($cuenta==0){

        $tabla='CREATE TABLE paciente (
            id int AUTO_INCREMENT,
            Nombre varchar(50),
            Identificacion varchar(50),
            Direccion varchar(50),
            Email varchar(50),
            Ocupacion varchar(50),
            Acudiente varchar(50),
            Telefono varchar(50),
            Acciones varchar(50),
            PRIMARY KEY (id)
          )';
        $stm = $this->pdo->prepare($tabla);
        $stm->execute();
        
    }





   }
  

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=bd_jac_quiroga', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar(){ 
            
            
       
        try  
        {
            $result = array();
            $resultado = $this->pdo->query("SELECT I.id, P.producto, Costo_Unitario, proveedor, Costo, Entrada, Salida, Entrada_Salida, Fecha, Cantidad_Total, Costo_Total, Gran_Total, Observaciones, Estado 
            FROM inventario_costos I JOIN producto P ON I.id_producto = P.id");
          while ($inventarios = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
           
           
           $result[] = $inventarios;
      
       
        }
   
        return $result;




         }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


    





   public function Obtener_Inventario($Producto)
{

   
    try  
    {
        $result = array();
        $resultado = $this->pdo->query("SELECT I.id, P.producto, Costo_Unitario, proveedor, Costo, Entrada, Salida, Entrada_Salida, Fecha, Cantidad_Total, Costo_Total, Gran_Total, Observaciones, Estado 
        FROM inventario_costos I JOIN producto P ON I.id_producto = P.id WHERE P.producto='$Producto'");
        while ($inventarios = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
       
       
       $result[] = $inventarios;
  
   
    }

    return $result;
  

    }catch (Exception $e) 
    {
        die($e->getMessage());
    }

}

    
    public function Obtener_Id_Producto($Producto)
    {

       
      
            try  
            {
                $result = array();
                
                $resultado = $this->pdo->query("SELECT *  
                FROM inventario_costos I WHERE producto='$Producto' OR id='$Producto'
                ORDER BY FechaS DESC
                LIMIT 1
                ");
                
                while ($inventarios = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
               
               
                  $result[] = $inventarios;
                

                }
          
                return $result;
            }
        
            
          
        
            catch (Exception $e) 
            {
                die($e->getMessage());
            }



 
    

}


public function Obtener_Inventario_ID($Param){

    try{


     $stm = $this->pdo
        ->prepare("SELECT * FROM `inventario_costos` WHERE id=? OR producto=?" );

      $stm->execute(array($Param, $Param));
      $r = $stm->fetch(PDO::FETCH_OBJ);
      $cuenta = $stm->rowCount();
      $alm = new Inventario();

 


      if($cuenta>0){


      $alm->__SET('id', $r->id);
      $alm->__SET('Id_Producto', $r->Id_Producto);
      $alm->__SET('Producto', $r->producto);
      $alm->__SET('Entrada', $r->Entrada);
      $alm->__SET('Salida', $r->Salida);
      $alm->__SET('Cantidad_Total', $r->Cantidad_Total);
      $alm->__SET('Costo_Unitario', $r->Costo_Unitario);
      $alm->__SET('Entrada_Salida', $r->Entrada_Salida);
      $alm->__SET('Fecha', $r->Fecha);
      $alm->__SET('Costo_Total', $r->Costo_Total);
      $alm->__SET('Observaciones', $r->Observaciones);
  
      $_SESSION["Resultado_Usuario"]=$alm;
      unset($_SESSION["SinResultados"]);
}
else{
  $_SESSION["SinResultados"]="No hay resultados para la Busqueda solicitada";
  
}

}catch (Exception $e) 
{
die($e->getMessage());
}


}

public function Eliminar($id)
{
       
    try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM inventario_costos WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
}

    public function Actualizar($data)
    {


        
        $var=json_decode($data);
        try 
        {
            

           
         
            $sql = "UPDATE inventario_costos SET 
                       
                        Estado         = ?
                        
                       
                         
                        
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                  
                    $var->{'Estado'},
                    $var->{'id'}
                   
                    
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {       

            $var=json_decode($data);
            
       
      
           
        
    try{

                    $sql = "INSERT INTO  inventario_costos (Id_Producto, Producto, Entrada, Salida, Cantidad_Total, Costo_Unitario, Costo_Total, Entrada_Salida, Fecha, FechaS, Gran_Total, Observaciones, Estado) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
                    $this->pdo->prepare($sql)
                         ->execute(
                        array(
                            $var->{'Id_Producto'},
                            $var->{'Producto'},
                            $var->{'Entrada'},
                            $var->{'Salida'},
                            $var->{'Cantidad_Total'},
                            $var->{'Costo_Unitario'},
                            $var->{'Costo_Total'},
                            $var->{'Entrada_Salida'},
                            $var->{'Fecha'},
                            $var->{'FechaS'},
                            $var->{'Gran_Total'},
                            $var->{'Observaciones'},
                            1
                            
                               
                        )
                        );
            
                    
                        
                    } catch (Exception $e) 
                    {
                        die($e->getMessage());
                    }



                return false;
            
        
    
    
}

    public function SeleccionarProducto(){     
        
        try  
        {
            $result = array();
            $resultado = $this->pdo->query("SELECT * 
            FROM producto");
          while ($inventarios = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
           
           
           $result[] = $inventarios;
      
       
        }
    
        return $result;




         }catch(Exception $e)
        {
            die($e->getMessage());
        }

    }


    public function ActualizarP(Producto $data)
    {

        try 
        {
            $sql = "UPDATE producto SET 
                        Producto            = ?, 
                        Proveedor           = ?,
                        Costo               = ?,
                        Precio_de_Venta     = ? 
                       
                         
                        
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
               
                    $data->__GET('Producto'),
                    $data->__GET('Proveedor'),
                    $data->__GET('Costo'),
                    $data->__GET('Precio_de_Venta'),
                    $data->__GET('id')
                    
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }



    }

   if(isset($_POST['type'])){
    if($_POST['type']=="getEnterprises"){


   
    $model = new InventModel();
    $model->SeleccionarProducto(); 
    echo  json_encode($model->SeleccionarProducto()); 
 
 
 
   }}


   if(isset($_POST['type'])){

    if($_POST['type']=="getInvent"){
    
    
        //var_dump($_POST['busqued']);
        
        
        $model = new InventModel();
        $model->Obtener_Id_Producto($_POST['busqued']); 
        echo  json_encode($model->Obtener_Id_Producto($_POST['busqued'])); 
          
     
     }}

     if(isset($_GET['type'])){

        if($_GET['type']=="EliminarRegistro"){

            $model = new InventModel();
            $model->Eliminar($_GET['id']); 
            echo $_GET['id'];
        
        
           
              
         
         }}

         if(isset($_POST['dato'])){
     
          $model = new InventModel();
        
          $proof= json_encode($_POST);

        
          $model->Registrar($proof);

          if($_POST['Estado']==0){
            echo $proof;
            $model->Actualizar($proof);
         
          }
          
         
            
        }
 
 

?>