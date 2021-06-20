<!DOCTYPE html>
<html>
    <head>
     <title> transaction </title>
    </head>
    <body>
        <form action ="" method = "POST">
         <table align = "center" style = "width:500px; line-height:30px; ">
         <caption> <h1>Transation Form</h1></caption><br><br><br>
         <tr>
             <td> Enter customer Name: </td>
             <td><input type = "text " name= "namesender" required></td>
        </tr>
         <tr>
             <td> Enter customer Id: </td>
             <td><input type = "text " name = "idsender" required ></td>
        </tr>
         <tr>
             <td> Enter other customer name : </td>
              <td><input type = "text "name ="namereceiver" required ></td>
        </tr>
         <tr>
             <td> Enter other customer Id :</td> 
            <td><input type = "text " name="idreceiver" required ></td>
        </tr>
         <tr>
             <td> Enter amount : </td>
             <td><input type = "number "name = "amount" required ></td>
        </tr>
         <tr>
             <td> <input type = "submit" name ="submit" >
             
         </table>
</form>

            <?php 
      if(isset($_POST['submit']))
      {
        $sendername = $_POST['namesender'];
        $idsender = $_POST['idsender'];
        $receivername = $_POST['namereceiver'];
        $idreceiver = $_POST['idreceiver'];
        $amount = $_POST['amount'];
        if(!empty( $sendername)||!empty($idsender)||!empty( $receivename)||!empty($idsender)||!empty($amount))
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($servername,$username,$password ,"bank transaction");
            if($conn-> connect_error)
            {
                die("connection failed :" .mysqli_connect_error());
            }
           else if($idsender == $idreceiver )
            {
                ?>
                <script>
                    alert("Enter correct customer detail!");
                </script>
                 <?php
            }
            else
            {
                $selectreceiver = " select CustomerId,CustomerName,balance from customersdetail where CustomerId = '$idreceiver' and CustomerName = '$receivername' ";
                $resultreceiver =  mysqli_query($conn,$selectreceiver);
                $num = mysqli_num_rows($resultreceiver);
                
                $selectsender = " select CustomerId,CustomerName,balance from customersdetail where CustomerId = '$idsender' and CustomerName = '$sendername' ";
                $resultsender =  mysqli_query($conn,$selectsender);
                $nums = mysqli_num_rows($resultsender);
                  
                $senderdata = mysqli_fetch_assoc($resultsender);
                $receiverdata = mysqli_fetch_assoc($resultreceiver);
                   
                
                  if($num == 1 && $nums == 1)
                  {
                    if($senderdata['balance'] < $amount)
                    {
                        ?>
                        <script>
                            alert("OOPs insufficient balance!");
                        </script>
                         <?php
                    }
                    else
                    {
                        $receiveramount = $receiverdata['balance']+$amount;
                        $senderamount = $senderdata['balance']-$amount;
                        $updatereceiver = "update customersdetail set balance = $receiveramount where CustomerId = $idreceiver";
                        $resultreceiver =  mysqli_query($conn,$updatereceiver);
                        $updatesender = "update customersdetail set balance = $senderamount where CustomerId = $idsender";
                        $resultsender =  mysqli_query($conn,$updatesender);
                        $query = "INSERT INTO transactiondetail 
                        VALUES ('$idsender',' $idreceiver','$sendername','$receivername',' $amount')";
                        $result = mysqli_query($conn,$query);
                    ?>
                    <script>
                        alert("Transaction successfully done!");
                    </script>
                        <?php
                    }
                 }
                 else
                {
                   ?>
                   <script>
                       alert("customer does not exist");
                   </script>
                    <?php
                  
               }
            
            }
        }
        else
        {
            echo "All field are required";
            die(); 
        }
           
    }
?>       
           
    </body>
</html>