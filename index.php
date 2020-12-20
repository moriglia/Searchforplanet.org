<?php

if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
  $newLink = str_replace('/index.php','', $_SERVER['REQUEST_URI']);
  header('Location: '.$newLink);
}

$searchsite =  ['https://www.ecosia.org/search?q=',
                'https://search.lilo.org/?q=',
                'https://www.givero.com/search?q=',
                'https://elliotforwater.com/Search?q=',
                'https://search.givewater.com/serp?q='
                ];

$q = $_GET['q'];
if (isset($q)) {
    goSearch($q, $searchsite);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta property="og:title" content="Search for Planet">
	<meta property="og:description" content="Redirect searches to Ethical Search Engines">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://www.searchforplanet.org">
    <meta property="og:image" content="favicon.png">
    <title>Search for Planet</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png">
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
		<div class="description">
		  <p>
		    Redirect searches to Ethical Search Engines
		  </p>
		</div>
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
            <li><a href="https://gitea.it/selectallfromdual/Searchforplanet.org" target="_blank">Gitea</a></li>
            <li><a href="https://gitea.it/selectallfromdual/Searchforplanet.org/issues" target="_blank">Issues</a></li>
            <li><a href="https://liberapay.com/searchforplanet" target="_blank">Liberapay</a></li>
            <li><a href="https://www.selectallfromdual.com" target="_blank">Powered by Dummy-X</a></li>
            <li><a href="https://mastodon.uno" target="_blank">in collaboration with Mastodon Italia</a></li>
          </ul>
        </div>
      </div>
    </section>
  </body>
</html>


<?php
if(isset($_POST['submit'])) {
	$q = $_POST['search_query'];
	goSearch($q, $searchsite);
}

function goSearch($q, $searchsite) {

    $q = urlencode($q);
	
	$idx = rand(1,sizeof($searchsite))-1;
	$query = $searchsite[$idx].$q;

	header('Location: '.$query);
}
?>


