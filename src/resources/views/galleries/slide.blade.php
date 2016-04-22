@extends('CoreModule::app-content-only')

@section('title') Slide @stop

@section('style')
	{{-- include the easyzoom component css --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/ImageGalleryModule/easyzoom/css/easyzoom.css') }}">

	<style type="text/css">

		h3{
			margin-top: 0;
		}

		.viewport{
			border: 1px solid #ddd;
			margin-bottom: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.viewport-img{
			margin: auto;
			max-height: 800px;
			width: 100%;
		}
	</style>
@endsection

@section('content')
	
	<div class="content-header">
		<h1>{{$gallery->name}}<small>{{$gallery->description}}</small></h1>
	</div>

	<div class="content">
		
		<div class="box">
		
			<div class="box-header">
				@include('CoreModule::layout.notifications')
			</div>
			
			<div class="box-body">

				{{-- Zoomed Image --}}

				<div class="col-sm-8 col-md-8 col-lg-9 viewport">
					<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
						<a href="{{asset($gallery->images()->first()->full_img_dir)}}">
							<img src="{{asset($gallery->images()->first()->full_img_dir)}}" alt="" class="viewport-img">
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
				
				{{-- Thumbnails --}}

				<div class="col-sm-4 col-md-4 col-lg-3">
					@include ('ImageGalleryModule::galleries.partials.thumbnails')
				</div>{{-- col-md-4 --}}

			</div>
		
		</div>
		
	</div>

@endsection

@section('script')
	{{-- include the easyzoom component js --}}
	<script type="text/javascript" src="{{ asset('resources/ImageGalleryModule/easyzoom/dist/easyzoom.js') }}"></script>

    <script type="text/javascript">
        
    	
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		/*
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});*/
	

    </script>
    
@endsection