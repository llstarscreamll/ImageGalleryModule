@extends('CoreModule::app')

@section('title') Editar Galería @stop

@section('style-after')
    <link rel="stylesheet" type="text/css" href="{{asset('resources/ImageGalleryModule/dropzonejs/dropzone.min.css')}}">
@endsection

@section('content')
    
    <div class="content-header">
		<h1>
			<a href="{{route('imageGallery.index')}}">Galerías</a> <small>Editar</small>
		</h1>
	</div>
	
    <div class="content">
        
        <div class="box">
            
            <div class="box-header">
                @include ('CoreModule::layout.notifications')
            </div>

            <div class="panel-body">

                    <div class="col-sm-6">
                        <div class="row">
                            {!!Form::model($gallery, ['route' => ['imageGallery.update', $gallery->id], 'method' => 'PUT'])!!}

                                @include ('ImageGalleryModule::galleries.partials.create-edit-form')

                                <div class="form-group col-sm-6">
                                    <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Actualizar
                                    </button>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".upload-images-modal">
                                        <span class="glyphicon glyphicon-picture"></span>
                                        Añadir Imágenes
                                    </button>

                                    <a class="btn btn-primary" href="{{route('imageGallery.slide', $gallery->id)}}">
                                        <span class="fa fa-television"></span>
                                        Ir al Slide
                                    </a>
                                </div>

                            {!!Form::close()!!}

                        </div>
                    </div>

                    <div class="col-sm-6 margin-top-10">

                        @include ('ImageGalleryModule::galleries.partials.thumbnails', ['showImageControls' => true])
                        
                    </div>

                    <div class="clearfix"></div>

                <!-- Ventana Modal para añadir imágenes -->

                <div class="modal fade upload-images-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Añadir Imágenes a la Galería</h4>
                            </div>

                            <div class="modal-body">

                                {!! Form::open(['route' => 'imageGallery.uploadImage', 'id' => 'my-awesome-dropzone', 'class' => 'dropzone']) !!}
                                    {!!Form::hidden('gallery_id', $gallery->id)!!}
                                    <div class="dz-message">
                                        <div class="well">Arrastra aquí las imágenes o has clic!!</div>
                                    </div>
                                {!! Form::close() !!}

                            </div>

                            <div class="modal-footer">
                                <a href="{{route(Request::route()->getName(), $gallery->id)}}" class="btn btn-primary">Recargar</a>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
				
            </div>
        </div>
    </div>
    
@endsection

@section('script')
    <!-- JavaScript Includes -->
    <script src="{{asset('resources/ImageGalleryModule/dropzonejs/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        
    </script>
@stop()