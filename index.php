
<?php
include "twitteroauth.php";
// Create an TwitterOAuth instance.
$CONSUMER_KEY = "im5Aiz5zqsa99eN6GXPFhg";
$CONSUMER_SECRET = "MOPAHA3fpFqLpFxMc2K7hIr9pWMaihyo3RSct5N1I";
$ACCESS_TOKEN = "333910829-OfVKP3PWz8gYzPKXJNKxM4DmYnzlzV6DW8Yoytqe";
$ACCESS_SECRET = "GWWSzAV79wUTN6waDOD1MbghpRqhRmaeRTQYuwEFhsu3a";
$connection = new TwitterOAuth($CONSUMER_KEY,$CONSUMER_SECRET,$ACCESS_TOKEN,$ACCESS_SECRET);
//var_dump($connection);
//int error_reporting [E_ALL]);
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
<div class = "container">
	<div class = "row"> 
		<div class="col-lg-6" style="float:none !important; margin:0 auto;">
		<h1 style="text-align:center;">Tweet Search </h1>

		<form action=" " method= 'POST' class = 'bs-example form-horizontal'>
			<div class="form-group">
				<label for="query" class="col-lg-3 control-label">Enter Hashtag</label>
				<div class="col-lg-9">
					<input type="text" class="form-control" name="search">
				</div>
				 
			</div>
		</form>
		</div> 
	</div> <!-- End input row -->
</div> <!-- End of container. -->
<div class="container">
	<div class="row">
		<div class="col-lg-6" style="float:none !important; margin:0 auto;">
			<div class="well">
				<fieldset>
					<legend>Results</legend>
					
					<?php
					//var_dump($_POST);die; 
					if(isset($_POST['search'])){
						//need to encode the search query to match the URL.
						$hashTag = urlencode($_POST['search']);
						$query = "https://api.twitter.com/1.1/search/tweets.json?q=".$hashTag."&result_type=recent&count=50";
						$tweets = $connection->get($query);
						foreach ($tweets as $tweet) {
							foreach ($tweet as $t) {
								
								//<!--<div id="paginate"> -->
								echo $t->text;
								echo "<hr>";
							}
						}
					} ?>
				</fieldset>
			</div> <!-- End well -->
		</div> <!-- End col -->
	</div><!-- End row -->
</div> <!-- End container -->
</body>
</html>



