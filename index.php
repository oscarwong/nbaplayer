<script>
function validateForm()
{
var x=document.forms["nameform"]["name"].value;
if (x==null || x=="")
  {
  alert("Please type a valid basketball player name.");
  return false;
  }
}
</script>

<html>
<head>
	<title>NBA Player Lookup</title>
	<meta name="description" content="A site to lookup any basketball player's stats">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<meta name="author" content="oscarw94">
</head>
<body>
	<a href="index.php"><p><img class="logo" src="img/nbalogo.png" alt="logo"></p></a>
	
	<div class="content">
		<form name="nameform" method="post" action="process.php" onsubmit="return validateForm()">
			FIND A PLAYER: <input name="name" type="text">
			<input type="submit" name="Submit" value="Go!">
		</form>
	</div>
</body>
</html>