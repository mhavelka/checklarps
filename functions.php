<?php
require_once "vendor/leafo/scssphp/scss.inc.php";
use Leafo\ScssPhp\Compiler;

function compileScss() {
    $scss = new Compiler();
	$scss->setImportPaths('css/scss/');
	
	$scssIn = file_get_contents(__DIR__ . '/css/scss/custom.scss');
	$cssOut = $scss->compile($scssIn);
	file_put_contents(__DIR__ . '/css/style.css', $cssOut);
}

function carouselItem(int $index, string $active) {
    $active = $active ? 'active': ''; 
    echo (
        '<div class="carousel-item '.$active.'">
        <a class="inside-thumb" data-fancybox="gallery_carousel" href="img/inside/inside'.$index.'.jpg"><img class="d-block w-100" src="img/inside/inside'.$index.'.jpg" alt="First slide"></a>
        </div>'
    );
}

function renderCarouselItems(int $numberOfItems) {
    $component = '';
    for ($i = 1; $i <= $numberOfItems; $i++) {
        $active = $i == 1 ? 'active' : false;
        $component .= carouselItem($i, $active);
    }
}

function renderInsideThumbnails(int $numberOfItems) {
    $component = '';
    for ($i = 1; $i <= $numberOfItems; $i++) {
        $component .= '<a class="inside-thumb" data-fancybox="gallery_list" href="img/inside/inside'.$i.'.jpg"><img src="img/inside/inside'.$i.'.jpg"></a>';
    }
    echo $component;
}

function renderEditors($editors) {
    $component = '';
    foreach ($editors as $editor) {
        $component .= Editor($editor['name'], $editor['about']);
    }
}

function Editor(string $name, string $about) {
    $image = strstr($name, ' ', true);
    $image = strtolower($image) . '.jpg';
    echo(
        '<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-0">
			<div class="row">
				<div class="col-xs-3 col-sm-2 col-sm-offset-1 col-md-3 col-md-offset-0 text-center">
					<img src="img/editors/' . $image . '" class="editor-img img-circle">
				</div>
				<div class="col-12 col-md-9 margin-top-2rem mt-sm-0 text-center text-md-left">
					<h3 class="editor-name">' . $name . '</h3>

					<p>' . $about . '</p>
				</div>
			</div>
		</div>'
    );
}

function renderBuyTheBookCTA() {
    echo('
        <div class="cta-buy-disabled__note">Will be available since 10/02/2020</div>
        <a href="/" class="cta cta-buy cta-buy-disabled" target="_blank">Buy the book <span>$29.90</span></a>
        ');
//     echo('
//     <a href="http://www.lulu.com/shop/check-larps-team/check-larps/paperback/product-24357235.html" class="cta cta-buy" target="_blank">Buy the book <span>$29.90</span></a>
//     ');
}


?>