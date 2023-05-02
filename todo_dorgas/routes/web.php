<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\storeanexos;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/identificacion', [ClienteController::class, 'identificacion'])->name('cliente.identificacion');
Route::get('/cliente/pn/', [ClienteController::class, 'crearPn'])->name('cliente.pn');
Route::get('/cliente/pj', [ClienteController::class, 'crearPj'])->name('cliente.pj');
Route::get('/cliente/contacto/{id}', [ClienteController::class, 'contacto'])->name('cliente.contacto');
Route::get('/cliente/informacion/{id}', [ClienteController::class, 'informacion'])->name('cliente.informacion');
Route::get('/cliente/informaciont/{id}', [ClienteController::class, 'informaciont'])->name('cliente.informaciont');
Route::get('/cliente/informacionf/{id}', [ClienteController::class, 'informacionf'])->name('cliente.informacionf');
Route::get('/cliente/informacionb/{id}', [ClienteController::class, 'informacionb'])->name('cliente.informacionb');
Route::get('/actividad/{id}', [ClienteController::class, 'actividad'])->name('cliente.actividad');
Route::get('/pagare/{id}', [ClienteController::class, 'pagare'])->name('cliente.pagare');
Route::get('/declaracion', [ClienteController::class, 'declaracion'])->name('cliente.declaracion');
Route::get('/conocimiento', [ClienteController::class, 'conocimiento'])->name('cliente.conocimiento');
Route::get('/cliente/socios_accionistas/{id}', [ClienteController::class, 'socios_accionistas'])->name('clientes.socios_accionistas');
Route::get('/cliente/documentos_anexos/{id}', [ClienteController::class, 'documentos_anexos'])->name('clientes.documentos_anexos');

 //storage
Route::post('/cliente/storepn', [ClienteController::class, 'storepn'])->name('clientes.storepn');
Route::post('/cliente/storeRepresentante/{id}', [ClienteController::class,'storeRepresentante'])->name('clientes.storeRepresentante');
Route::post('/cliente/storeInformaciont/{id}', [ClienteController::class,'storeInformaciont'])->name('clientes.storeInformaciont');
Route::post('/cliente/storeInformacionf/{id}', [ClienteController::class,'storeInformacionf'])->name('clientes.storeInformacionf');
Route::post('/cliente/storeInformacionb/{id}', [ClienteController::class,'storeInformacionb'])->name('clientes.storeInformacionb');
Route::post('/cliente/storeaccionistas/{id}', [ClienteController::class,'storeaccionistas'])->name('clientes.storeaccionistas');
Route::post('/storeanexos/{id}', [ClienteController::class,'storeanexos'])->name('storeanexos');

Route::post('/cliente/storecontactopn/{id}', [ClienteController::class, 'storecontactopn'])->name('clientes.storecontactopn');


Route::get('/listarMunicipios', [ClienteController::class, 'listarMunicipios'])->name('listarMunicipios');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
