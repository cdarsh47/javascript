<?php

$limit=$_GET['limit'];
$offset=$_GET['offset'];
//phpinfo();
$db = mysqli_connect('localhost', 'root', '','test');

if (!$db) {
    die('Could not connect: ' . mysqli_error());
}

//echo 'Connected successfully';

$result = mysqli_query($db,"SELECT * FROM contact_book LIMIT $limit OFFSET $offset");


$rows=array();
while($data = mysqli_fetch_array($result)) {
    $inner_array=array('name'=>$data['name'],'email_id'=>$data['email_id'],'contact_number'=>$data['contact_number'],'address'=>$data['address']); 
    $rows[$data['id']]=$inner_array;
}

mysqli_close($db);

echo json_encode($rows);
?>