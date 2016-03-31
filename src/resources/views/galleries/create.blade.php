@extends('CoreModule::app')

@section('title') Crear Galería @stop

@section('content')
    
    <div class="content-header">
		<h1>
			<a href="{{route('imageGallery.index')}}">Galerías</a> <small>Crear</small>
		</h1>
	</div>
	
    <div class="content">
        
        <div class="box">
            
            <div class="box-header">
                @include ('CoreModule::layout.notifications')
            </div>

            <div class="panel-body">
				
				{!!Form::open(['route' => 'imageGallery.store', 'method' => 'POST'])!!}

                    <div class="col-sm-8 col-sm-offset-2">

                        @include ('ImageGalleryModule::galleries.partials.create-edit-form')

                        <div class="form-group col-sm-12">
                        <button class="btn btn-primary">
                            Guardar
                        </button>
                        </div>

                    </div>

                {!!Form::close()!!}
				
            </div>
        </div>
    </div>
    
@endsection

@section('script')

@stop()