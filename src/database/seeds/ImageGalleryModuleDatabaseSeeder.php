<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ImageGalleryModuleDatabaseSeeder extends Seeder
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
            'name'           => 'imageGallery.index',
            'display_name'   => 'Ver Lista de Galerías',
            'description'    => 'Ver en una lista las galerías creadas',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];
            
        $this->data[] = [
            'name'           => 'imageGallery.create',
            'display_name'   => 'Crear Galerías',
            'description'    => 'Crear nuevas galerías',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];
            
        $this->data[] = [
            'name'           => 'imageGallery.show',
            'display_name'   => 'Ver Detalles de Galerías',
            'description'    => 'Ver detalles de las galerías (sólo lectura)',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];
            
        $this->data[] = [
            'name'              => 'imageGallery.edit',
            'display_name'      => 'Actualizar Galerías',
            'description'       => 'Actualiza la información de las galerías creadas',
            'created_at'        =>  $this->date->toDateTimeString(),
            'updated_at'    =>  $this->date->toDateTimeString()
        ];
        
        $this->data[] = [
            'name'           => 'imageGallery.destroy',
            'display_name'   => 'Mover Galerías a la Papelera',
            'description'    => 'Mover las galerías a la papelera',
            'created_at'     =>  $this->date->toDateTimeString(),
            'updated_at'     =>  $this->date->toDateTimeString()
        ];
    }
}
