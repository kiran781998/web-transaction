<!DOCTYPE html>
<html> 
    <head>
     <title> transation history </title>
    </head>
    <body>
    <table align = "center" border = "1px" style = "width:800px; line-height:30px; ">
            <caption><h2>transation Details</h2></caption>
           
            <tr>
                <th >Sender ID</th>
                <th >Sender Name</th>
                <th >Receiver ID</th>
                <th >Rceiver Name</th>
                <th >Transfer Amount</th>
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
            $selectquery = " select * from transactiondetail";
            $result = $conn-> query($selectquery);
            $num = mysqli_num_rows($result);
            echo $num;
            if($result ->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
               ?>
                   <td><?php echo $row ['senderCustomerId']; ?></td>
                   <td><?php echo $row ['senderCustomerName']; ?></td>
                   <td><?php echo $row ['receiverCustomerId']; ?></td>
                   <td><?php echo $row ['receiverCustomerName']; ?></td>
                   <td><?php echo $row ['Amount']; ?></td>
                   </tr>
                   <?php
                }
            }
            ?>
       </table>
    </body>
</html>