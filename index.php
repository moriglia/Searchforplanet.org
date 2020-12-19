<?php

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
  $newLink = str_replace('/index.php','', $_SERVER['REQUEST_URI']);
  header('Location: '.$newLink);
}

$searchsite =  ['https://www.ecosia.org/search?q=',
 		'https://search.lilo.org/?q=',
 		'https://www.givero.com/search?q='];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search for planet</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
	<section>
    	<header>
      		<ul>
            	<!--<li><a href="#">What is Ethical research</a></li>
              	<li><a href="#">Privacy Policy</a></li>
              	<li><a href="#">News</a></li>-->
              	<li>No Cookie</li>
              	<li>No Profiling</li>
              	<li>No Script</li>
              	<li>No Track</li>
          	</ul>
      	</header>
      <div class="main">
        <form name="searchForm" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<img src="LOGO.png">
		<div class="searchBox">
		  <input type="text" name="search_query" class="search">
		  <div class="icons">
		    <div>
		      <img src="search-icon.png">
		    </div> 
		  </div>
		</div>
		<div class="buttons">
			<button type="submit" name="submit">Search</button>
		</div>
        </form>
      </div>
      <div class="footer">
        <div class="row row2">
          <ul>
            <!--<li><a href="#">Gitea</a></li>-->
            <!--<li><a href="#">Liberapay</a></li>-->
            <li><a href="https://www.selectallfromdual.com" target="_blank">Powered by Dummy-X</a></li>
            <li><a href="https://mastodon.uno/@selectallfromdual" target="_blank">Mastodon</a></li>
          </ul>
        </div>
      </div>
    </section>
  </body>
</html>


<?php
if(isset($_POST['submit'])) {
	$q = $_POST['search_query'];
	$q = str_replace (' ', '+', $q);
	
	$idx = rand(1,sizeof($searchsite))-1;
	$query = $searchsite[$idx].$q.'&src=searchforplanet.org';

	
	header('Location: '.$query);
}
?>


