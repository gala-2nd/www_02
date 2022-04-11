<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>welcome</title>
    <link type="text/css" rel="stylesheet" href="../../css/index.css">
</head>

<body>
    <?php
    // include("fileupload/FileUpload.php");
    require("../Controllers/Validations/Register.php");
    // include("classtest.php")
    // include("../Controllers/Validations/Image.php");
    // require("../Controllers/Convert/Encrypt.php"); //这个地方要非常注意！！，因为本文件Rigister.php已经在Scripts/Views/Register引用了，因此在此文件Register.php使用相对路径时就相当于在Scripts/Views/Register中使用相对路径！！而且还需要在最前面加./
    // require("Validations.php");
    // require("Image.php");
    //初始化变量
    // $name = $email = $password_01 = $password_02 = $gender = $comment = $website = '';
    // $nameErr = $emailErr = $password_01Err = $password_02Err = $passwordErr = $genderErr = $commentErr = $websiteErr = '';

    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <!-- <form action="../Controllers/Validations/Register.php" method="post" enctype="multipart/form-data"> -->
        名字:<input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">*<?php echo $nameErr; ?></span>
        <!--该行的*没有什么特殊作用，只是一个字符，用来与后面的PHP代码结合显示 -->
        </br></br>
        E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">*<?php echo $emailErr; ?></span>
        </br></br>
        密码:<input type="password" name="password_01" value="<?php echo $password_01; ?>">
        <span class="error">*<?php echo $password_01Err; ?></span>
        <!--该行的*没有什么特殊作用，只是一个字符，用来与后面的PHP代码结合显示 -->
        </br></br>
        再次输入密码:<input type="password" name="password_02" value="<?php echo $password_02; ?>">
        <span class="error">*<?php echo $password_02Err; ?></span>
        <!--该行的*没有什么特殊作用，只是一个字符，用来与后面的PHP代码结合显示 -->
        </br></br>
        <!-- 网址:<input type="text" name="website" value="<?php //echo $website;
                                                            ?>">
            <span class="error">*<?php //echo $websiteErr;
                                    ?></span>
            </br></br> -->
        <!-- 备注: <textarea name="comment" rows="5" cols="40"><?php //echo $comment;
                                                                ?></textarea>
            </br></br> -->
        性别:<input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo 'checked' ?> value='female'>女
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo 'checked' ?> value='male'>男
        <span class="error">*<?php echo $genderErr; ?></span>
        </br></br>
        <!-- <input type="submit" name="submit" value="Submit"> -->
        <!-- </form> -->
        <!-- <form action=<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);
                            ?> method="post" enctype="multipart/form-data"> -->
        <!-- <form action="../Controllers/Validations/Image.php" method="post" enctype="multipart/form-data"> -->
        <label for="image">头像：</label>
        <image src="<?php echo $imagePath; ?>" />
        <input type="file" name="image" id="file"><br>
        <span class="error">*<?php echo $imageUploadErr; ?></span>
        </br></br>
        <input type="submit" name="soumettre" value="submit">
        </br></br>
    </form>
    <a href="Scripts/FileUploadDemo/form.html">upload demo</a>
</body>

</html>