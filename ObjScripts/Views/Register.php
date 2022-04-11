<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Rigister</title>
    <link type="text/css" rel="stylesheet" href="../../css/index.css">
</head>

<body>
    <?php
    require("../Controllers/Validations/Validations.php");
    require("../Models/Upload/UploadConf.php");
    require("../Controllers/Validations/FormValidator.php");
    require("../Controllers/Validations/InfosValidator.php");
    // require("../Contro")
    require("../Controllers/Validations/FileUploadValidator.php");
    require("../Controllers/Validations/ImageUploadValidator.php");
    require("../Models/Infos.php");
    require("../Models/Errors.php");
    require("../Models/FormInfosErrors.php");
    require("../Models/FileUploadErrors.php");
    // require(../Models/)
    require("../Models/FormInfos.php");

    require("../Controllers/Rigister.php");

    // require("ObjScripts/Models/Upload/FileUploader.php");
    // require("ObjScripts/Controllers/Validations/Validations.php");
    // require("ObjScripts/Controllers/Validations/FormValidator.php");
    // require("ObjScripts/Controllers/Validations/InfosValidator.php");
    // require("ObjScripts/Controllers/Validations/FileUploadValidator.php");
    // require("ObjScripts/Controllers/Validations/ImageUploadValidator.php");

    // require("ObjScripts/Models/Upload/UploadConf.php");
    // require("ObjScripts/Models/Infos.php");
    // require("ObjScripts/Models/Errors.php");
    // require("ObjScripts/Models/FormInfosErrors.php");
    // require("ObjScripts/Models/FileUploadErrors.php");
    // require("ObjScripts/Models/FormInfos.php");

    // require("ObjScripts/Controllers/Rigister.php");
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <!-- <formInfos action="../Controllers/Validations/Register.php" method="post" enctype="multipart/formInfos-data"> -->
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
        <!-- </formInfos> -->
        <!-- <formInfos action=<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);
                                ?> method="post" enctype="multipart/formInfos-data"> -->
        <!-- <formInfos action="../Controllers/Validations/Image.php" method="post" enctype="multipart/formInfos-data"> -->
        <label for="image">头像：</label>
        <image src="<?php echo $imagePath; ?>" />
        <input type="file" name="image" id="file"><br>
        <span class="error">*<?php echo $imageUploadErr; ?></span>
        </br></br>
        <input type="submit" name="submit" value="submit" >
        </br></br>
    </form>
    <a href="Scripts/FileUploadDemo/form.html">upload demo</a>
</body>

</html>