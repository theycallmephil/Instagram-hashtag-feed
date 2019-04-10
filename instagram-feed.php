<?php
$url="https://www.instagram.com/explore/tags/lifeatsymbion/?__a=1";
$json=file_get_contents($url);
$item=json_decode($json, true);

// graphql,hashtag, edge_hashtag_to_top_posts, [edges], node, display_url

?>
<!doctype html>
<html lang="en">
<head>
	<title>Symbion instagram feed</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300|Roboto:400,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<style type="text/css">
		* {
		box-sizing: border-box;
		}
		body {
			padding: 0;
			margin: 0;
			background-color: #fafafa;
			color: #262626;
			font-family: "Open Sans", Arial, sans-serif;
			font-weight: 500;
		}
		.container-fluid {
			position:absolute;
			bottom:0;
			width:100%;
			height: 100%;
			color: rgb(0, 0, 0);
			padding-left: 5rem;
			z-index: 2;
		}
		html {
			height: 100%;
			background: url(images/<?php echo $selectedImage; ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			padding: 0;
			margin: 0;
		}
		h1 {
			padding-bottom: 0.5rem;
		}
		.header {
			position: ;
			bottom: 0;
			padding: 1.25rem 0rem 1rem 0rem;
			font-size: 1.2rem;
		}
		.image_container {
			overflow:hidden; 
			width: 80%;
			background: rgba($offBlack, 0.05);
			font-family: 'Open Sans', sans-serif;
		}
		.image_container img {
			object-fit:cover;
			width: 50rem;
			height: 50rem;
		}
		.image-caption {
			background: rgba(255, 255, 255);
			padding: 1.25rem;
			border-style: solid;
			border-color: rgba(210, 210, 210, 1);
			border-width: 1px;
			width: 50rem;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="header">
			<h1>#lifeatsymbion</h1>
			<p>To display your photo here, use the #lifeatsymbion hashtag</p>
		</div>
		
		<div class="image-slider">
		<?php  
		foreach($item['graphql']['hashtag']['edge_hashtag_to_top_posts']['edges'] as $graphql){
			echo "<div class='image_container'>
					<img src='".$graphql['node']['display_url']."'>
					<div class='image-caption'>'".$graphql['node']['edge_media_to_caption']['edges'][0]["node"]["text"]."'</div>
				</div>";
		};
		?>
		</div>

	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<script>
	$(document).ready(function(){
	$('.image-slider').slick({
		autoplay: true,
		infinite: true,
		arrows: false,
		autoplaySpeed: 3000,
		centerMode: false,
		centerpadding: '100px',
		});
	});
	$(window).resize(function() {
  $('.js-slider').slick('resize');
});

$(window).on('orientationchange', function() {
  $('.js-slider').slick('resize');
});
	</script>
</body>
</html>