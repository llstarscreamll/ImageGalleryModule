<?php

namespace llstarscreamll\ImageGalleryModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    /**
     * attributes formated as dates
     * 
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'gallery_images';

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gallery_id', 'name', 'dir', 'description'];

    /**
     * La relación entre las imágenes y la galería a la que pertenecen, one to many.
     * 
     * @return void
     */
    public function gallery()
    {
        return $this->belongsTo('llstarscreamll\ImageGalleryModule\app\Models\Gallery');
    }
}
