<?php

	class CalcRiesgos{
		
		
		private $ImpactoActivo;
		private $ImpactoAcumuladoActivo;
		protected $matRIneherente;
		protected $matImpacto;
		

		public function __construct(){
			
			$this->matImpacto = array(		array("MODERADO", "MODERADO", "MAYOR", "CATASTROFICO", "CATASTROFICO"),
										  	array("MENOR", "MODERADO", "MAYOR", "CATASTROFICO", "CATASTROFICO"),
										  	array("MENOR", "MENOR", "MODERADO", "MAYOR", "CATASTROFICO"),
										  	array("INSIGNIFICANTE", "MENOR", "MODERADO", "MAYOR", "CATASTROFICO"),
										  	array("INSIGNIFICANTE", "INSIGNIFICANTE", "MODERADO", "MAYOR", "MAYOR"),
										 );
			
			$this->matRIneherente = array(	array("MODERADO", "MODERADO", "ALTO", "EXTREMO", "EXTREMO"),
										  	array("BAJO", "MODERADO", "ALTO", "ALTO", "EXTREMO"),
										  	array("BAJO", "BAJO", "MODERADO", "ALTO", "EXTREMO"),
										  	array("BAJO", "BAJO", "MODERADO", "ALTO", "EXTREMO"),
										  	array("BAJO", "BAJO", "MODERADO", "ALTO", "ALTO"),
										 );
		}
		
		
		public function ValImpacto($vRiesgo){
			
			echo $vRiesgo;
			
			$vImpacto =0;
			if ($vRiesgo = "CATASTROFICO"){
				$vImpacto = 100;
			}elseif($vRiesgo = "MAYOR"){
				$vImpacto = 80;
			}elseif($vRiesgo = "MODERADO"){
				$vImpacto = 60;
			}elseif($vRiesgo = "BAJO"){
				$vImpacto = 40;
			}elseif($vRiesgo = "INSIGNIFICANTE"){
				$vImpacto = 20;
			}
			echo $vImpacto;
			return $vImpacto;	
		}
		
		public function CalcImpactActivo($valActivo,$degradacion){
		
			$posValActivo;
			$posValDegrada;
			
			if($valActivo == "MUY ALTO"){
				$posValActivo=0;
			}else if($valActivo == "ALTO"){
				$posValActivo=1;
			}else if($valActivo == "MEDIO"){
				$posValActivo=2;
			}else if($valActivo == "BAJO"){
				$posValActivo=3;	
			}else if($valActivo == "MUY BAJO"){
				$posValActivo=4;	
			}	
			
			if($valActivo == "0% - 24%"){
				$posValActivo=0;
			}else if($valActivo == "25% - 49%"){
				$posValActivo=1;
			}else if($valActivo == "50% - 74%"){
				$posValActivo=2;
			}else if($valActivo == "75% - 89%"){
				$posValActivo=3;
			}else if($valActivo == "90% -100%"){
				$posValActivo=4;
			};
			
			return $this->matImpacto[$posValActivo][$posValDegrada];
			
				
			
		}
		
		public function CalcImpactTotalActivo($Iconf,$Iinte,$Idisp){
			
			$sImpacto = ValImpacto($Iconf) + ValImpacto($Iinte) + ValImpacto($Idisp);
			$resTemp ="";
			if ($sImpacto > 280){
				$resTemp = "CATASTROFICO";
			}else if ($sImpacto > 220 and $sImpacto <= 280){
				$resTemp = "MAYOR";
			}else if ($sImpacto > 160 and $sImpacto <= 220){
				$resTemp = "MODERADO";
			}else if ($sImpacto > 100 and $sImpacto <= 160){
				$resTemp = "MENOR";
			}else if ($sImpacto <= 100){
				$resTemp = "INSIGNIFICANTE";
			}
			$this->ImpactoActivo=$resTemp;
		}
		
		
		
	}

?>