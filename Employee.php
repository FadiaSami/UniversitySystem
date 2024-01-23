<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "tickitingsystem";
    
        $conn= mysqli_connect($servername,$username,$password,$db_name) or die ("Connection failed");
     
        echo "Welcome". " " .$_SESSION['Name'];
 
        $sql = "Select * from tickets";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows ($result) > 0)
        {
            echo "<table border = 'solid' ";
           
                while($row = mysqli_fetch_assoc($result)){
                    if ($row["EmpID"] == $_SESSION["ID"] ){
                    echo "<tr>";
                        foreach ($row as $key => $value){
                            echo "<td>";
                            echo $value;
                            echo "</td>";
                        }
                    echo "</tr>";
                }
            }
            
        echo "</table>";

        }
        else
        echo "No result";
    ?>
   </body>
</html>