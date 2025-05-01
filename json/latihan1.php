<?php

// $mahasiswa =[
//     [
//         "nama" => "Lidya Afriwaningsih",
//         "nim" => 2217020009,
//         "email" => "afriwaningsih@gmail.com"
//     ],
//     [
//         "nama" => "Lidya Afriwaningsih",
//         "nim" => 2217020009,
//         "email" => "afriwaningsih@gmail.com"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '', );
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;


?>