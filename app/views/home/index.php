<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="top-container">
	<video id="video">Stream not available...</video>
	<button id="photo-button" class="w3-button w3-white w3-border w3-border-blue w3-round-large">
	Take Photo
	</button>
	<select id="photo-filter">
		<option value="none">Normal</option>
		<option value="grayscale(100%)">Grayscale</option>
		<option value="sepia(100%)">Sepia</option>
		<option value="invert(100%)">Invert</option>
		<option value="hue-rotate(90deg)">Hue</option>
		<option value="blur(10px)">Blur</option>
		<option value="contrast(200%)">Contrast</option>
	</select>
	<button id="clear-button">Clear</button>
	<canvas id="canvas"></canvas>
</div>
<div class="bottom-container">
	<div id="photos"></div>
</div>
<script src="<?=PROOT?>/js/main.js"></script>
<?php $this->end(); ?>