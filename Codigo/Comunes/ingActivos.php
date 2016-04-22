<?php 

class Anadir {
    
    protected $idActivo;
    protected $nomActivo;
    protected $proActivo;
    protected $descActivo;
    protected $sopFunActivo;
    protected $clasActivo;
    protected $valEntrada;
    protected $valRemitente;
    protected $ubiActivo;
    protected $cusActivo;
    protected $sopActivo;
    protected $malmaActivo;
    protected $valConfiden;
    protected $valIntegri;
    protected $valDisp;
    protected $tiActivo;
    

    
    public function __construct ($idActivo,$nomActivo,$proActivo,$descActivo,$sopFunActi,$clasActivo,$valEntrada,$valRemitente,$ubiActivo,$cusActivo,$sopActivo,$malmaActivo,$valConfiden,$valIntegri,$valDisp,$tiAct){
        
        $this->idActivo = $idActivo;
        $this->nomActivo = $nomActivo;
        $this->proActivo = $proActivo;
        $this->descActivo = $descActivo;
        $this->sopFunActivo = $sopFunActi;
        $this->clasActivo = $clasActivo;
        $this->valEntrada = $valEntrada;
        $this->valRemitente = $valRemitente;
        $this->ubiActivo = $ubiActivo;
        $this->cusActivo = $cusActivo;
        $this->sopActivo = $sopActivo;
        $this->malmaActivo = $malmaActivo;
        $this->valConfiden = $valConfiden;
        $this->valIntegri = $valIntegri;
        $this->valDisp = $valDisp;
        $this->tiActivo = $tiAct;

    }
    
    public function insertActivo(){
        
        $db = new Conexion();
        

        $sql= $db -> query ("SELECT Id_Activo FROM activo WHERE Id_Activo = '$this->idActivo';");
        $existe = $db -> recorrer($sql);
		
        $sqlMedAlma= $db -> query ("SELECT Id_Med_Almacenamiento  FROM med_almacenamiento WHERE Nom_Med_Almacenamiento = '$this->malmaActivo';");
        $medAlmatemp = $db -> recorrer($sqlMedAlma);
		$medatemp = $medAlmatemp['Id_Med_Almacenamiento'];
		
		$sqltiActivo= $db -> query ("SELECT Id_Tipo_Activo FROM tipo_activo WHERE Nom_Tipo_Activo = '$this->tiActivo';");
		$tActivtemp = $db -> recorrer($sqltiActivo);
		$temptAct = $tActivtemp['Id_Tipo_Activo'];
		
		
		$sqlclasActivo = $db -> query ("SELECT Id_Clasificacion_Activo FROM clasificacion_activo WHERE Nom_Clasificacion_Activo = '$this->clasActivo';");
		$clasActivo = $db -> recorrer($sqlclasActivo);
		$tempclasAC = $clasActivo['Id_Clasificacion_Activo'];

		$sqlvalDis = $db -> query ("SELECT Id_Disponibilidad FROM disponibilidad WHERE Nom_Disponibilidad = '$this->valDisp';");
		$valDisptemp  = $db -> recorrer($sqlvalDis);
		$tempDispV = $valDisptemp['Id_Disponibilidad'];

		$sqlvalIntegri = $db -> query ("SELECT idIntegridad FROM integridad WHERE Nom_Integridad = '$this->valIntegri';");
		$valIntegritemp  = $db -> recorrer($sqlvalIntegri);
		$tempIntV =$valIntegritemp['idIntegridad'];

		$sqlvalConfiden = $db -> query ("SELECT idConfidencialidad FROM confidencialidad WHERE Nom_Confidencialidad = '$this->valConfiden';");
		$valConfidentemp  = $db -> recorrer($sqlvalConfiden);
		$tempConfV = $valConfidentemp['idConfidencialidad'];   

     
       if($existe['Id_Activo'] != $this->idActivo){
            
             
           $db -> query("INSERT INTO activo(Id_Activo, Nom_Activo, Desc_Activo, Propietario_Activo, Entrada_Salida, Remitente, Ubicacion_Activo, Custodio_Activo, Soporte_Tec_Activo, Soporte_Func_Activo, Med_Almacenamiento_Id_Med_Almacenamiento, Tipo_Activo_Id_Tipo_Activo, Clasificacion_Activo_Id_Clasificacion_Activo, Disponibilidad_Id_Disponibilidad, Integridad_idIntegridad, Confidencialidad_idConfidencialidad) VALUES ('$this->idActivo', '$this->nomActivo', '$this->descActivo', '$this->proActivo', '$this->valEntrada', '$this->valRemitente', '$this->ubiActivo', '$this->cusActivo', ' $this->sopActivo', '$this->sopFunActivo', '$medatemp', '$temptAct', '$tempclasAC', '$tempDispV', '$tempIntV', '$tempConfV')");
           
        }
        else{ 
            
                
                echo '<script language="javascript">';
                echo 'alert("message successfully sent")';
                echo '</script>';
                exit;
                
        }
        //header("Location: AnadirUsuarios.html");
        
    } 
 
}

?>