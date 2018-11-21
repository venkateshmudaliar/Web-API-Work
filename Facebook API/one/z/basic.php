<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>

<head>
	<title>
		
	</title>
</head>

<script type="text/javascript" src="fbapi.js"></script>
<style type="text/css">
	#content{
		height: 400px;
		width: 97%;
		border:1px solid black;
		margin: auto;
	}
	#form
	{
		height: 100px;
		width: 97%;
		border:3px solid black;
		margin: auto;
		margin-bottom: 10px;
	}
	#icon
	{
		height: 200px;
		width: 200px;
		margin: 5px;
		
	}
	#add_icon
	{
		height: 50px;
		width: 50px;
	}
	#individual
	{
		border:1px solid black;
		display: inline-block;
		margin: 5px;
	}
	#add
	{
		display: block;
		margin: auto;
	}
	#post_update
	{
		display: block;
		margin: 10px;
		border:1px solid black;
	}
	
	#ip{border-radius: 2px;padding: 6px;display: block;}
	#fbshare{
		display: inline-block;
		height: 60px;
		width: 120px;
		margin: 15px;
	}
	#form_div
	{
		background-color: grey;
		display: inline-block;
		margin: 5px;
	}
	

</style>
<script type="text/javascript">
function add_post(){
	var NAME=document.getElementById("name").innerHTML;
	document.getElementById("ip").innerHTML=NAME;
}
</script>
<body>


<?php






?>


<div id="form">

	<div id="form_div">
		<form id="formip">
  			<textarea name="comment" id="ip" rows="5" cols="50" required autocomplete="off"></textarea>
		</form>
	</div>	

	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<button id="shareBtn">custom share</button>
<hr>
SHARE FEED
<button id="share_feed">share feed</button>

<hr>
SEND MSG<br>
<button id="send_msg">send msg</button>

</div>


<div id="content">

<div id="individual">

<img id="icon" src="starboy.jpg">
<h4 id="name" style="text-align:center;">StarBoy-The Weeknd</h4>
<button id="add" onclick="add_post()"><img src="add_button.jpg" id="add_icon"></button>

</div>	



</div>

	
</body>

</html>