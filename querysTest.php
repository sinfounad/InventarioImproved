<?php

class Usuario
{
   private $id;
   private $Nombre;
   private $Apellido;
   private $Tipo_Documento;
   private $Direccion;
   private $Telefono;
   private $Correo;
   private $Contraseña;
   private $Comision;
   private $Estado_Afiliado;


    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

class UsuarioModel
{
    private $pdo;

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

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Usuario();

            
                $alm->__SET('id', $r->id);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Tipo_Documento', $r->Tipo_Documento);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Correo', $r->Correo);
                $alm->__SET('Contraseña', $r->Contraseña);
                $alm->__SET('Comision', $r->Comision);
                $alm->__SET('Estado_Afiliado', $r->Estado_Afiliado);
                
             

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {   
            $result = array();
            $stm = $this->pdo
                      ->prepare("SELECT * FROM usuarios WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $alm = new Usuario();

            
            $alm->__SET('id', $r->id);
            $alm->__SET('Nombre', $r->Nombre);
            $alm->__SET('Apellido', $r->Apellido);
            $alm->__SET('Tipo_Documento', $r->Tipo_Documento);
            $alm->__SET('Direccion', $r->Direccion);
            $alm->__SET('Telefono', $r->Telefono);
            $alm->__SET('Correo', $r->Correo);
            $alm->__SET('Contraseña', $r->Contraseña);
            $alm->__SET('Comision', $r->Comision);
            $alm->__SET('Estado_Afiliado', $r->Estado_Afiliado);
          
              
            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    


    
    public function Obtener_Id_Nombre($Param)
    {

       
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM `usuarios` WHERE id=? OR Nombre =?" );

            $stm->execute(array($Param, $Param));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $cuenta = $stm->rowCount();
            $alm = new Usuario();

             
            if($cuenta>0){

                $alm->__SET('id', $r->id);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Tipo_Documento', $r->Tipo_Documento);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Correo', $r->Correo);
                $alm->__SET('Contraseña', $r->Contraseña);
                $alm->__SET('Comision', $r->Comision);
                $alm->__SET('Estado_Afiliado', $r->Estado_Afiliado);

                 $_SESSION["Resultado_Usuario"]=$alm;
                 unset($_SESSION["SinResultados"]);
            }
            
           
       
       else{
           $_SESSION["SinResultados"]="No hay resultados para la Busqueda solicitada";
           
       }
            
           
         } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
  
    public function ObtenerUser($Nombre, $Contraseña)
    {

        
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM usuarios WHERE Correo=? AND contraseña=?");

            $stm->execute(array($Nombre, $Contraseña));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $cuenta = $stm->rowCount();
            $alm = new Usuario();

            if($cuenta>0){
          

            $_SESSION["InicioSession"]=1;
            $alm->__SET('id', $r->id);
            $alm->__SET('Nombre', $r->Nombre);
            $alm->__SET('contraseña', $r->contraseña);
     
            
            }
            
           
            
           
           
            return $cuenta;
        } catch (Exception $e) 

        {

            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM usuarios WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Usuario $data)
    {
        try 
        {
            $sql = "UPDATE usuarios SET 
                        Nombre          = ?, 
                        Contraseña      = ?,
                        Tipo_Documento  = ?,
                        Direccion       = ?,
                        Telefono        = ?,
                        Correo          = ?,
                        Contraseña      = ?,
                        Comision        = ?,
                        Estado_Afiliado = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('Nombre'),
                    $data->__GET('Apellido'),
                    $data->__GET('Tipo_Documento'),
                    $data->__GET('Direccion'),
                    $data->__GET('Telefono'),
                    $data->__GET('Correo'),
                    $data->__GET('Contraseña'),
                    $data->__GET('Comision'),
                    $data->__GET('Estado_Afiliado'),
                    $data->__GET('id')

                  )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
          

    public function Registrar(Usuario $data)
    {
        try 
        {
        $sql = "INSERT INTO  usuarios (Nombre,Apellido,Tipo_Documento,Direccion,Telefono,Correo,Contraseña,Comision,Estado_Afiliado) 
                VALUES (?,?,?,?,?,?,?,?,?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    
                    
                    $data->__GET('Nombre'),
                    $data->__GET('Apellido'),
                    $data->__GET('Tipo_Documento'),
                    $data->__GET('Direccion'),
                    $data->__GET('Telefono'),
                    $data->__GET('Correo'),
                    $data->__GET('Contraseña'),
                    $data->__GET('Comision'),
                    $data->__GET('Estado_Afiliado')
                   
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>