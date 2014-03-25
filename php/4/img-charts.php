<?php

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}


$data = array ( 	//no spaces 
	"series1" => "10,20,30,40",
	"series2" => "20,25,30,35",
	"series3" => "30,30,20,20");

// Google Image Charts 
// see https://developers.google.com/chart/image/docs/chart_params
$chart_data = "chd=t:".$data['series1']."|".$data['series2']."|".$data['series3']; //data
//$chart_data .= "&chds=a"; //automatic scaling
$chart_data .= "&chds=0,50,0,50,0,50"; 
$chart_data .= "&cht=bvg"; //chart type
$chart_data .= "&chs=200x200"; //chart size
//$chart_data .= "&chl=Awesome+Chart"; //chart label
$chart_data .= "&chdl=series1|series2|series3"; //chart data labels
$chart_data .= "&chco=FF0000,00FF00,0000FF";  // series colors
$chart_data .= "&chxt=x,y";


print "<pre>$chart_data</pre><hr><p>";

$chart_url = "https://chart.googleapis.com/chart?";
$chart_url .= $chart_data;

print "<pre>$chart_url</pre><hr><p>";

print <<<EOF
<img src="$chart_url" width=200 height=200></img>
EOF;

?>
