
<!DOCTYPE html>
<html lang="en">
<head>
 <title>THE SPARKS BANK-BY ISHA ROSHAN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/table.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
.bg{
    background-image: url('img/bg.png');
    background-size: contain;
}
.site-header {
   background-color: #663dff;
   background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);
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
 float:right;
 margin-right: 70px;
 padding: 10px 45px;
 text-align: center;
 font-size: 14px;
 border: none;
 background-color: #663dff;
 background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);
 border-radius: 10px;
 letter-spacing: 1.5px;
 font-size: 15px;
 transition: 1s;

}
button:hover,h2:hover{
    transform: scale(1.1);

 
}
a{
    color:white;

}
a:hover{
    color:white;
    text-decoration: none;
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
        <h1 class="text-center pt-4" style="color:grey;font-family: cursive;font-weight:lighter;">Transaction</h1>
        <br>
        <button><a href="customers.php"> View Updated Balance</a></button>
            <div class="limiter">
           <div class="container-table100">
            <div class="wrap-table100">
                    <div class="table">

                        <div class="row header">
                            <div class="cell">Srno</div>
                            <div class="cell">Sender </div>
                            <div class="cell">Receiver</div>
                            <div class="cell">Amount(&#8377)</div>
                             <div class="cell">Date & Time</div>
                        </div>
             <?php
            include 'config.php';

            $sql ="SELECT * from transactions";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

                            <div class="row">
                            <div class="cell" data-title="Srno">
                            <?php echo $rows['SRNO'] ?>
                            </div>
                            <div class="cell" data-title="Sender">
              <?php echo $rows['Sender'] ?>
                            </div>
                            <div class="cell" data-title="Receiver">
              <?php echo $rows['Receiver'] ?>
                            </div>
                            <div class="cell" data-title="Amount(&#8377)">
              <?php echo $rows['Balance'] ?>
                            </div>
                             <div class="cell" data-title="Date & Time">
              <?php echo $rows['Datetime'] ?>
                            </div>
                        </div>
                            <?php
                            }
                        ?>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
