<?php
	function horaParaExtenso($hora){
		//hh:mm
		$arr = explode(':',$hora);
		$horas = $arr[0];
		$min = $arr[1];
		switch($horas){
			case 0: $horas = "zero"; break;
			case 1: $horas = "uma"; break;
			case 2: $horas = "duas"; break;
			case 3: $horas = "três"; break;
			case 4: $horas = "quatro"; break;
			case 5: $horas = "cinco"; break;
			case 6: $horas = "seis"; break;
			case 7: $horas = "sete"; break;
			case 8: $horas = "oito"; break;
			case 9: $horas = "nove"; break;
			case 10: $horas = "dez"; break;
			case 11: $horas = "onze"; break;
			case 12: $horas = "doze"; break;
			case 13: $horas = "treze"; break;
			case 14: $horas = "catorze"; break;
			case 15: $horas = "quinze"; break;
			case 16: $horas = "dezasseis"; break;
			case 17: $horas = "dezassete"; break;
			case 18: $horas = "dezoito"; break;
			case 19: $horas = "dezanove"; break;
			case 20: $horas = "vinte"; break;
			case 21: $horas = "vinte e uma"; break;
			case 22: $horas = "vinte e duas"; break;
			case 23 : $horas = "vinte e três"; break;
		}
		switch($min){
			case 1: $min = "um"; break;
			case 2: $min = "dois"; break;
			case 3: $min = "três"; break;
			case 4: $min = "quatro"; break;
			case 5: $min = "cinco"; break;
			case 6: $min = "seis"; break;
			case 7: $min = "sete"; break;
			case 8: $min = "oito"; break;
			case 9: $min = "nove"; break;
			case 10: $min = "dez"; break;
			case 11: $min = "onze"; break;
			case 12: $min = "doze"; break;
			case 13: $min = "treze"; break;
			case 14: $min = "catorze"; break;
			case 15: $min = "quinze"; break;
			case 16: $min = "dezasseis"; break;
			case 17: $min = "dezassete"; break;
			case 18: $min = "dezoito"; break;
			case 19: $min = "dezanove"; break;
			case 20: $min = "vinte"; break;
			case 21: $min = "vinte e um"; break;
			case 22: $min = "vinte e dois"; break;
			case 23 : $min = "vinte e três"; break;
			case 24: $min = "vinte e quatro"; break;
			case 25: $min = "vinte e cinco"; break;
			case 26: $min = "vinte e seis"; break;
			case 27: $min = "vinte e sete"; break;
			case 28: $min = "vinte e oito"; break;
			case 29: $min = "vinte e nove"; break;
			case 30: $min = "trinta"; break;
			case 31: $min = "trinta e um"; break;
			case 32: $min = "trinta e dois"; break;
			case 33: $min = "trinta e três"; break;
			case 34: $min = "trinta e quatro"; break;
			case 35: $min = "trinta e cinco"; break;
			case 36: $min = "trinta e seis"; break;
			case 37: $min = "trinta e sete"; break;
			case 38: $min = "trinta e oito"; break;
			case 39: $min = "trinta e nove"; break;
			case 40: $min = "quarenta"; break;
			case 41: $min = "quarenta e um"; break;
			case 42: $min = "quarenta e dois"; break;
			case 43: $min = "quarenta e três"; break;
			case 44: $min = "quarenta e quatro"; break;
			case 45: $min = "quarenta e cinco"; break;
			case 46: $min = "quarenta e seis"; break;
			case 47 : $min = "quarenta e sete"; break;
			case 48: $min = "quarenta e oito"; break;
			case 49: $min = "quarenta e nove"; break;
			case 50: $min = "cinquenta"; break;
			case 51: $min = "cinquenta e um"; break;
			case 52: $min = "cinquenta e dois"; break;
			case 53: $min = "cinquenta e três"; break;
			case 54: $min = "cinquenta e quatro"; break;
			case 55: $min = "cinquenta e cinco"; break;
			case 56: $min = "cinquenta e seis"; break;
			case 57: $min = "cinquenta e sete"; break;
			case 58: $min = "cinquenta e oito"; break;
			case 59: $min = "cinquenta e nove"; break;
			//case 60: $min = "sessenta"; break;
		}
		if ($horas == "uma"){
			$res =  $horas." hora";
			if ($min == "0")
				return $res;
			else{
				if ($min == "um")
					$res.= " e ".$min." minuto";
				else
					$res.= " e ".$min." minutos";
			}
		}else{
			$res =  $horas." horas";
			if ($min == "0")
				return $res;
			else{
				if ($min == "um")
					$res.= " e ".$min." minuto";
				else
					$res.= " e ".$min." minutos";
			}
		}
		return $res;
	}
?>