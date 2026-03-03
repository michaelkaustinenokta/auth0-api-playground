<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<style>
</style>
<script>
	<?php
		foreach($_POST as $p=>$v) {
			echo 'document.cookie="'.urlencode($p).'=";';
			echo 'document.cookie="'.urlencode($p).'='.urlencode($v).'";';
		}
	?>
	
	console.log(document.cookie)

	document.location="/auth0?implicit=true"

</script>
<body>
</body>
</html>




