<?php

$server="Localhost";
$user="venkyasdf";
$pw="jaihinda1";
$dbname="songcomment";
$conn=new mysqli($server,$user,$pw,$dbname);

$name=$comment=$submit="";
$nameErr="";

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
		if (empty($_POST["name"])) {
	     $nameErr = "Name is required";
	   } else {
	     $name = test_input($_POST["name"]);
	     // check if name only contains letters and whitespace
	     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	       $nameErr = "Only letters and white space allowed"; 
	     }
	   }
		//check commment
		if (empty($_POST["comment"])) {
	     $comment = "";
	   } else {
	     $comment = test_input($_POST["comment"]);
	   }
	
		//check submit
		$submit=$_POST['submit'];

		if($submit)
		{
		$query="INSERT INTO commenttable (name,comment) VALUES ('$name','$comment') ";
		$conn->query($query);
		}

		header("location: comment.php");
		exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, minimal-ui, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--css--><title>Comments</title>
<link href="files/css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="files/fonts.css"> 
<link rel="stylesheet" href="files/first.css">
<link rel="shortcut icon" href="pics/i2.png" /> 
<style type="text/css">
	img.connect{height: 60px;width: 60px;}
	span#heading{font-size: 30px;color: #919191;}
	span#head{font-size: 39px;color: #00C3A9;}
	span#head2{font-size: 35px;color: #00C3A9;}
	span#comm{font-size: 20px;}
	center#form{padding-bottom: 20px;position: relative;top:100px; }
	#ip{background-color: #282828;border:none;border-radius: 2px;padding: 6px;}
	td{padding:5px;}
	#button{background-color: #00C3A9;border:none;border-radius: 2px;padding: 4px;}
	div#comments{overflow-y; overflow-x:hidden; height:300px;position: relative;top: 90px;display: inline-block;}
	img#commenticon{height:27px;width: 27px;float: left;}
	div#commn{background-color: #222222;margin: 4px;padding: 5px;display: block;width: 420px;border-radius: 3px;}
	span#name{color: #00C3A9;font-size: 20px;}
	span#comment{color: }
	img.connect{height: 60px;width: 60px;}
	span#heading{font-size: 30px;color: #919191;text-align: center;}
	span#head{font-size: 39px;color: #00C3A9;text-align: center;}
	a#op1,a#op2{color: #91918C;display: inline-block;  float: right;padding: 10px;margin-top: 20px;margin-bottom: 5px;font-family: verdana;line-height: 0.5px;font-size: 16px;font-weight: 570; transition: color 0.5s;letter-spacing: -1px;}
	a#op2{margin-right: 50px;}
	img#tri{height: 50px;width: 50px;float: left;margin-left: 20px;margin-top: 5px;}
	header{border-bottom: 1px solid #00C3A9;}
	div#banner{text-align: center;}
	a#op1:hover,a#op2:hover{color: #FFFFF0;}
	a#op3{color: #91918C;display: inline-block;  float: left;padding: 10px;margin-top: 20px;margin-bottom: 5px;font-family: verdana;line-height: 0.5px;font-size: 16px;font-weight: 570; transition: color 0.5s;letter-spacing: -1px;margin-left: 10px;}

div#commlogo{position: relative;top: 100px;display: inline-block;}
footer{position: relative;bottom: 1px;}
body{
    opacity : 0;
    transition : opacity 0.9s ease; 
}

.loaded {
   opacity : 1;
}


div#sec{height: 900px;}
</style>
</head> 

<body onload="document.body.classList.add('loaded')" class="non-touch  bg-black ">




<header> 
<div> 
<a href="index.html"> <img id="tri" src="files/logo2.jpg" alt=""></a>
<a id="op3" href="note/note.html"> Note </a>
<span> 
<a id="op2" href="comment.php"> Comment </a>
<a id="op1" href="index.html"> Home </a> 
</span>
</div> 

<div id="banner">
<span id="head">C</span><span id="heading">omment</span><span id="head2">S</span>

</div>
</header>    



<div id="sec">		
			<center id="form">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table>
			<tr><td>Name :<br><input type="text" id="ip"name="name" required autocomplete="off"/></td></tr>
			<tr><td colspan="2">Comment :</td></tr>
			<tr><td colspan="5"><textarea name="comment" id="ip" rows="10" cols="50" required autocomplete="off"></textarea></td></tr>
			<tr><td colspan="2"><input type="submit" id="button"name="submit" value="Comment"></td></tr>
			</table>
			</form>
			</center>
 
			
		
			<div id="commlogo" style="display:none" >
					<img id="commenticon" src="pics/comment.jpg">
					<?php 
					$server="Localhost";
					$user="venkyasdf";
					$pw="jaihinda1";
					$dbname="songcomment";
					$conn=new mysqli($server,$user,$pw,$dbname);
					$query="SELECT name,comment FROM commenttable ORDER BY id DESC";
					$result=$conn->query($query);
					$rowcount=mysqli_num_rows($result);

					echo "<h3 style='float:left;margin-left:10px;'>$rowcount</h3>";

					?>
					<h3 style="float:left;margin-left:10px;">Comments</h3>
			</div>

			<center>
					<div id="comments">

					<?php

					$server="Localhost";
					$user="venkyasdf";
					$pw="jaihinda1";
					$dbname="songcomment";

					$conn=new mysqli($server,$user,$pw,$dbname);


					$query="SELECT name,comment FROM commenttable ORDER BY id DESC";

						$result=$conn->query($query);

					if($result->num_rows>0)
					{
						while ($row=$result->fetch_assoc()) {

							echo "<div id='commn'>"."<span id='name'>".$row["name"]."</span>"."<br>"."<span id='comment'>".$row["comment"]."</span>"."</div>";
						}
					}


					$conn->close();

					 

					?>

					</div>
			</center>


 
		<section> 
		<div class="row">

		</div>
		</section> 


</div>  








<footer> 

 
 
<ul class="text-center"> 
<li>Venky Mudaliar</li> 
<li><a id="plink" href="https://www.facebook.com/venky.mudaliar" target="_blank"><img class="connect" src="files/fb3.png">
</a>
</li> 
<li><a id="plink" href="https://twitter.com/venkymudaliar" target="_blank"><img class="connect" src="files/t1.png">
</a>
</li> 
</ul> 

  </footer> 






<script type="text/javascript" src="files/one.js"></script> 

<script type="text/javascript" src="files/two.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59800761-1', 'auto');
  ga('send', 'pageview');

</script>




</body></html>