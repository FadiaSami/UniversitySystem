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
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "tickitingsystem";

    $conn= mysqli_connect($servername,$username,$password,$db_name) or die ("Connection failed");
    if(isset($_POST['TicketID']) && isset($_POST['EMPID'])) {

        $sql = "update tickets set EmpID = '$_POST[EMPID]' where TID = '$_POST[TicketID]' ";



        if (mysqli_query($conn,$sql))
        {
            
            echo "<script>";
                echo "alert ('Ticket assigned successfully')";
            echo "</script>";
           
        }
        else
        echo "ERROR ". $sql . "<br>". mysqli_error($conn);
        
    }
    
    $sql = "Select * from tickets where EmpID is null ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows ($result) > 0){
        echo "<table border = 'solid'>";
        
        while($row = mysqli_fetch_assoc($result)){
        //var_dump($row);
            echo "<tr>";
            foreach($row as $key => $value){
                echo "<td>";
                echo $row[$key];
                echo "</td>";
                //. " ". $row ["CustomerName"]. " ". $row ["TicketDesc"]. "<br>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    echo "No tickets";

    echo "<p> To assign a ticket, please enter the required information:</p>";
    
    echo "<form action = Manager.php method = 'post'>";
    echo "<label for=> Ticket ID</label>";
    echo "<input type='text' name='TicketID' id=''>";
    echo "<label> Employee ID</label>";
    $sql = "Select ID from employee";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows ($result) > 0){
        echo "<select name='EMPID' id='program'>";

        while($row = mysqli_fetch_assoc($result)){
          
            foreach($row as $key => $value){
                echo "<option value=$value>$row[$key]</option>";
            }
        }
        echo " </select>";
    }
    else
        echo "No";
    echo "<br>";
    echo "<button type='submit' >Submit</button>";
    echo "</form>";

   
    
    ?>
    
</body>
</html>