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
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
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
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/table.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
*{
    margin: 0; padding:0; box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

.site-header {
    
    background-color: #663dff;
background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%); 
}

.logo{
    width: 50%;
    height: 100px;
  
}

.logo h1{
    line-height: 100px;
    padding-left: 50px;
}

.menu{
    width: 50%; height: 100px;
}

.menu ul{
    width: 100%;
    height: 100px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items:  center;
}

.menu ul li{
    list-style: none;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
}

section{ display: flex;  }

.leftside { width: 45%; height: auto; overflow: hidden; margin-top: 0px;}

.leftside img{  width: 600px;  height: 500px; }

.rightside{ width: 55%; height: 300px; color: white; text-align: center; margin-top: 50px; padding: 40px;}

.rightside h1{ text-align: center;
    color: #ffffff;
    font-size: 50px;
    font-weight: 900;
    text-transform: uppercase; } 

.rightside p {  
    font-size: 1.1rem; padding: 30px 0; }

.rightside button{   font-size: 17px;
    font-weight: 600;
    color: white;
    text-transform: uppercase;
    background: linear-gradient(57deg, #00C6A7 , #1E4D92 ); 
    border-radius: 4px 4px 4px 4px;
    padding: 20px 35px ; 
}
.rightside button:hover{
    /*  background: linear-gradient(57deg, #1E4D92, #00C6A7 );   */
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
    <a class="navbar-brand text-white" href="#">TODO APP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
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
<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
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
                                Current Balance
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
                            <div class="cell" data-title="Current Balance">
              <?php echo $rows['Balance'] ?>
                            </div>
        </div>
    </div>
        <br><br><br>
        <label style="color:blueviolet;">Transfer To:</label>
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
            <label style="color:blueviolet;">Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
             <button style="background-color: #663dff;
background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);" type="submit" class="btn mt-3">Transfer</button>
            </div>
        </form>
    </div>

</body>
</html>




