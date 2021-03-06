<?php
	require "data.php";
	require "functions.php";
	
	compileScss();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Check Larps</title>
	<link rel="icon" type="image/png" href="img/icons/favicon.png">

	<meta property="og:type" content="website">
	<meta property="og:image" content="http://checklarps.com/img/lujza.jpg">
	<meta property="og:title" content="Check larps">
	<meta property="og:description" content="Czech larp collection book. 10 take & play larps, you may taste on your own.">
	<meta property="og:locale" content="en_US">


	<!-- This is obsolete styling from bootstrap3. Needs to be preserved until refactoring -->
	<link rel="stylesheet" type="text/css" href="css/style.min.css?v=6">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=0">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Zilla+Slab:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- fancybox -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


</head>
<body>

<div class="book-bg"></div>
<div class="container container-sm fist-slide text-center mt-3 mt-md-0">
	<h1>
		<div class="main-header">Check Larps</div>
		<div class="mt-4 mt-lg-0">
			<small class=main-subheader>10 take &amp; play larps from Czechia in one book</small>
		</div>
	</h1>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row numbers">
				<div class="col-sm-4 text-center">
					<div class="big">10</div>
					<p>take &amp; play games</p>
				</div>
				<div class="col-sm-4 text-center">
					<div class="big">43</div>
					<p>hours of fun</p>
				</div>
				<div class="col-sm-4 text-center">
					<div class="big">200+</div>
					<p>game runs</p>
				</div>
			</div>
		</div>
	</div>
	


	<div class="row justify-content-center main-cta" id="insideCta">
		<div class="col">
			<a href="#insideCta" class="cta cta-look" onclick="$('.inside-thumb')[0].click()">Look inside</a>
			<br>
			<img src="img/icons/arrow-down.svg" class="navigation-arrowDown" alt="">
		</div>
	</div>
</div>



<div class="container container-sm text-center" id="inside">

	<h2>Inside the book</h2>

	<div id="insideTheBook__list" class="inside-wrap">
		<?php renderInsideThumbnails(7) ?>
	</div>

	<div id="insideTheBook__carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php renderCarouselItems(7) ?>
		</div>
		<a class="carousel-control-prev" href="#insideTheBook__carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#insideTheBook__carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>



	<?php renderBuyTheBookCTA() ?>
</div>

<div class="container margin-top-md-10rem margin-top-sm-6rem text-center" id="larps">
	<h2>
		larps
	</h2>

	<div class="row">
		<!-- TO-DO: Refactor this and encapsulate to functions -->
		<?php foreach ($games as $key => $game) { ?>

			<div class="col-xs-12 col-sm-10 col-sm-offset-1 <?php if ($key >= 3) echo 'area-hidden' ?>">
					
					<div class="row justify-content-center text-left larp-preview">
						<div class="col-xs-8 col-md-4 text-center">
							<img class="img-responsive" src="img/larps/<?= $game['image'] ?>">
						</div>
						<div class="col-xs-8 col-lg-6">
							<h1>
								<?php echo $game['title']; ?>
								<br>
								<small><?php echo $game['subtitle']; ?></small>
							</h1>
							<h4><?= $game['players']['total'] ?> players, <?php echo $game['duration']; ?> hours
							</h4>
							
							<p>
								<?= $game['short_annotation'] ?>
							</p>
              <div class="row justify-content-center justify-content-md-start">
                  <div class="text-center">
                    <a class="cta cta-seeMore" data-toggle="modal" data-target=".game<?php echo $key; ?>" href="">See more</a>
                  </div>
              </div>
						</div>
					</div>

			</div>

			<div class="modal fade game<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<button type="button" class="close gameModal__close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
						<div class="gameModal__body">
							<div class="row">

								<div class="col-xs-12 col-md-9 col-xs-offset-0 col-md-offset-3">
									<h1>
										<?php echo $game['title']; ?>
										<br>
										<small><?php echo $game['subtitle']; ?></small>
									</h1>
								</div>
								<div class="col-xs-3 gameModal__image">
									<img class="img-responsive" src="img/larps/<?= $game['image'] ?>">
								</div>
								<div class="col-xs-12 col-md-9">
									<hr>
									<p>
										<?php echo nl2p($game['annotation']); ?>
									</p>
									<hr class="gameModal_line">
									<div class="col-xs-4">
										<div class="row text-center">
											<div class="">
												<img src="img/players.svg" class="gameModal__icon" alt="">			
											</div>
											<div class="larp-parameter__value">
												<?php
												$gamePlayers = '';
												if (!empty($game['players']['male'])) {
													$gamePlayers = $game['players']['male'] .' male';
												}
												if (!empty($game['players']['female'])) {
													if (!empty($gamePlayers)) $gamePlayers .= ', ';
													$gamePlayers .= $game['players']['female'] .' female';
												}
												if (!empty($game['players']['both'])) {
													if (!empty($gamePlayers)) $gamePlayers .= ', ';
													$gamePlayers .= $game['players']['both'] .' both';
												}
												echo $gamePlayers;
												?>
											</div>
										</div>
										
									</div>
									<div class="col-xs-4">
										<div class="row text-center">
											<div class="">
												<img src="img/time.svg" class="gameModal__icon" alt="">			
											</div>
											<div class="larp-parameter__value">
												<?php echo $game['duration']; ?> hours
											</div>
									</div>
									</div>
									<div class="col-xs-4">
										<div class="row text-center">
											<div class="">
												<img src="img/authors.svg" class="gameModal__icon" alt="">			
											</div>
											<div class="larp-parameter__value">
													<?php echo $game['authors']; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center text-center">
                <div class="col-10 col-md-6">
									<a href="/materials" class="cta cta-materials">Download additional materials</a>
									<br>
									<div id="materialsExplanation<?= $key ?>" onclick="$('#materialsExplanation<?= $key ?>').popover('toggle')" class="gameModal__note" data-container="body" data-toggle="popover" data-placement="top" data-content="
									Additional materials are texts, files, images, applications etc. bounded to the game itself. However, manual for the game facilitation and introduction is in the book only. Therefore, materials without the book are useless and you are unable to play the game without the book.
									">
											What are additional materials?
									</div>
                </div>
							</div>
						</div>
					</div>
				</div>
			</div>


		<?php } ?>
	</div>


	<div class="text-center show-more margin-top-3rem">
		<a href="#larps" class="cta cta-look" onclick="document.querySelector('#larps').classList.add('expanded'); return false;">
			Show them all
		</a>
	</div>

</div>


<div class="container margin-top-md-10rem margin-top-sm-6rem text-center">
	<h2>
		Their thoughts
	</h2>

  <div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
      <!-- TO-DO: Refactor this, encapsulate to functions and provide data from data.php -->
      <div class="testimonial">
        <div class="testimonial-content">This collection includes ten battle-tested larps from Czechia, showcasing a vibrant play culture that may be intriguingly different from your own, but still entirely relatable. These games are brimming with new ideas, cover a vast swath of thematic territory, and are totally worth exploring.</div>
        <div class="testimonial-author">Jason Morningstar, USA</div>
      </div>
      <div class="testimonial">
        <div class="testimonial-content">Precisely crafted experiences, at the reach of your hands! From soul crushin dilemmas to heartful laughter: Czech larp is a book full of emotions. Just take & play them!</div>
        <div class="testimonial-author">Dominik Dembiński, creator of College of Wizardry, Poland </div>
      </div>
      <div class="testimonial">
        <div class="testimonial-content">Check larps is a beautiful book with a clear structure. Even though parts of the design choices feels alien to me, they feel intruigingly alien. The reading experience leaves me feeling inspired to expand on my own design choices. The book is as much about cultural exchange as it is a playing manual or a book about larp design.</div>
        <div class="testimonial-author">Siri Sandquist, Sweden</div>
      </div>
    </div>
  </div>

  <?php renderBuyTheBookCTA() ?>
</div>



<div class="container margin-top-md-10rem margin-top-sm-6rem" id="more">
	<h2 class="text-center">
		More about the book
	</h2>

	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">

			<div class="testimonial">
				<div class="testimonial-content">“In the Czech republic there are more than 300 chamber larps designed and played repetitively. We had chosen 10 great ones of them and put them into one book so you can taste them on your own.</div>
				<div class="testimonial-author">Lujza Kotryová, editor</div>
			</div>
			<p>
				The book contains 10 full larpscripts including design concepts, tutorials, tips and tricks for facilitations and reflections. We had chosen larps that were played many times and they are proven by players. You don't find any raw ideas there that weren't tested repeatedly. Our aim is to offer you quality as well as diversity of scenarios typical for Czech larp scene.
			</p>
			<p>
				You can find there detailed guidelines for running the larp by yourself. Additional materials, such as full texts for players, playlists, in-game texts and picture materials are available on the web for download after buying the book.
			</p>

<!-- 			<div class="text-center show-more margin-top-3rem">
				<a href="#more" onclick="document.querySelector('#more').classList.add('expanded'); return false;">
					Read on
				</a>
			</div>

			<div class="area-hidden"> -->

				<p>We, editors of this book, are larp enthusiasts, authors, larp theoreticians and members of Czech, and Europe, larp community. In 2015 we have decided to put together a collection of larps that represents our “Czech cousine”. From that time our firstly small project got fat and here we are translating 10 very well developed and complex full larps into english for international public.</p>

				<p>Our hope is that this book helps not only preserve some of the good designs made so they won't disappear, but we also hope that that they can be interesting for you to study in terms of game design and that they will be played behind our borders. </p>

				<p>We firmly believe that a style of larps representing the Czech way is unique in its forms and can be inspiring for other authors and organizers. So called chamber larps (in english sometimes called blackbox larps, theatre larps or parlor style larps) had gone through big development during 2007-2008 to repetitive take and play format with robust content. Around 2010 the style we call “czechoslovakian jeep-form” came across using some of the nordic jeep-form mechanics combining them with “classical” chamber larps. </p>

				<p>Examples of both (classical Czech chamber larps and czechoslovakian jeep-form) awaits you in this book.</p>
			<!-- </div> -->

		</div>
	</div>


	<h2 class="text-center editors-heading">Meet the editors</h2>

	<div class="row editors-row">
      <?php renderEditors($editors) ?>
  </div>

  <h2 class="text-center editors-heading">Big thanks to contributors</h2>

  <div class="row editors-row">
  		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Translators
			</div>
			<div class="contributors-content">
				Gabriela Fialová<br>
				Iva Vávrová<br>
				Kristína Kureková<br>
				Kristýna Chvojková<br>
				Barbora Růžičková<br>
				Dagmar Wiesnerová<br>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			English proofreaders
			</div>
			<div class="contributors-content">
				Jason Morningstar<br>
				Marshall Miller<br>
				Gaylord Tang<br>
				Mo Holkar<br>
				Marta Błaszkiewicz<br>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Czech proofreaders
			</div>
			<div class="contributors-content">
				Martina Drabinová<br>
				Josef Tisoň<br>
				Andrea Špoková<br>
				Kateřina Holendová<br>
				Marek Boček<br>
				Tereza Cirila Havelková<br>
				Jan Páral<br>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Consultants and other helpers
			</div>
			<div class="contributors-content">
				Hana Kovářová<br>
				Jindřich Mašek<br>
				Zbyněk Štajer<br>
				Tereza Chocholatá<br>
				Lizzie Stark<br>
				Jakub Maruš<br>
			</div>
		</div>

											
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Graphic designer
			</div>
			<div class="contributors-content">
				Martin Rašek<br>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Illustrator
			</div>
			<div class="contributors-content">
				Kristýna Sochnová<br>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Typesetter
			</div>
			<div class="contributors-content">
				Markéta Tunková<br>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="contributors-header">
			Webdesigner
			</div>
			<div class="contributors-content">
				Ondřej Henek<br>
			</div>
		</div>
  </div>



<div class="container test margin-top-sm-6rem text-center">
	<a href="mailto:info@checklarps.com">info@checklarps.com</a>
	|
	With love from Brno...
</div>


<script>
/*
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-6149741-16', 'auto');
	ga('send', 'pageview');
*/
</script>

</body>
</html>
