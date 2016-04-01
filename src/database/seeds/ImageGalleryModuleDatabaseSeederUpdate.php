<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ImageGalleryModuleDatabaseSeederUpdate extends Seeder
{
    /**
     * El dato de la fecha para creación de los registros.
     * @var Carbon\Carbon
     */
    private $date;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->date = Carbon::now();
        
        // los permisos para el módulo
        $this->createImageGalleryModulePermissions();
        \DB::table('permissions')->insert($this->data);

        Model::reguard();
    }

    /**
     * Crea permisos para el módulo de galería de imágenes.
     * 
     * @return void
     */
    public function createImageGalleryModulePermissions()
    {
        $this->data[] = [
            'name'           => 'imageGallery.slide',
            'display_name'   => 'Ver Slide de galería',
            'description'    => 'Acceder al slide o presentación de las imágenes de la galería',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];

        $this->data[] = [
            'name'           => 'imageGallery.uploadImage',
            'display_name'   => 'Cargar imágenes a galería',
            'description'    => 'Añadir imágenes a la galería',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];

        $this->data[] = [
            'name'           => 'imageGallery.destroyImage',
            'display_name'   => 'Eliminar imágenes de galería',
            'description'    => 'Eliminar las imágenes asociadas a la galería',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];
    }
}
