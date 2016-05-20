<?php

	class CalcRiesgos{
		
		
		/*private $ImpactoActivoConf;
		private $ImpactoActivoInt;
		private $ImpactoActivoDisp;*/
		private $ImpactoAcumuladoActivo;
		protected $matRIneherente;
		protected $matImpacto;
		protected $ValorActivo;
		protected $ValorDegradacion;
		

		//$valAcConf, $valAcInt, $valAcDisp
		public function __construct($valDeg){
			/*$this->ImpactoActivoConf = $valAcConf;
			$this->ImpactoActivoInt = $valAcInt;
			$this->ImpactoActivoDisp = $valAcDisp;*/
			$this->ValorDegradacion= $valDeg;
			
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
		
		
		protected function ValImpacto($vRiesgo){
						
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
			return $vImpacto;	
		}
		
		
		
		protected function Posvalactivo($valActivo) {
			
			$posValActivo=0;
			
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
			
			return $posValActivo;
			
		}
		
		protected function PosDegractivo($valDeg) {
			
			$posValDegActivo=0;
			
			if($valDeg == "0% - 24%"){
				$posValDegActivo=0;
			}else if($valDeg == "25% - 49%"){
				$posValDegActivo=1;
			}else if($valDeg == "50% - 74%"){
				$posValDegActivo=2;
			}else if($valDeg == "75% - 89%"){
				$posValDegActivo=3;
			}else if($valDeg == "90% -100%"){
				$posValDegActivo=4;
			}
			return $posValDegActivo;
			
		}
		
		
		public function CalcImpactActivo($ValorActivo){
			
			$posValActivo = $this->Posvalactivo($ValorActivo);
			$posValDegrada = $this->PosDegractivo($this->ValorDegradacion);
			return $this->matImpacto[$posValActivo][$posValDegrada];
		}
		
		public function CalcImpactTotalActivo($Iconf,$Iinte,$Idisp){
			
			$sImpacto = $this-> ValImpacto($Iconf) + $this->ValImpacto($Iinte) + $this->ValImpacto($Idisp);
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
			return $resTemp;
		}
		
	}

?>