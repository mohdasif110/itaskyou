<?php 

$minvalue		=	8931;
$maxvalue		=	13396;


$myArray = array(1,2,3,4,5,6,10,11,12,13,20,24);

//last value is dropped so add something useless to be dropped
array_push($myArray, null);
$rangeArray = array();

array_walk($myArray, function($val) use (&$rangeArray){
    static $oldVal, $rangeStart;

    if (is_null($rangeStart))
        goto init;

    if ($oldVal+1 == $val) {
        $oldVal = $val;
        return;
    }

    if ($oldVal == $rangeStart) {
        array_push($rangeArray, $rangeStart);
        goto init;
    }

    array_push($rangeArray, $rangeStart . '-' . $oldVal);

    init: {
        $rangeStart = $val;
        $oldVal = $val;
    }
});


echo "<>";
print_r($rangeArray);


?>