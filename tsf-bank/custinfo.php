<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['ID'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where ID='$from'";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where ID='$to'";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Whoopsss! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customers SET  Balance= (Balance-$amount) WHERE ID='$from'";
                mysqli_query($conn,$sql);
                
             

                // adding amount to reciever's account
               
                $sql = "UPDATE customers SET Balance= (Balance+$amount) WHERE ID='$to'";
                mysqli_query($conn,$sql);

                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transactions(`Sender`, `Receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful!!!');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>THE SPARKS BANK-BY ISHA ROSHAN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/table.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
.site-header {
    
    background-color: #663dff;
background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%); 
}
.bg{
    background-image: url('img/bg.png');
    background-size: contain ;
}
.logo{
    width: 90px;
    height:40px;
  
}
.navbar-brand{
  font-family: cursive;
  font-size: 25px;
  padding-left: 0px;

}

button{
        transition: 1.5s;
        color: white;
}
button:hover{
        background-color:#616C6F;
        color: white;
 }
</style>
</head>
<body>

<header class="site-header clearfix">
 <nav class="navbar navbar-expand-lg navbar sticky-top">
  <div class="container">
   <a class="navbar-brand text-white" href="#"><img class="logo" src="img/logo-bg.png">&nbsp;The Sparks Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="customers.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="transaction.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Transactions</a>
        </li>

       </ul>
  </div>
  </div>
</nav>
</header>
<div class="bg">
<div class="container">
    <h2 class="text-center pt-4" style="color:grey;font-family: cursive;font-weight:lighter;">Transfer Money</h2>
            <?php
              include 'config.php';
              $ID=$_GET['ID'];
              $sql = "SELECT * FROM  customers where ID='$ID'";
              $result=mysqli_query($conn,$sql);

                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <div class="limiter">
           <div class="container-table100">
            <div class="wrap-table100">
                    <div class="table">

                        <div class="row header">
                            <div class="cell">
                                ID
                            </div>
                            <div class="cell">
                                Name
                            </div>
                            <div class="cell">
                                E-mail
                            </div>
                            <div class="cell">
                                Current Balance(&#8377)
                            </div>
                        </div>
                            <div class="row">
                            <div class="cell" data-title="ID">
                            <?php echo $rows['ID'] ?>
                            </div>
                            <div class="cell" data-title="Name">
              <?php echo $rows['Name'] ?>
                            </div>
                            <div class="cell" data-title="E-mail">
              <?php echo $rows['Email'] ?>
                            </div>
                            <div class="cell" data-title="Current Balance(&#8377)">
              <?php echo $rows['Balance'] ?>
                            </div>
        </div>
    </div>
        <br><br>
        <label style="color:grey;font-size: 20px;font-weight: bolder;">Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Select</option>
            <?php
              include 'config.php';
                $ID=$_GET['ID'];
                $sql = "SELECT * FROM customers where ID!='$ID'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color:grey;font-size: 20px; font-weight: bolder;">Amount(&#8377):</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                                <button style="background-color: #663dff;
background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);" class="btn mt-2" name="submit" type="submit" id="myBtn">Transfer</button>
            
            </div>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>




