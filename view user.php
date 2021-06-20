<!DOCTYPE html>
<html> 
    <head>
     <title>customers detail </title>
    </head>
    <body>
    <table align = "center" border = "1px" style = "width:800px; line-height:30px; ">
            <caption><h2>Customer Details</h2></caption>
           
            <tr>
                <th >Customer Id</th>
                <th >Customer Name</th>
                <th >Email</th>
                <th >Balance</th>
                <th >Transfer Money</th>
            </tr>
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($servername,$username,$password ,"bank transaction");
            if($conn-> connect_error)
            {
                die("connection failed :" .mysqli_connect_error());
            }
            $selectquery = " select * from customersdetail";
            $result =  mysqli_query($conn,$selectquery);
            if($result ->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
               ?>
                   <td><?php echo $row ['CustomerId']; ?></td>
                   <td><?php echo $row ['CustomerName']; ?></td>
                   <td><?php echo $row ['Email']; ?></td>
                   <td><?php echo $row ['balance']; ?></td>
                   <td><a href = 'http://localhost/transaction/next.php'><button style background color: none >Transfer </button></a></td> 
                   </tr>
                   <?php
                }
            }
            ?>
       </table>
    </body>
</html>