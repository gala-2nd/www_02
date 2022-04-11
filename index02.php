<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>welcome</title>
    <link type="text/css" rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    require "models/define.php";
    //初始化变量
    $name = $email = $gender = $comment = $website = "";
    $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //验证表单
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "姓名是必须的！";
        } else {
            $name = test_input($_POST["name"]);
            //检测名字是否只包含字母和空格
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "只允许字母和空格";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "邮件是必须的！";
        } else {
            $email = test_input($_POST["email"]);
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                $emailErr = "邮箱格式错误！";
            }
        }
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "非法的 URL 的地址";
            }
        }
        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }
        if (empty($_POST["gender"])) {
            $genderErr = "性别是必需的";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }
    echo uniqid();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        名字:<input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">*<?php echo $nameErr; ?></span>
        <!--该行的*没有什么特殊作用，只是一个字符，用来与后面的PHP代码结合显示 -->
        </br></br>
        E-mail:<input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">*<?php echo $emailErr; ?></span>
        </br></br>
        网址:<input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error">*<?php echo $websiteErr; ?></span>
        </br></br>
        备注: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        </br></br>
        性别:<input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") ?>>女
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") ?>>男
        <span class="error">*<?php echo $genderErr; ?></span>
        </br></br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>