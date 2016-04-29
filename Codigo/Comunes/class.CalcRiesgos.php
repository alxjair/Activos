<?php

	class CalcRiesgos{
		
		
		private $ImpactoActivo;
		private $ImpactoAcumuladoActivo;
		

		public function __construct(){
			
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
		
		public function CalcImpactActivo($Iconf,$Iinte,$Idisp){
			
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