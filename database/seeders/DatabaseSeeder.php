<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\ComprobanteElectronico;
use App\Models\DetalleImportacion;
use App\Models\DetalleVenta;
use App\Models\Importacion;
use App\Models\Movimiento;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Venta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('livewire-tmp');
        Storage::deleteDirectory('cliente');
        Storage::makeDirectory('cliente');
        Categoria::factory(100)->create();
        Cliente::factory(100)->create();
        Proveedor::factory(100)->create();
        Producto::factory(100)->create();
        Venta::factory(100)->create();
        DetalleVenta::factory(100)->create();
        ComprobanteElectronico::factory(100)->create();
        Movimiento::factory(100)->create();
        Importacion::factory(100)->create();
        DetalleImportacion::factory(100)->create();
    }
}
