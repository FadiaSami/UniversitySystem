<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php
    echo "PHP";
    ?>
    
    <form action="Login.php" method = "post">
        <label for=""> Username</label>
        <input type="text" name="username" id="">
        <span style= "color: red"><?php echo $username_err; ?></span>
        <br>
        <br><br>
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <br>
	<span style= "color: red"><?php echo $password_err; ?></span>
        <br>
        <span style= "color: red"><?php echo $error_login; ?></span>
        <br>
        
        
        <button type="submit">Login</button>
    

    </form>
</body>
</html>
