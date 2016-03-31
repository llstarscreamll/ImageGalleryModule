@if(count($images = $gallery->images) > 0)
    <div class="thumbnails">

        @foreach($images as $image)

            <div class="col-xs-4 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <a href="{{asset($image->full_img_dir)}}" data-standard="{{asset($image->full_img_dir)}}">
                        <img src="{{asset($image->thumbnail_dir)}}" alt="" width="100">
                    </a>
                    @if(isset($showImageControls))
                    <div class="caption text-center">
                        {!! Form::open(['route' => ['imageGallery.destroyImage', $image->id], 'method' => 'DELETE']) !!}
                            <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Borrar Imagen" class="btn btn-xs btn-danger">
                                <span class="fa fa-minus-square"></span>
                                <span class="sr-only">Borrar Imagen</span>
                            </button>
                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>
            
        @endforeach

    </div>
@else
    <div class="alert alert-warning">No se encontraron imágenes...</div>
@endif