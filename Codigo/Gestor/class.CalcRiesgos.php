<?php

/**
******************************************************
* @file class.CalcRiesgos.php
* @class
* @brief Clase encargada de realizar los principales calculos de riesgos a los activos de informacion.
* @author Grupo Proyecto Sistema de Gestión Activos de Información ingesoft2
* @version 3.0
* @date Mayo 2016
*******************************************************/

class CalcRiesgos{
	
	
/**
 * @brief Conjunto de Atributos que son parte de la clase.
 * @param [string] $ImpactoAcumuladoActivo Acumula el valor de todos los impactos para el calculo del Riesgo Inherente.
 * @param [string] $matRIneherente Contiene la matriz que realiza los cruces de las dimenciones necesarios para el calculo del Riesgo Inherente.
 * @param [string] $matImpacto Contiene la matriz que realiza los cruces de las dimenciones necesarios para el calculo del Riesgo Inherente.
 * @param [string] $matRIneherente Contiene la matriz que que realiza los cruces de las dimenciones necesarios para el calculo del Impacto por dimesion.
 * @param [string] $ValorDegradacion Valor de la degradacion causada a un activo.
 */
		
		private $ImpactoAcumuladoActivo;
		protected $matRIneherente;
		protected $matImpacto;
		protected $ValorDegradacion;
		

/**
 * @brief Constructor de la clase que realizara la inicializacion de las matrices de calculo con los valores definidos e iniciaña el valor de la degradacion.
 * @param [string] Se inicializa la clase con el valor de la degradacion de un activo de manera obligatoria.
 * @return Sin retorno.
 */
		public function __construct($valDeg){

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
	
/*
* @brief Metodo Protegido que realiza la homologacion del Valor del Impacto de manera numerica.		
* @param [string] $vRiesgo - Valor cualitativo activo en la dimension requerida.
* @return string $vImpacto - Valor cuantitativo del impacto.
*/	
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
		

/*
* @brief Metodo Protegido que calculara la posicion en la matriz correspondiente al valor del activo en la dimension requerida.		
* @param [string] $valActivo - Valor cualitativo del activo en la dimension correspondiente
* @return string $posValActivo - Valor de la posicion en el eje correspondiente al valor de activo para ser ubicado en la matriz de Impactos.
*/	
		
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
	
/*
* @brief Metodo Protegido que calculara la posicion en la matriz correspondiente al valor de la degradación en la dimensión requerida.		
* @param [string] $valDeg - Valor cualitativo de la degradacion que tiene un activo a causa de una amenaza
* @return int $posValDegActivo - Valor de la posicion en el eje correspondiente al valor de la degradación para ser ubicado en la matriz de impactos.
*/
		
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
/*
* @brief Metodo Protegido que calculara la posicion en la matriz correspondiente al valor del Impacto total.		
* @param [string] $valImpacto - Valor cualitativo del impacto que tiene un activo de acuerdo al cruce del valor y la degradación.
* @return int $posValImpac - Valor de la posicion en el eje correspondiente al valor del impacto para ser ubicado en la matriz de impactos.
*/
		
		protected function PosvalImpacto($valImpacto) {
			
			$posValImpac=0;
			
			if($valImpacto == "INSIGNIFICANTE"){
				$posValImpac=0;
			}else if($valImpacto == "BAJO"){
				$posValImpac=1;
			}else if($valImpacto == "MODERADO"){
				$posValImpac=2;
			}else if($valImpacto == "MAYOR"){
				$posValImpac=3;	
			}else if($valImpacto == "CATASTROFICO"){
				$posValImpac=4;	
			}
			return $posValImpac;
		}
		
/*
* @brief Metodo Protegido que calculara la posicion en la matriz correspondiente al valor de la probabilidad de ocurrencia.
* @param [string] $valProba - Valor cualitativo de la probabilidad de ocurrenciaque tiene una amenaza.
* @return int $posValProba - Valor de la posicion en el eje correspondiente al valor del impacto para ser ubicado en la matriz de impactos.
*/
		
		protected function PosvalProba($valProba) {
			
			$posValProba=0;
			
			if($valProba == "MUY FRECUENTE"){
				$posValProba=0;
			}else if($valProba == "PROBABLE"){
				$posValProba=1;
			}else if($valProba == "PUEDE OCURRIR"){
				$posValProba=2;
			}else if($valProba == "EVENTUALMENTE"){
				$posValProba=3;	
			}else if($valProba == "RARA VEZ"){
				$posValProba=4;	
			}
			
			return $posValProba;
			
		}
		
/*
* @brief Metodo Publico que realiza el calculo del impacto en la dimencion correspondiente.
* @param [string] $ValorActivo - Valor cualitativo correspondiente al activo.
* @return string matImpacto[$posValActivo][$posValDegrada] - Valor del impacto deacuerdo al cruce posicional obtenido con los metodos.
*/
		public function CalcImpactActivo($ValorActivo){	
			$posValActivo = $this->Posvalactivo($ValorActivo);
			$posValDegrada = $this->PosDegractivo($this->ValorDegradacion);
			return $this->matImpacto[$posValActivo][$posValDegrada];
		}
		

	
/*
* @brief Metodo Publico que calcula el riesgo Total de un activo sumando todas las dimensiones.
* @param [string] $Iconf - Valor Impacto Confidencialidad.
* @param [string] $Iinte - Valor Impacto Integridad.
* @param [string] $Idisp - Valor Impacto Disponibilidad.
* @return string $resTemp - Valor cualitativo del impacto total.
*/
		
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
		
		
/*
* @brief Metodo Publico que calcula el riesgo Inherente de un activo.
* @param [string] $vImpacto - Valor cualitativo total del impacto en el activo.
* @param [string] $probabilidad - Valor cualitativo de la probabilidad de ocurrencia.
* @return string matRIneherente[$posProbabi][$posValImpacto] - Valor del riesgo inherente deacuerdo al cruce posicional obtenido con los metodos.
*/
		
		public function CalcrInherente($probabilidad, $vImpacto){
			
			$posProbabi = $this->PosvalProba($probabilidad);
			$posValImpacto = $this->PosvalImpacto($vImpacto);
			return $this->matRIneherente[$posProbabi][$posValImpacto];
		}
		
	}

?>