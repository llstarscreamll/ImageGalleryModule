@extends('CoreModule::app')

@section('title') Detalles de Galería @stop

@section('content')
    
    <div class="content-header">
		<h1>
			<a href="{{route('imageGallery.index')}}">Galerías</a> <small>Detalles</small>
		</h1>
	</div>
	
    <div class="content">
        
        <div class="box">
            
            <div class="box-header">
                @include ('CoreModule::layout.notifications')
            </div>

            <div class="panel-body">
				
				{!!Form::model($gallery, ['route' => 'imageGallery.store', 'method' => ''])!!}

                    <div class="col-sm-6">
                        <div class="row">

                            @include ('ImageGalleryModule::galleries.partials.create-edit-form', ['disabled' => true])

                            <div class="form-group col-sm-6">
                                <a class="btn btn-warning" href="{{route('imageGallery.edit', $gallery->id)}}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Editar
                                </a>
                                <a class="btn btn-primary" href="{{route('imageGallery.slide', $gallery->id)}}">
                                    <span class="fa fa-television"></span>
                                    Ir al Slide
                                </a>
                            </div>
                        
                        </div>
                    </div>

                    <div class="col-sm-6">

                        @include ('ImageGalleryModule::galleries.partials.thumbnails')
                        
                    </div>

                {!!Form::close()!!}
				
            </div>
        </div>
    </div>
    
@endsection

@section('script')

@stop()