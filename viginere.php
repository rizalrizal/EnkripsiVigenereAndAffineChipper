<?php 
function ascii2hex($ascii) {
  $hex = '';
  for ($i = 0; $i < strlen($ascii); $i++) {
    $byte = strtoupper(dechex(ord($ascii{$i})));
    $byte = str_repeat('0', 2 - strlen($byte)).$byte;
    $hex.=$byte." ";
  }
  return $hex;
}

function Cipher($input, $key, $m, $b, $encipher)
{
	$output='';
	if($encipher){
		$p = strlen($input);
		$k = strlen($key);
		$arrkey = array();
		$arrkunci = array();
		$arrvigenere = array();
		$arrmodvigenere = array();
		$affinechiper = array();
		$finalaffinechiper = array();
		$flag = 0;
		for ($i=0; $i < $p; $i++) { 
			$arrtext[] = ord($input[$i]);
			if($flag == $k) $flag = 0;
			$arrkey[] = ord($key[$flag]);
			$flag++;
			$arrvigenere[] = $arrtext[$i] + $arrkey[$i];
			$hasil = gmp_mod($arrvigenere[$i], 127);
			$arrmodvigenere[] = $hasil;
			$hasil = $m*$arrmodvigenere[$i] + $b;
			$hasil = gmp_mod($hasil, 127);
			$affinechiper[] = $hasil;
			$dechextemp = dechex($affinechiper[$i]);	
			if(strlen($dechextemp) == 1){
				$finalaffinechiper[] = "0$dechextemp";
			}else{
				$finalaffinechiper[] = $dechextemp;
			}
			$output .= $finalaffinechiper[$i];
		}
	}else{
		$flag = 0;
		$finalaffinechiper = array();
		$affinetovigenere = array();
		$vigeneretoplain = array();
		$p = strlen($input);
		$k = strlen($key);
		$get_two_char = $p/2;
		$start = 0;
		for ($i=0; $i < $get_two_char; $i++) { 
			$finalaffinechiper[] = substr($input, $start,2);
			$start = $start + 2;
		}

		$tanda=false;
		$naik=1;
		$y = 0;
		while($tanda == false){
			$cari =($m*$naik)%127;
			if($cari == 1){
				$y = $naik;
				$tanda = true;
			}
			$naik++;
		}
		for ($i=0; $i < $get_two_char ; $i++) { 
			if($flag == $k) $flag = 0;
			$arrkey[] = ord($key[$flag]);
			$flag++;
			$decfromhex = hexdec($finalaffinechiper[$i]);
			$hasil = $y*($decfromhex-$b);
			$finalhasil = gmp_mod($hasil,127);
			$affinetovigenere[] = $finalhasil;
			$hasil = $affinetovigenere[$i] - $arrkey[$i];
			$hasilmod = gmp_mod($hasil,127);
			$vigeneretoplain[] = $hasilmod;
			$output .= chr((int)$vigeneretoplain[$i]);
			
		}
	}

	return $output;
}

function Encipher($input, $key, $m, $b)
{
	return Cipher($input, $key, $m, $b, true);
}

function Decipher($input, $key, $m, $b)
{
	return Cipher($input, $key, $m, $b, false);
}
 ?>