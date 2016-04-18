<?php

    $num = 0;
    $arr = array();
    foreach ($_POST as $key => $value)
    {
        if ($key == "button")
            break;
        else
        {
    	    $arr[$num++] = $value;
        }
    }

    function merge(&$sourcearr,$temparr,$start,$mid,$end)
    {
        $i = $start;
        $j = $mid +1;
        $k = $start;
        while ($i != $mid + 1 and $j != $end +1)
        {
	    if ($sourcearr[$i] >= $sourcearr[$j])
        	$temparr[$k++] = $sourcearr[$j++];
	    else
		$temparr[$k++] = $sourcearr[$i++];
	}
	while ($i != $mid + 1)
        {
	    $temparr[$k++] = $sourcearr[$i++];
	}
	while ($j != $end +1)
	{
	    $temparr[$k++] = $sourcearr[$j++];
	}
	for ($n = $start;$n <= $end;$n++)
	{
	    $sourcearr[$n] = $temparr[$n];
	}
    }    
    
    function merge_sort(&$arr,$temp,$head,$tail)
    {
        if ($head < $tail)
        {
	    $mid = floor(($head + $tail) / 2);
    	    merge_sort($arr,$temp,$head,$mid);
            merge_sort($arr,$temp,$mid+1,$tail);
            merge($arr,$temp,$head,$mid,$tail);
        }
    }

    merge_sort($arr,$temp,0,$num-1);
    echo "<h1>The Answer Array Is :</h1>";
    foreach($arr as $value)
    {
        echo "<a style='font-size:25px; margin-left:5px; margin-right:5px;'>$value</a>";
    }
?>
