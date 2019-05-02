<?php

header('Content-Type: application/json');


//Open  sensor_data.db
//$db = new PDO('sqlite':/var/www/html/sensor_data.db);
$db = new SQLite3('sensor_data.db', SQLITE3_OPEN_READONLY);

if(!db){
	echo "The database is not there\n";
	exit();
}

$db_data = $db->query('SELECT DATE_TIME, TEMP1, IR, FULL, VIS, LUX, TEMP2, PRESSURE, HUMID FROM sensor_data LIMIT 1440');

if(!data){
	echo "Error accessing table\n";
	exit();
}

$data_read = array();

while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['TEMP1'];
	$data_out['data1'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['IR'];
	$data_out['data6'][] = $data_read; 
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['FULLS'];
	$data_out['data2'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['VIS'];
	$data_out['data3'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['LUX'];
	$data_out['data4'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['TEMP2'];
	$data_out['data5'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['PRESSURE'];
	$data_out['data7'][] = $data_read;
}
while($row = $db_data->fetchArray(SQLITE3_ASSOC)){
	$data_read['t'] = $row['DATE_TIME'];
	$data_read['y'] = $row['HUMID'];
	$data_out['data8'][] = $data_read;
}

echo json_encode($data_out,JSON_PRETTY_PRINT);

?>
