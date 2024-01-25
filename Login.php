<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testPHP</title>
</head>
<body>
    <?php
    session_start();
    
    $username = $password = "";
    $password_err=$username_err= $error_login = "";

   $serverName = "mytestsitefadia-server.mysql.database.azure.com";
$databaseName = "mytestsitefadia-database";
$username = "ifdtuzzxgb";
$password = "MFM@#12345";

try {
   $con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($conn, "mytestsitefadia-server.mysql.database.azure.com", "ifdtuzzxgb", "{MFM@#12345}", "{mytestsitefadia-database}", 3306, MYSQLI_CLIENT_SSL);
    echo "Connected successfully";

    // Perform database operations here
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
	
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty($_POST["username"])){
            $username_err = "Please enter username.";
        } else{
            $username = $_POST["username"];
        }
        
        // Check if password is empty
        if(empty($_POST["password"])){
            $password_err = "Please enter your password.";
        } else{
            $password = $_POST["password"];
        }

        if(empty($username_err) && empty($password_err)){
            $sql = "Select * from employee";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows ($result) > 0){
                
                while($row = mysqli_fetch_assoc($result)){
                    if ($row["ID"] == $username && $row ["password"] == $password)
                    {
                        $_SESSION["Name"] = $row['name'];
                        $_SESSION["ID"] = $row ['ID'];
                        header("location: Employee.php");
                        break;
                    }
                    else
                    $error_login = "Error username or passowrd";
                }
            }
        }
    }
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
