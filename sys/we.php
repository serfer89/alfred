<?php
/*$xml = simplexml_load_file("http://api.openweathermap.org/data/2.5/weather?q=kyiv&mode=xml");


include('config.php');*/

//d01946c71f847270df726ba46cc786b6
$xml = new SimpleXMLElement(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Kyiv,uk&appid=d01946c71f847270df726ba46cc786b6&mode=xml&units=metric'));
$country = $xml->city->country;
$city = $xml->city['name'];

$temp= (string)$xml->temperature['value'];
$hum = (string)$xml->humidity['value'];
$clouds = (string)$xml->clouds['value'];
$weather = (string)$xml->weather['icon'];
$wind = (string)$xml->wind->speed['name'];
$lastupdate = (string)$xml->lastupdate['value'];
$xml2 = new SimpleXMLElement(file_get_contents('http://xml.weather.ua/1.2/forecast/23?dayf=1'));
$ppcp= (string)$xml2->forecast->day[0]->ppcp; //вероятность осадков
$temps= (string)$xml2->current->t;
$tusk= ($xml2->forecast->day[0]->p->max + $xml2->forecast->day[0]->p->min)/2;//давление


//mysql_query("UPDATE  `weather` SET  `temp`='$temps', `hum`='$hum', `weather`='$weather', `tusk` = '$tusk', `wind` = '$wind', `uptime`='$lastupdate';");
/*
echo $temp."-</br>";
echo $tusk."</br>";
echo $temps."°C";
*/
	$arr=array (
			array ('name'=>'temp','value'=> $temp), 
			array ('name'=>'hum','value'=> $hum), 
			array ('name'=>'weather','value'=> $weather),
			array ('name'=>'wind', 'value'=> $wind),
			array ('name'=>'uptime', 'value'=> $lastupdate),
			array ('name'=>'ppcp', 'value'=> $ppcp)
			);


echo json_encode($arr);

/*
switch ($weather)
{
case "01d":
echo "<img src=\"wimg/solnce.png\" alt=\"Чистое небо\">";
break;
case "01n":
echo "<img src=\"wimg/luna.png\" alt=\"Чистое небо\">";
break;
case "02d":
echo "<img src=\"wimg/malo.png\" alt=\"Малооблачно\">";
break;
case "02n":
echo "<img src=\"wimg/malo_n.png\" alt=\"Малооблачно\">";
break;
case "03d":
echo "<img src=\"wimg/rvan.png\" alt=\"Рваная облачность\">";
break;
case "03n":
echo "<img src=\"wimg/rvan_n.png\" alt=\"Рваная облачность\">";
break;
case "04d":
echo "<img src=\"wimg/halfobl.png\" alt=\"Облачно с прояснениями\">";
break;
case "04n":
echo "<img src=\"wimg/halfobl.png\" alt=\"Облачно с прояснениями\">";
break;
case "09d":
echo "<img src=\"wimg/liv.png\" alt=\"Ливневый дождь\">";
break;
case "09n":
echo "<img src=\"wimg/liv.png\" alt=\"Ливневый дождь\">";
break;
case "10d":
echo "<img src=\"wimg/rain.png\" alt=\"Дождь\">";
break;
case "10n":
echo "<img src=\"wimg/rain.png\" alt=\"Дождь\">";
break;
case "11d":
echo "<img src=\"wimg/flash.png\" alt=\"Гроза\">";
break;
case "11n":
echo "<img src=\"wimg/flash.png\" alt=\"Гроза\">";
break;
case "13d":
echo "<img src=\"wimg/snow.png\" alt=\"Снег\">";
break;
case "13n":
echo "<img src=\"wimg/snow_n.png\" alt=\"Снег\">";
break;
case "50d":
echo "<img src=\"wimg/tuman.png\" alt=\"Туман\">";
break;
case "50n":
echo "<img src=\"wimg/tuman.png\" alt=\"Туман\">";
break;
}
echo "</font></div>";*/

/*
01d	01n	Чистое небо
02d	02n	Малооблачно
03d	03n	Рваная облачность
04d	04n	Облачно с прояснениями
09d	09n	Ливневый дождь
10d	10n	Дождь
11d	11n	Гроза
13d	13n	Снег
50d	50n	Туман */
 ?>
