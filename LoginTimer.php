<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <style>
 	p
 	{
 		text-align: center;
 		font-size: 30px;
 		margin-top: 0px;
 		font-color: lavenderblush;
 		font-style: italic
 		
 	}
</style>
 <body>
 	<p id="Timer"></p>
 	<script>
 		var month =new Date().getMonth()+1;
 		var hour=new Date().getHours();
 		var day=new Date().getDate();
 		var year=new Date().getFullYear();
 		var minutes=new Date().getMinutes();
 		var second=new Date().getSeconds()+20;
 		var time=hour + ":" + minutes + ":" + second;
 		var ResetTime=new Date(month + " " + day + " " + year + " " + time).getTime();
 		var x= setInterval(function()
 		{
 			var now=new Date().getTime();
 			var distance= ResetTime - now;
 			var minutes= Math.floor((distance % (1000 * 60 * 60))/ (1000 * 600));
 			var seconds= Math.floor(( distance % (1000 * 60))/ 1000);
 			document.getElementById("Timer").innerHTML = "<h1>Please try again </h1>" + seconds + "s";
 		if (distance<=0)
 		{
 			clearInterval(x);
 			document.getElementById("Timer").innerHTML="";
 			location="index.php";
 		}
 		},1000); 
 	</script>
 
 </body>
 </html>