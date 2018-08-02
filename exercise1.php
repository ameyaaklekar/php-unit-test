<?php

function combineTwoArrays($firstArray, $secondArray) 
{

	if(is_array($firstArray) && is_array($secondArray)) {
		$combinedArray = array_merge($firstArray, $secondArray);
		sort($combinedArray);

		return $combinedArray;
	} 
	else
	{
		return 'Invalid Input';
	}

}

$firstArray = [1,1,3,5];
$secondArray = [1,2,3,4];

$result = combineTwoArrays($firstArray, $secondArray);
var_dump($result);