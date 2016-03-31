<?php

namespace llstarscreamll\ImageGalleryModule\app\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use llstarscreamll\ImageGalleryModule\app\Models\Gallery;
use llstarscreamll\ImageGalleryModule\app\Models\GalleryImage;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['galleries'] = Gallery::orderBy('updated_at', 'desc')->paginate(15);

        return view('ImageGalleryModule::galleries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ImageGalleryModule::galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = Gallery::create($request->all());
        $gallery->save()
            ? $request->session()->flash('success', 'Galería guardada correctamente.')
            : $request->session()->flash('error', 'Ocurrió un error guardando la galería');

        return redirect()->route('imageGallery.show', $gallery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['gallery'] = Gallery::findOrFail($id);

        return view('ImageGalleryModule::galleries.show', $data);
    }

    /**
     * Muestra el modo presentación del slide
     * 
     * @return [type] [description]
     */
    public function slide($id)
    {
        $data['gallery'] = Gallery::findOrFail($id);

        return view('ImageGalleryModule::galleries.slide', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['gallery'] = Gallery::findOrFail($id);

        return view('ImageGalleryModule::galleries.edit', $data);
    }

    /**
     * Sube una imagen y la asocia a una galería.
     * 
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request)
    {
        $file = $request->file('file');

        if($file) {
            // la carpeta donde guardar la imagen
            $destinationPath = config('llstarscreamll.ImageGalleryModule.config.module-config.images_store_path');
            // el nombre del archivo del cliente
            $clientFileName = $file->getClientOriginalName();
            // el nombre con el que se guardará el archivo
            $filename = $clientFileName.'_'.date('Y-m-d_H-i-s').'.'.$request->file('file')->guessExtension();

            // muevo el archivo al respectivo directorio con su respectivo nombre
            $upload_success = $request->file('file')->move(public_path().$destinationPath, $filename);

            // se pudo mover el archivo correctamente?
            if ($upload_success) {

                // entonces creo el Thumbnail de la imágen
                $thumbnail = \Image::make(public_path().$destinationPath . $filename)
                    ->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->crop(200, 200)
                    ->save(public_path().$destinationPath . "200x200_" . $filename);

                // guardo la info de la imágen en la base de datos
                $galeryImage = new GalleryImage;
                $galeryImage->gallery_id = $request->get('gallery_id');
                $galeryImage->name = $clientFileName;
                $galeryImage->full_img_dir = $destinationPath.$filename;
                $galeryImage->thumbnail_dir = $destinationPath . "200x200_" . $filename;
                $galeryImage->description = '';
                $galeryImage->save();

                return response()->json('success', 200);
            } else {
                return response()->json('error', 400);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->fill($request->all());
        $gallery->save()
            ? $request->session()->flash('success', 'Galería actualizada correctamente.')
            : $request->session()->flash('error', 'Ocurrió un error actualizando la galería.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        Gallery::destroy($id)
            ? $request->session()->flash('success', [is_array($id) && count($id) > 1
                ? 'Las galerías han sido movidas a la papelera correctamente.'
                : 'La galería ha sido movido a la papelera correctamente.'])
            : $request->session()->flash('error', [is_array($id)
                ? 'Ocurrió un error moviendo las galerías a la papelera.'
                : 'Ocurrió un problema moviendo la galería a la papelera.']);

        return redirect()->route('imageGallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($id, Request $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        GalleryImage::destroy($id)
            ? $request->session()->flash('success', [is_array($id) && count($id) > 1
                ? 'Las imágenes han sido movidas a la papelera correctamente.'
                : 'La imagen ha sido movido a la papelera correctamente.'])
            : $request->session()->flash('error', [is_array($id)
                ? 'Ocurrió un error moviendo las imágenes a la papelera.'
                : 'Ocurrió un problema moviendo la imagen a la papelera.']);

        return redirect()->back();
    }
}
