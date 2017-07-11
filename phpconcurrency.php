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
// Mile seconds
//
define("TIME", 1000);

//
// Declaring our accountants off ESCOPE 1
//
$j = 0 ;

//
// Wait please scope 1
//
define("SCOPE_FUNC1_USLEEP", 800);

//
// Declaring our accountants off ESCOPE 2
//
$n = 0 ;

//
// Wait please scope 1
//
define("SCOPE_FUNC2_USLEEP", 500);

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
// Our scope of function, our label
//
SCOPE_FUNC1 : 

	//
	// For our control structure if it reaches the stop condition
	//
	if ($j == $STOP)
	goto END;

	//
	// counter
	// 
	++ $j;
	
	//
	// wait please
	//
	usleep(TIME * SCOPE_FUNC1_USLEEP);
	
	//
	// Generating any random value to fill our Vet
	//
	$semente = MySeed(0,100);

	//
	// Filling our Vet with generated seed skin values
	//
	$VetA[$j] = "I am thread 1 and I waited 1 seconds VetA[$j] = $semente";
	
	//
	//
	//
	echo "\n";
	echo $VetA[$j];
	echo "\n";

	//
	//
	//
	if ($semente % 2 == 0 ) {
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE_FUNC2;
	}
	else {
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE_FUNC1;
	}

//
//
//
SCOPE_FUNC2 : 

if ($n == $STOP)
goto END;

++ $n;
	
	$semente = MySeed(0,10);
	
	$VetB[$n] = "I am thread 2 and I waited 1 seconds VetB[$n] = $semente";
	
	echo "\n";
	echo $VetB[$n];
	echo "\n";


	usleep(TIME * SCOPE_FUNC2_USLEEP);

	
	if ($semente % 2 == 0 ) {
		
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE_FUNC1;
	}
	else {
		
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE_FUNC2;
	}


END :
if($n == $STOP && $j == $STOP)
echo "\n End of the game !!\n";

if($n == $STOP && $j < $STOP)
goto SCOPE_FUNC1;

if($n < $STOP && $j == $STOP)
goto SCOPE_FUNC2;


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
function MySeed($inicio, $fim) {

	return mt_rand($inicio, $fim);	
}
