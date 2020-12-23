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

if (isset($_GET['theme']) && $_GET['theme'] == 'dark') {
    $csstheme = "logicodev-dark.min.css";
    $labeltheme = "Light";
    $linktheme = "/";
} else {
    $csstheme = "logicodev.min.css";
    $labeltheme = "Dark";
    $linktheme = "/?theme=dark";
}

?>

<!DOCTYPE html>
<head>
	<!-- 
		Template cloned by Searx: https://github.com/searx/searx
	-->
    <meta charset="UTF-8" />
	<meta property="og:title" content="Search for Planet">
	<meta property="og:description" content="Redirect searches to Ethical Search Engines">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://www.searchforplanet.org">
    <meta property="og:image" content="icon-big.png">
	
    <meta name="description" content="Redirect searches to Ethical Search Engines" />
    <meta name="keywords" content="search, search engine, ethical search, ethical" />
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1.0, user-scalable=1" />

    <title>SearchforPlanet.org</title>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$csstheme;?>" type="text/css" />
    <link rel="stylesheet" href="leaflet.min.css" type="text/css" />

    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body>
<div class="searx-navbar">
	<span class="instance pull-left"><a href="https://gitea.it/selectallfromdual/Searchforplanet.org/wiki/What-is" target="_blank">What is</a></span>
	<span class="pull-right"><a href="https://gitea.it/selectallfromdual/Searchforplanet.org/wiki/Privacy-policy" target="_blank">Privacy policy</a><a href="https://gitea.it/selectallfromdual/Searchforplanet.org/wiki/News" target="_blank">News</a><a href="<?=$linktheme;?>"><?=$labeltheme;?></a></span>
</div>
<div class="container">
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-sm-12 col-md-12">
                <h1 class="text-hide center-block" id="main-logo">
                    <img class="center-block img-responsive" src="LOGO.png" alt="searx logo" />
                    SearchforPlanet.org
                </h1>
				<p class="text-muted">Redirect searches to Ethical Search Engines</p>
        </div>
    </div>
    <div class="row">
        <div class="text-center col-sm-12 col-md-12">

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="search_form" role="search">
    <div class="input-group col-md-8 col-md-offset-2">
        <input type="search" name="q" class="form-control input-lg autofocus" id="q" placeholder="Search here..." aria-label="Search here..." autocomplete="off" value="" accesskey="s">
        <span class="input-group-btn">
            <button type="submit" name="submit" class="btn btn-default input-lg" aria-label="Cerca"><span class="hide_if_nojs"><img src="search-icon.png"></span></button>
        </span>
    </div>

</form>       </div>
    </div>
</div>

    </div>
    <div class="footer">
        <div class="container">
            <p class="text-muted">
                <small>By using this service you accept the <a href="https://gitea.it/selectallfromdual/Searchforplanet.org/wiki/Terms" target="_blank">Terms</a><br>
				<a href="https://gitea.it/selectallfromdual/Searchforplanet.org" target="_blank">source code</a> | <a href="https://gitea.it/selectallfromdual/Searchforplanet.org/issues" target="_blank">issue tracker</a> | <a href="https://liberapay.com/searchforplanet" target="_blank">support us</a> | <a href="https://gitea.it/selectallfromdual/Searchforplanet.org/wiki/Welcome-page" target="_blank">wiki</a></small>
            </p>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
	$q = $_POST['q'];
	goSearch($q, $searchsite);
}

function goSearch($q, $searchsite) {

    $q = urlencode($q);
	
	$idx = rand(1,sizeof($searchsite))-1;
	$query = $searchsite[$idx].$q;

	header('Location: '.$query);
}
?>