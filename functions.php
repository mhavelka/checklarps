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
        <a class="inside-thumb" data-fancybox="gallery_carousel" href="img/inside/inside'.$index.'.png"><img class="d-block w-100" src="img/inside/inside'.$index.'.png" alt="First slide"></a>
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

?>