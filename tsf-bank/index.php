
<!DOCTYPE html>
<html lang="en">
<head>
 <title>THE SPARKS BANK-BY ISHA ROSHAN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
*{
    margin: 0; padding:0; box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

.site-header {
    width: 100%;
    height: 100vh;
    background: #0f8a9d;
    background-color: #f907fc;
    background-color: #663dff;
    background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);
    clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 0% 100%);

}


.logo{
width: 90px;
height:50px;
 
  }

.navbar-brand{
  font-family: cursive;
  font-size: 25px;
  padding-left: 0px;

}

section{
 display: flex;  
}

.leftside {
 width: 45%; height: auto; overflow: hidden; margin-top: 0px;
}

.leftside img{  width: 600px;  height: 450px; 
transition:1s;}

.leftside img:hover{transform: scale(1.1);}

.rightside{
 width: 55%; height: 300px; color: white; text-align: center; margin-top: 50px; padding: 40px;
}

.rightside h1{ 
    text-align: center;
    color: #ffffff;
    font-size: 50px;
    font-weight: 900;
    text-transform: uppercase; 
    transition: 1s;
  } 
.rightside h1:hover{transform: scale(1.1);}
.rightside button{   
   font-size: 17px;
   font-weight: bolder;
   border: none;
   border-radius: 30px;
   letter-spacing: 1.5px;
    color: blueviolet;
    text-transform: uppercase;
    background-color: #f876de;
    background-image: linear-gradient(315deg, #f876de 0%, #b9d1eb 74%);
    padding: 10px 30px ;
    transition: 1s;
 
}

.rightside button:hover{
       
       transform: scale(1.1);
}
.link{
    color: blueviolet;
    text-transform: uppercase;
    background-color: #f876de;
    background-image: linear-gradient(315deg, #f876de 0%, #b9d1eb 74%);
   

}
.link:hover{
    color: blueviolet;
    text-decoration: none;
}
   
</style>
</head>
<body>

<header class="site-header clearfix">
 <nav class="navbar navbar-expand-lg navbar sticky-top">
 <!-- Brand -->
 <div class="container">
  <a class="navbar-brand text-white"><img class="logo" src="img/logo-bg.png">THE SPARKS BANK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <!--Nav Links-->
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
<br>
 <section>
  <div class="leftside"> 
   <img src="img/mainbg.png">
  </div>
  <div class="rightside"> 
    <h1>Welcome to <br>The Sparks Bank!!</h1>
   <h5><i>~Your first choice for monetary needs.</i></h5>
   <button type="button" class="btn mt-3"><a class="link" href="customers.php">View Customers</a></button>
  </div>
  
 </section>

</header>
<footer class="text-center mt-5 py-2" style="background-color: lightgray;">
<p>2021 © Made by Isha Roshan<br>Web Development and Designing Intern at The Sparks Foundation</p>
      </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>





