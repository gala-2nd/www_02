<html>

<head>登录</head>
<?php
    // require()


?>
<form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!--onSubmit="return InputCheck(this)"> -->
    <p>
        <label for="email" class="label">Email:</label>
        <input id="email" name="email" type="text" class="input" />
    </p>
    <p>
        <label for="password" class="label">密码:</label>
        <input id="password" name="password" type="password" class="input" />
    </p>
    <p>
        <input type="submit" name="submit" value="submit" class="left" />
    </p>
</form>

</html>