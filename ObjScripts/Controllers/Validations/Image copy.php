<>
<!-- <!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>welcome</title>
        <link type="text/css" rel="stylesheet" href="css/index.css">
    </head>
    <body>-->
<?php
$imageUploadErr = '';
$imagePath = "../../Resources/Default/Images/Default.png";
$defaultUploadPath = "../../Resources/Upload/Images/";
//默认上传上限
$maxUploadSize = 8 * 1024 * 1024; //已在php.ini中更改upload_max_filesize为8M（默认为2M）
// ini_set("upload_max_filesize",'10M');
// echo "image".DIRECTORY_SEPARATOR."png";
// echo $imagePath;
// function 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// echo $_POST["image"];
	echo ini_get('upload_max_filesize');
	echo $_FILES['image']['error'];
	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
		// if(!empty($_POST["image"])){
		// echo $_FILES;
		$allowedExts = array("gif", "jpeg", "jpg", "png", "pjpeg", "x-png");
		$temp = explode(".", $_FILES["image"]["name"]);
		$extension = end($temp);     // 获取文件后缀名
		if ((($_FILES["image"]["type"] == "image/gif")
				|| ($_FILES["image"]["type"] == "image/jpeg")
				|| ($_FILES["image"]["type"] == "image/jpg")
				|| ($_FILES["image"]["type"] == "image/pjpeg")
				|| ($_FILES["image"]["type"] == "image/x-png")
				|| ($_FILES["image"]["type"] == "image/png"))
			&& ($_FILES["image"]["size"] < $maxUploadSize)   // 小于 8M
			&& in_array($extension, $allowedExts)
		) {
			if ($_FILES["image"]["error"] > 0) {
				$totalError += 1;
				$imageUploadErr = "错误：: " . $_FILES["image"]["error"] . "<br>";
			} else {
				echo "上传文件名: " . $_FILES["image"]["name"] . "<br>";
				echo "文件类型: " . $_FILES["image"]["type"] . "<br>";
				echo "文件大小: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
				echo "文件临时存储的位置: " . $_FILES["image"]["tmp_name"] . "<br>";
				// 判断当期目录下的 upload 目录是否存在该文件
				// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
				if (file_exists($defaultUploadPath . $_FILES["image"]["name"])) {
					$totalError += 1;
					$imageUploadErr = $_FILES["image"]["name"] . " 文件已经存在。 ";
				} else {
					// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
					move_uploaded_file($_FILES["image"]["tmp_name"], $defaultUploadPath . $_FILES["image"]["name"]);
					$imagePath = $defaultUploadPath . $_FILES["image"]["name"];
					echo "文件存储在: " . $defaultUploadPath . $_FILES["image"]["name"];
				}
			}
		} else {
			// $error=
			// switch
			// header("location:../index.php");
			$totalError += 1;
			$imageUploadErr = "<br>非法的文件格式";
		}
	}
}
?>
<!-- </body> -->
<!-- </html> -->