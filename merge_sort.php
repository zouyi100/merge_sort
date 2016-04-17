<?php
    $arr = array();
    $arr[0] = $_POST['n0'];
    $arr[1] = $_POST['n1'];
    $arr[2] = $_POST['n2'];
    $arr[3] = $_POST['n3'];
    $arr[4] = $_POST['n4'];
    $arr[5] = $_POST['n5'];
    $arr[6] = $_POST['n6'];
    $arr[7] = $_POST['n7'];

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

    merge_sort($arr,$temp,0,7);
    echo "<h1>The Answer Array Is :</h1>";
    foreach($arr as $value)
    {
        echo "<a style='font-size:25px; margin-left:5px; margin-right:5px;'>$value</a>";
    }
?>
