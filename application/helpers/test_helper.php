<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

 $flag = 0;
 
function cetak()
{
	echo "123";
}

function value_checker()
{
	$flag = 1;
	
	$arr123 = array(); 	
	$arr123[0]['kode']= "tes1";
	$arr123[1]['kode']= "tes2";
	$arr123[2]['kode']= "tes3";
	$arr123[3]['kode']= "tes4";
	
	foreach($arr123 as $arrke1 => $arrke2)
	{
		//foreach($arrke2 as $arrke2)
		//{
			if(substr(($arr123[$arrke1]['kode']),-1) == 4)
			{
				$flag = 0;
				echo "data sudah ada";
			}
	}
	
	
	
	if($flag == 1)
	{
		echo "data dimasukkan";
	}
}

function addArray($var1,$var2,$var3)
{
	$flag = 1;
	/*$id = substr($var1, strrpos($var1, '-') + 1);
	$id = substr($var1, -3);
	$id2 = ltrim($id, '0');*/
	//echo $id2;
	//print_r($_SESSION["arrayTemp"]);
	
	
	
	$arr = array('kode'=>$var1, 'nama'=>$var2, 'telpon'=>$var3); 	
	$list = $_SESSION["arrayTemp"];
	
	if(is_array($list) == false)
	{
		$list = array($arr);
		
	
	}
	
	
	foreach ($_SESSION["arrayTemp"] as $array1 => $array2) 
	{
		if(($_SESSION["arrayTemp"][$array1]['kode']) == $var1)
		{
			$flag = 0;
			/*array_push($list, $arr);	
				
			$_SESSION["arrayTemp"] = $list;
			
			$arraySession = $_SESSION["arrayTemp"];
			
			echo "<br>";*/
			
		}
    }  
	
	if($flag == 0)
	{
		echo "Kode tersebut sudah ada" . "<br/>";
	}
	else
	{
		//foreach ($_SESSION["arrayTemp"] as $array1 => $array2) 
		//{
			
			
			array_push($list, $arr);	
					
			$_SESSION["arrayTemp"] = $list;
				
			$arraySession = $_SESSION["arrayTemp"];
				
			echo "<br>";
		//}  
	}
	
	$arraySession = $_SESSION["arrayTemp"];
	echo nl2br(print_r($arraySession, true));
	//if($_SESSION["arrayTemp"][])
	
	/*array_push($list, $arr);
		
		
	$_SESSION["arrayTemp"] = $list;
	
	
	$arraySession = $_SESSION["arrayTemp"];
	
	echo nl2br(print_r($arraySession, true));
	
	echo "<br>";*/
}


function cetak_array()
{
	
	
	$arraySession = $_SESSION["arrayTemp"];
	$_SESSION["arrayTemp"] = $arraySession;
	
	print_r($_SESSION["arrayTemp"]);
	echo "<br>";
	echo nl2br(print_r($arraySession, true));
	 

}

function cari_array($var1)
{
	$flag = 1;
	$arraySession = $_SESSION["arrayTemp"];
	
	

	foreach ($arraySession as $array1 => $array2) 
	{
		//foreach ($array2 as $varTemp) 
		//{
			//echo "Array {$array1} berisikan {$varTemp}<br />";
			
			//if(strtolower($varTemp) == (strtolower($var1)))
			//{
				if((strpos(strtolower($arraySession[$array1]['kode']), strtolower($var1)) !== FALSE)||
				(strpos(strtolower($arraySession[$array1]['nama']), strtolower($var1)) !== FALSE)||
				(strpos(strtolower($arraySession[$array1]['telpon']), strtolower($var1)) !== FALSE))
				{	
					//echo $arraySession[$array1];
					echo $arraySession[$array1]['kode']. "<br/>";
					echo $arraySession[$array1]['nama']. "<br />";
					echo $arraySession[$array1]['telpon']. "<br />";
					$flag = 0;
				}
			//}
		//}
    }
	
	if($flag == 1)
	{
		echo "Input tidak benar atau kode tidak ada";
	}

	
}


function hapus_array($var1)
{
	$flag = 1;
	$arraySession = $_SESSION["arrayTemp"];
	//$arraySession = "";

	
	
	//unset($_SESSION['arrayTemp']);
	  
	 
	foreach ($arraySession as $array1 => $array2) 
	{
		//echo "Array {$array1} berisikan {$varTemp}<br />";
		
		if(strtolower($arraySession[$array1]['kode']) == (strtolower($var1)))
		{
			//unset($arraySession[]);
			unset ($arraySession[$array1]);
			$flag = 0;
		}
		
    }  
	
	if($flag == 1)
	{
		echo "Input tidak benar atau kode tidak ada";
	}
	
	$_SESSION["arrayTemp"] = array_values($arraySession);
	  
	//print_r($_SESSION["arrayTemp"]);
}
?>
