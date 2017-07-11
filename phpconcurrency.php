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

//
// Declaring our accountants off ESCOPE 1
//
$j = 0 ;

//
// Declaring our accountants off ESCOPE 2
//
$n = 0 ;

//
// Declaring VetA and VetB
//
$VetA = [];
$VetB = [];

//
// Our stopping condition will be
//
$STOP = 10;

//
// start
//
echo "\nStarting php in competition using goto !\n";

//
// pause 1 second
//
sleep(1);


//
// 
//
SCOPE1 : 

++ $j;
	
	$semente = MtRand(0,30);

	$VetA[$j] = "I am thread 1 and I waited 1 seconds VetA[$j] = $semente";
	
	echo "\n";
	echo $VetA[$j];
	echo "\n";

	usleep(1000 * 500);
	
	if ($semente % 2 == 0 ) {
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE2;
	}
	else {
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE1;
	}

//
//
//
SCOPE2 : 

++ $n;
	
	$semente = MtRand(0,10);
	
	$VetB[$n] = "I am thread 2 and I waited 1 seconds VetB[$n] = $semente";
	
	echo "\n";
	echo $VetB[$n];
	echo "\n";

	//echo "\ny[$ii] = " . $n;
	usleep(1000 * 300);
	//sleep(1);
	
	if ($semente % 2 == 0 ) {
		
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE1;
	}
	else {
		
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE2;
	}


END :
if($n == $STOP && $j == $STOP)
echo "\n End of the game !!\n";

else if($j < $STOP)
goto SCOPE1;

else if($n < $STOP)
goto SCOPE2;

echo "\n";

echo "\nVetA :: ";
print_r($VetA);
echo "\n";

echo "\nVetB :: ";
print_r($VetB);
echo "\n";


//
// 
//
function MtRand($inicio, $fim) {

	return mt_rand($inicio, $fim);	
}
