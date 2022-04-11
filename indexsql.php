<?php
$servername = "mockey";
$username = "root";
$password = "";
$dbname = "tâche_php";
$conn = new mysqli($servername, $username, $password);
$conn->set_charset("utf8");
$sql = "drop database tâche_php;";

$conn->query($sql);
// $sqlDir=dirname(__FILE__).DIRECTORY_SEPARATOR.'sql'.DIRECTORY_SEPARATOR.'createDBs.sql';
// $sqlDir=str_replace('\\','/',$sqlDir);
// $sql="source $sqlDir";
// echo $sqlDir;
// if ($conn->query($sql)) {
//     echo "create database success!";
// } else {
//     echo "failed to create database!" . $conn->error . "</br>";
// }

// // $conn=new mysqli($servername,$username,$password,$dbname);
// // if($conn->connect_error){
// // die("连接失败".$conn->connect_error);
// // }
// // $sql="use $dbname";
// // $conn->query($sql);
// $conn->select_db($dbname);

// // set names utf8;
// // 
// // $sql="select *from ";
// $sql = "
// CREATE TABLE `utilisateur` (
//     `utilisateur_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
//     `utilisateur_ip` varchar(20) NOT NULL COMMENT 'IP',
//     `utilisateur_nom` varchar(20) NOT NULL COMMENT 'nom',
//     `utilisateur_mot_de_passe` varchar(15) NOT NULL COMMENT 'mot_de_passe',
//     `utilisateur_email` varchar(30) NOT NULL COMMENT 'E-mail',
//     `utilisateur_Portrait` blob DEFAULT NULL COMMENT 'Portrait',
//     `utilisateur_date_inscription` datetime DEFAULT NULL COMMENT 'date d\'inscription',
//     `utilisateur_anniversaire` date DEFAULT NULL COMMENT 'anniversaire',
//     `utilisateur_âge` tinyint(4) DEFAULT NULL COMMENT 'âge',
//     `utilisateur_Numéro_téléphone` bigint(11) NOT NULL COMMENT 'Numéro de téléphone ',
//     `utilisateur_surnom` varchar(20) NOT NULL COMMENT 'surnom',
//     PRIMARY KEY (`utilisateur_id`),
//     KEY `utilisateur_nom` (`utilisateur_nom`),
//     KEY `utilisateur_surnom` (`utilisateur_surnom`),
//     KEY `utilisateur_email` (`utilisateur_email`),
//     KEY `utilisateur_Numéro_téléphone` (`utilisateur_Numéro_téléphone`)
//    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
// ";
// // ;
// if ($conn->query($sql) === false) {
//     echo 'faile';
//     echo "create table faile" . $conn->error;
//     echo "<br/>";
//     // return;
// }
// echo $conn->get_charset()->charset;
// echo "<br/>";
// echo "连接成功";
// echo "<br/>";

// $sql = "insert into utilisateur(
//     utilisateur_ip,
//     utilisateur_nom,
//     utilisateur_mot_de_passe,
//     utilisateur_email,
//     utilisateur_date_inscription,
//     utilisateur_anniversaire,
//     utilisateur_Numéro_téléphone,
//     utilisateur_surnom
// )
// values(
//     '172.1.1.1',
//     'yangxu',
//     '123456',
//     '2212346907@qq.com',
//     now(),
//     curdate(),
//     '15278691023',
//     '九日'
// )";
// if ($conn->query($sql) === false) {
//     echo 'faile';
//     echo "insert table faile" . $conn->error;
//     echo "<br/>";
//     return;
// }
// //创建数据库
// // $sql="CREATE DATABASE myDB";
// // if($conn->query($sql)===TRUE){
// //     echo "build db success";
// // }else{echo "fail to build db:".$conn->error;}
// // echo "<br/>";

// //创建数据表
// // $conn=new mysqli($servername,$username,$password,$dbname);
// // $sql="CREATE TABLE MYTABLE(
// //     ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// //     FIRSTNAME VARCHAR(30) NOT NULL,
// //     LASTNAME VARCHAR(30) NOT NULL,
// //     EMAIL VARCHAR(50),
// //     REG_DATE TIMESTAMP
// //     )";
// // if($conn->query($sql)===TRUE){
// //     echo "table created successfully!";
// // }else {echo "fail to craete table :".$conn->error; }
// // echo "<br/>";

// //插入数据
// // $sql="INSERT INTO myTABLE (FIRSTNAME,LASTNAME,EMAIL)
// // VALUES('XU','YANG','2212346907@QQ.COM')";
// // if($conn->query($sql)===TRUE){
// //     echo "新记录插入成功";
// // }else{echo "Error:".$sql."<br/>".$conn->error;}

// //使用预处理语句进行数据插入
// // $sql="Insert into mytable (firstname,lastname,email) values(?,?,?)";
// // $stmt=$conn->prepare($sql);
// // $stmt->bind_param("sss",$firstname,$lastname,$email);
// // $firstname="gala";
// // $lastname="mockey";
// // $email="yang7927669@gmail.com";
// // $stmt->execute();
// // $stmt->close();

// //读取数据
// //where
// // $sql="select distinct email from mytable where firstname='xu'";

// //order by
// // $sql="select * from mytable order by id desc";

// //update
// // $sql="update mytable set email='raintlung@outlook.com' where email='2212346907@qq.com'";
// // mysqli_query($conn,$sql);
// // $sql="select id,Firstname,email from mytable";

// //delete
// // $sql="delete from mytable where id=3";
// // mysqli_query($conn,$sql);

// //custom
// // $sql="insert into mytable (firstname,lastname,email) values('XU','Yang','2212346907')";
// // $conn->query($sql);
// // $sql="select id,Firstname,email from mytable";

// // $result=$conn->query($sql);
// // // var_dump($result);
// // if($result->num_rows>0){
// //     echo "找到".$result->num_rows."条结果<br/>";
// //     while($row=$result->fetch_assoc()){
// //         echo "id:".$row["id"]."-name ".$row["Firstname"]."-email ".$row["email"]."<br/>";
// //         // echo "email".$row["email"];
// //         // echo $row[array_keys($row)[0]];
// //         // echo $row[array_keys($row)[1]];
// //         echo "<br/>";
// //     }
// // }else{echo "0结果";}
// ?>
// <html>

// <head>
//     <meta charset="utf8">
//     <title>mysqltest</title>
//     <link type="text/css" rel="stylesheet" href="css/index.css">
// </head>

// <body>
//     <?php
//     $sql = "select * from utilisateur";
//     echo "<div>";
//     echo "<table ><tr>";
//     echo "<th>id</th>";
//     echo "<th>firstname</th>";
//     echo "<th>lastname</th>";
//     echo "<th>email</th></tr>";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         echo $result->num_rows;
//         while ($row = $result->fetch_assoc()) {
//             foreach ($row as $a) {
//                 echo "<tr>";
//                 echo "<td>" . $a . "<td/>";
//                 // echo "<td>".$row[array_keys($row)[1]]."<td/>";
//                 // echo "<td>".$row[array_keys($row)[2]]."<td/>";
//                 // echo "<td>".$row[array_keys($row)[6]]."<td/>";
//                 echo "<tr/>";
//             }
//         }
//     }
//     $conn->close();
//     echo "</table>";
//     echo "</div>";
//     ?>

// </body>

// </html>