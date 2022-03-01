
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style-h.css">
<link rel="stylesheet" type="text/css" href="../css/style-f.css">
<link rel="stylesheet" type="text/css" href="css/style-h.css">
<link rel="stylesheet" type="text/css" href="css/style-f.css">
<title>Basket</title>

</head>

<body>

	<header>
	<div class= "top-menu"> 
 <nav> 
      <ul class="navbar">
      <li><a class="a1" href="index.php">Home</a></li>

<li class="open dropdown-li"><a class="a1">Blog</a>
    <button class="dropbtn"> 
      <i class="fa fa-caret-down"></i>
    </button>
  <ul class="dropdown-menu">
     <li><a href="./products_1.php" class="a1 nav-link">Fruits</a></li>

     <li><a href="./products_2.php" class="a1 nav-link">Dried fruits</a></li>
     <li><a href="./products_3.php" class="a1 nav-link">Vegetables</a></li>
     <li><a href="./products_4.php" class="a1 nav-link">Nuts</a></li>
     <li><a href="./products_5.php" class="a1 nav-link">Waffle</a></li>
     <li><a href="./products_6.php" class="a1 nav-link">Candy</a></li>
     <li><a href="./products_7.php" class="a1 nav-link">Cakes</a></li>

</ul>
 </li>

<li><a class="a1" href="registr.php">Registration</a></li>
<li><a class="a1" href="login.php">Log in</a></li>
<li><a class="a2" href="basket.php"><i class="fa fa-shopping-basket"></i></a></li>
   <li> <a  href=>    

<form action="file.php" method="post">

<select name="lang" id="sel"> 
 <option value="arm">Arm</option> 
 <option value="eng">Eng</option> 
 <option value="ru">Ru</option> 
</select> 
 </form>
</a></li>
 </ul>
  </nav>
</div>
</header>

<main>
<table class="shopping_list">
<tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
</tr>

<?php 

  $total = 0;  

    include "basket/connect.php";
    $sql = "SELECT * FROM `basket` ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){ 

?>
 <tr>
  <td><img src=img/<?php echo $row['image_url'];?>> </td>
  <td><?php echo $row['name'];?>  </td>
  <td>$ <?php echo $row["price"];?></td>
  <td>
<button class="minus" type="button" style="width:17%;">
<i class="fa fa-minus"></i></button>
<input class="quantity" type="text" value='<?php echo $row["quantity"]; ?>' style="width:17%;"/>
<button class="plus" type="button" style="width:17%;"><i class="fa fa-plus"></i></button>
</td>
  
 <td><span class="count_price" data-price="<?php echo $row["price"]; ?>">$ <?php echo $row["price"]; ?>  </span></td>

  <td> <form method="POST" action='basket/delete.php ?id=<?php echo $row["id"] ?> '>
       <input type="submit" name="delete" value="Remove">
  </form></td>
<?php

$total = $total +  ($row["quantity"] * $row["price"]);
?>
</tr>
<?php
}
  }

 ?>
 <tr>
<td colspan="4" align="right">Total</td>
<td class="n"> $ <?php echo number_format($total,2); ?></td>
<td></td>
</tr>
</table>


<div class="Pay for the order">
<a class="a1" href="login.php"><input type="submit" name="add_to_online-shopping"class="btn btn-success" value="Pay for the order" style="margin: 4% 0% 3% 44%;"/></a>
</div> 

	
<script type="text/javascript" src="js/jquery-3.3.1.js"></script> 
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script-1.js"></script>
<script type="text/javascript" src="js/script-3.js"></script>

</main>
</body>
<footer class="site-footer">
        
  <div class="col-1">
  <ul class="footer-links">
  <li><a class="a1" href="login.php">Log in</a></li>
  <li><a class="a1" href="profile.php">My account</a></li>  
  <li><a class="a1" href="contact.php">Contact us</a></li>
   </ul>
   </div>

<div class="col-2">
  <ul class="social-icons">
  <li><a class="a1" href=""><h6>SOCIALS</h6></a></li>
  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
  <li><a class="a1" href=""><p>© 2022 All Rights Reserved.</p></a></li> </ul>
</div>
</div>

  </footer>
</html>