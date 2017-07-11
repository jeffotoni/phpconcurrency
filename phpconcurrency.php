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
// Function that generates our random seed
//
function MySeed($inicio, $fim) {

	return mt_rand($inicio, $fim);	
}

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
// My Seed escope 1 -> 0 .. 100
//
define("SCOPE_FUNC1_SEED_I", 0);
define("SCOPE_FUNC1_SEED_F", 100);

//
// Declaring our accountants off ESCOPE 2
//
$n = 0 ;

//
// Wait please scope 2
//
define("SCOPE_FUNC2_USLEEP", 500);

//
// My Seed escope 2 -> 200 .. 300
//
define("SCOPE_FUNC2_SEED_I", 200);
define("SCOPE_FUNC2_SEED_F", 300);

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
	$seed = MySeed(SCOPE_FUNC1_SEED_I,SCOPE_FUNC1_SEED_F);

	//
	// Filling our Vet with generated seed skin values
	//
	$VetA[$j] = "I am thread 1 and I waited 1 seconds VetA[{$j}] = {$seed}";
	
	//
	// Present our vector on the screen
	//
	print "\n";
	print $VetA[$j];
	print "\n";

	//
	// We have created a simple way to choose when to switch between VetA and VetB
	//
	if ($seed % 2 == 0 ) {
		
		//
		// Stop if you are already in stop condition
		// If not send to another label
		//
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE_FUNC2;
	}
	else {

		//
		// Stop if you are already in stop condition
		// If not send to another label
		//
		if ($j == $STOP)
			goto END;
		else
			goto SCOPE_FUNC1;
	}

//
// Our scope of function, our label
//
SCOPE_FUNC2 : 
	
	//
	// For our control structure if it reaches the stop condition
	//
	if ($n == $STOP)
	goto END;
	
	//
	// counter
	// 
	++ $n;
	
	//
	// wait please
	//
	usleep(TIME * SCOPE_FUNC2_USLEEP);

	//
	// Generating any random value to fill our Vet
	//
	$seed = MySeed(SCOPE_FUNC2_SEED_I,SCOPE_FUNC2_SEED_F);
	
	//
	// Filling our Vet with generated seed skin values
	//
	$VetB[$n] = "I am thread 2 and I waited 1 seconds VetB[{$n}] = {$seed}";
	
	//
	// Present our vector on the screen
	//
	print "\n";
	print $VetB[$n];
	print "\n";

	//
	// We have created a simple way to choose when to switch between VetA and VetB
	//	
	if ($seed % 2 == 0 ) {
		
		//
		// Stop if you are already in stop condition
		// If not send to another label
		//
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE_FUNC1;
	}
	else {
		
		//
		// Stop if you are already in stop condition
		// If not send to another label
		//
		if ($n == $STOP)
			goto END;
		else
			goto SCOPE_FUNC2;
	}

//
// Scopo end, a label responsible for presenting 
// a message when finalizing our program
//
END :
	
	//
	// Our stopping condition
	//
	if($n == $STOP && $j == $STOP)
	print "\n===================== End of the game!! =======================";
	
	//
	// Sending again to finalize the filling of our vector
	//
	if($n == $STOP && $j < $STOP)
	goto SCOPE_FUNC1;

	//
	// Sending again to finalize the filling of our vector
	//
	if($n < $STOP && $j == $STOP)
	goto SCOPE_FUNC2;
	
	// 
	// Print of the vectors on the screen
	// 
	print "\n*****************************************************************";
	print "\nVetA :: ";
	print_r($VetA);
	print "\n*****************************************************************";

	print "\nVetB :: ";
	print_r($VetB);
	print "\n*****************************************************************";
