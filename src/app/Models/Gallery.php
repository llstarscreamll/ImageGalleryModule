<?php

namespace llstarscreamll\ImageGalleryModule\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
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
    protected $table = 'galleries';

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * La relación entre galería y las imágenes asociadas a la galería, one to many.
     * 
     * @return void
     */
    public function images()
    {
    	return $this->hasMany('llstarscreamll\ImageGalleryModule\app\Models\GalleryImage');
    }
}
