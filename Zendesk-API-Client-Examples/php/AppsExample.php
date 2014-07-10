<?php
include("vendor/autoload.php");

use Zendesk\API\Client as ZendeskAPI;

$subdomain = "";
$username = "";
$token = ""; // replace this with your token

$client = new ZendeskAPI($subdomain, $username);
$client->setAuth('token', $token); // set either token or password

$apps = array();
$value = $_REQUEST['formBox'];

if ($value == "uploadApp") {
	$apps['file'] = $_FILES['file']['tmp_name'];
	$app = $client->apps()->upload($apps);
	echo "<pre>";
	print_r($app);
	echo "</pre>";
}


?>

<html>
<h4>Apps</h4>
<form action="AppsExample.php" method="POST" enctype="multipart/form-data">
	<select name="formBox">
		<option value="uploadApp">Upload App</option>
	</select>
	<input type="file" name="fileUpload"/>
	<button type="submit">Submit</button>
</form>


</html>