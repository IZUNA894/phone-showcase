<?php

    $specs=array();
    function mk_array($str)
    {
        global $specs;
        $arr= explode(";",$str);
        //print_r($arr);
        foreach($arr as $unit)
        {
            $data = explode(":",$unit);
            $key = $data[0];
            $value = $data[1];
            $specs[$key]=$value;
            //print_r($specs);


        }



    };


?>
