
<?php
include "twitteroauth.php";
// Create an TwitterOAuth instance.
$CONSUMER_KEY = "im5Aiz5zqsa99eN6GXPFhg";
$CONSUMER_SECRET = "MOPAHA3fpFqLpFxMc2K7hIr9pWMaihyo3RSct5N1I";
$ACCESS_TOKEN = "333910829-OfVKP3PWz8gYzPKXJNKxM4DmYnzlzV6DW8Yoytqe";
$ACCESS_SECRET = "GWWSzAV79wUTN6waDOD1MbghpRqhRmaeRTQYuwEFhsu3a";
$connection = new TwitterOAuth($CONSUMER_KEY,$CONSUMER_SECRET,$ACCESS_TOKEN,$ACCESS_SECRET);

?>

<html>
<head>
<meta charset="utf-8">
<title>TweetCloud</title>
<meta name="description" content="A simple interface to create a titter word cloud based on the input query.">

<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

<body>
	<h1>Tweets check </h1>
	<form action=" " method= 'POST'>
		<div class="col-lg-3">
			Enter search query: <input type="text" class="form-control" name="search">
		</div>
	</form>
	<?php
		//var_dump($_POST);die; 
		if(isset($_POST['search'])){
			$tweets = $connection->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['search'].'&result_type=recent&count=50');
			foreach ($tweets as $tweet) {
				foreach ($tweet as $t) {
					echo $t->text.'<br>';
				}
			}
	} ?>
</body>
</html>



