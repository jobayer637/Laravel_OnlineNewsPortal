
<style type="text/css">

	.xx
	{
		background-color: #f3f5f8;
		widht:100%;
	}
	.container1 .sliderContainer img{
		width: 70%;
		height: 100%;
	}

	.sliderContainer{
		position: relative;
	}

	.sliderContainer .sliderItem{
		position: absolute;
		width: 100%;
		opacity: 0;
		transition: 4s;
	}

	.sliderContainer .sliderItem.active{
		opacity: 1;
	}

	/*--------------------------------*/
	@media only screen and (min-width: 1440px){
	  	[class*="container1"] {
	    	width: 60%;
			height:400px;
			margin:auto;
		}

		.container1 .sliderContainer img{
			width: 100%;
			height: 400px;
		}
	}

	@media only screen and (max-width: 1440px){
	  	[class*="container1"] {
	    	width: 100%;
	    	height: 400px;
			margin:auto;
		}

		.container1 .sliderContainer img{
			width: 100%;
			height: 400px;
		}
	}

	@media only screen and (max-width: 1280px){
	  	[class*="container1"] {
	    	width: 100%;
	    	height: 370px;
		}

		.container1 .sliderContainer img{
			width: 100%;
			height: 370px;
		}
	}

	@media only screen and (max-width: 1024px){
	  	[class*="container1"] {
	    	width: 100%;
			height: 340px;
		}

		.container1 .sliderContainer img{
		width: 100%;
		height: 340px;
		}
	}

	@media only screen and (max-width: 980px){
	  	[class*="container1"] {
	    	width: 100%;
			height: 300px;
		}

		.container1 .sliderContainer img{
		width: 100%;
		height: 300px;
		}
	}

	@media only screen and (max-width: 411px){
	  	[class*="container1"] {
	    	width: 100%;
			height:180px;
		}

		.container1 .sliderContainer img{
		width: 100%;
		height: 180px;
		}
	}

	@media only screen and (max-width: 360px){
	  	[class*="container1"] {
	    	width: 100%;
			height: 150px;
		}

		.container1 .sliderContainer img{
		width: 100%;
		height: 150px;
		}
	}

</style>


<div class="xx">
<div class="container1">
	<div class="sliderContainer">
		<div class="sliderItem active"><img src="storage/category/7IEoGhGWRh.jpg"></div>
		<div class="sliderItem"><img src="storage/category/ErK3gEOaE4.jpg"></div>
		<div class="sliderItem"><img src="storage/category/INNFSLONT1.jpg"></div>
		<div class="sliderItem"><img src="storage/category/ErK3gEOaE4.jpg"></div>
	</div>
</div>
</div>


<script>

	function ImageSlider()
	{
		if(document.getElementsByClassName("sliderItem")[0].classList.contains("active"))
		{
			document.getElementsByClassName("sliderItem")[1].classList.add("active");
			document.getElementsByClassName("sliderItem")[0].classList.remove("active");
		}

		else if(document.getElementsByClassName("sliderItem")[1].classList.contains("active"))
		{
			document.getElementsByClassName("sliderItem")[2].classList.add("active");
			document.getElementsByClassName("sliderItem")[1].classList.remove("active");
		}

		else if(document.getElementsByClassName("sliderItem")[2].classList.contains("active"))
		{
			document.getElementsByClassName("sliderItem")[3].classList.add("active");
			document.getElementsByClassName("sliderItem")[2].classList.remove("active");
		}

		else if(document.getElementsByClassName("sliderItem")[3].classList.contains("active"))
		{
			document.getElementsByClassName("sliderItem")[0].classList.add("active");
			document.getElementsByClassName("sliderItem")[3].classList.remove("active");
		}
	}
	setInterval(ImageSlider,5000);
</script>

<!-- @section('slider')
@include('layouts.frontend.partial.mainSlider')
@endsection -->