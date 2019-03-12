# Carousel ver 1.0.2

Plugin for creating carousel with autoplay <a href="https://jsfiddle.net/Umkka/ttm6nka6/">Demo</a>

For using just add:
<br><code>&lt;script src="js/slider.min.js">&lt;/script></code> to the body
<br><code>&lt;link rel="stylesheet" href="css/slider.css"></code> to the head

Markup example:
```html
	<div class="slider" id="slider">
		<div class="slItems">
			<div class="slItem" style="background-image: url('img/1.jpg');">
				<div class="slText">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</div>
			</div>
			<div class="slItem" style="background-image: url('img/2.jpg');">
				<div class="slText">
					Praesent consequat sapien ut dui hendrerit imperdiet.  
				</div>
			</div>
			<div class="slItem" style="background-image: url('img/3.jpg');">
				<div class="slText">
					Morbi aliquam tristique rutrum. 
				</div>
			</div>
		</div>
	</div>
```

Init example:
```javascript
	$('#slider').rbtSlider({
		'height': '100vh', //carousel height
		'dots': true, //dot controls
		'arrows': true, //arrow controls
		'auto': 3 //autoplay time in seconds
	});
```
All of this arguments are not required

For using multiple sliders on single page just initialize carousel by class or separate selectors with commas:
```javascript
	$('.slider').rbtSlider({
		'height': '100vh', //carousel height
		'dots': true, //dot controls
		'arrows': true, //arrow controls
		'auto': 3 //autoplay time in seconds
	});
```

# Changelog

1.0.2 Adding multiple carousels support
<br>1.0.1 Fix animation
