<?php
/***********
*
* project PHP, Concurrency is not Parallelism
*
* @package     main php 
* @author      jeffotoni
* @copyright   Copyright (c) 2017
* @license     --
* @link        --
* @since       Version 0.1
* 
*/

$i = 1 ;
$j = 0 ;

$ii = 2;
$n = 0 ;

$VetA = [];
$VetB = [];

$randon = 2;

echo "\nStarting php in competition using goto " . $i ;
sleep(1);

SCOPE1 : 
//++ $i;
++ $j;
//for($j = 0 ; $j < 10 ; $j ++ ) {
	
	//echo "\nRand: " . MtRand();
	$semente = MtRand(0,30);

	$VetA[$j] = "I am thread 1 and I waited 1 seconds VetA[$j] = $semente";
	
	echo "\n";
	echo $VetA[$j];
	echo "\n";

	//echo "\nx[$i] = " . $j;
	
	sleep(1);
	//usleep(1000 * 500);
	
	if ($semente % 2 == 0 ) {
		if ($j == 10)
			goto END;
		else
			goto SCOPE2;
	}
	else {
		if ($j == 10)
			goto END;
		else
			goto SCOPE1;
	}

	if ($i == 10)
		GOTO END;
//}

SCOPE2 : 
//++ $ii;
++ $n;
//for($n = 0 ; $n < 10 ; $n ++ ) {
	
	$semente = MtRand(0,10);
	
	$VetB[$n] = "I am thread 2 and I waited 1 seconds VetB[$n] = $semente";
	
	echo "\n";
	echo $VetB[$n];
	echo "\n";

	//echo "\ny[$ii] = " . $n;
	// usleep(1000 * 300);
	sleep(1);
	
	if ($semente % 2 == 0 ) {
		
		if ($n == 10)
			goto END;
		else
			goto SCOPE1;
	}
	else {
		
		if ($n == 10)
			goto END;
		else
			goto SCOPE2;
	}

	
//}
//
END :
if($n == 10 && $j == 10)
echo "\n End of the game !!\n";

else if($n < 10)
goto SCOPE2;

else if($j < 10)
goto SCOPE1;

echo "\n";

echo "\nVetA :: ";
print_r($VetA);
echo "\n";

echo "\nVetB :: ";
print_r($VetB);
echo "\n";

// semente de microsegundos
// function make_seed()
// {
//     list($usec, $sec) = explode(' ', microtime());
//     return (float) $sec + ((float) $usec * 100000);
// }

// echo mt_srand(make_seed());
// echo "\n";

function MtRand($inicio, $fim) {

	return mt_rand($inicio, $fim);	
}

//echo $randval = mt_rand(0,100);
//echo "\n";