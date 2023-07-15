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
        Storage::deleteDirectory('proveedor');
        Storage::deleteDirectory('cliente',);
        Storage::deleteDirectory('producto',);
        Storage::makeDirectory('proveedor');
        Storage::makeDirectory('cliente');
        Storage::makeDirectory('producto');
        Categoria::factory(10)->create();
        Cliente::factory(10)->create();
        Proveedor::factory(10)->create();
        Producto::factory(10)->create();
        Venta::factory(10)->create();
        DetalleVenta::factory(10)->create();
        ComprobanteElectronico::factory(10)->create();
        Movimiento::factory(10)->create();
        Importacion::factory(10)->create();
        DetalleImportacion::factory(10)->create();
    }
}
