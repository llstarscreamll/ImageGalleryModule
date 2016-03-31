@extends('CoreModule::app')

@section('title') Galerías @stop

@section('style-after')

@endsection

@section('content')
    
    <div class="content-header">
		<h1><a href="{{route('users.index')}}">Galerías</a></h1>
	</div>
	
    <div class="content">
        
        <div class="box">
            
            <div class="box-header">

                <div class="row">

                    {{-- Action Buttons --}}
                    <div class="col-md-6 action-buttons">
                        <a id="create-galery-link"
                            class="btn btn-default btn-sm"
                            href="{!! route('imageGallery.create') !!}"
                            role="button"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Crear Galería">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span class="sr-only">Crear Galería</span>
                        </a>
                    </div>

                </div>

                @include ('CoreModule::layout.notifications')

            </div>

            <div class="panel-body">
				
				<div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th># Imágenes</th>
                                <th>Fecha Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($galleries) > 0)
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td><a href="{{route('imageGallery.show', $gallery->id)}}">{{$gallery->name}}</a></td>
                                    <td>{{$gallery->description}}</td>
                                    <td>{{count($gallery->images)}}</td>
                                    <td>{{$gallery->updated_at}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['imageGallery.destroy', $gallery->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Mover galería '{{$gallery->name}}' a la Papelera">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                <span class="sr-only">Mover a la Papelera</span>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="col-sm-6 col-sm-offset-3 alert alert-warning">No se encontraron galerías...</div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
				
            </div>
        </div>
    </div>
    
@endsection

@section('script')

@stop()