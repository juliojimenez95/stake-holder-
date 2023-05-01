<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;


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
Route::get('/cliente/contacto', [ClienteController::class, 'contacto'])->name('cliente.contacto');
Route::get('/cliente/informacion', [ClienteController::class, 'informacion'])->name('cliente.informacion');
Route::get('/cliente/informaciont', [ClienteController::class, 'informaciont'])->name('cliente.informaciont');
Route::get('/cliente/informaciont', [ClienteController::class, 'informaciont'])->name('cliente.informaciont');
Route::get('/cliente/informacionf', [ClienteController::class, 'informacionf'])->name('cliente.informacionf');
Route::get('/cliente/informacionb', [ClienteController::class, 'informacionb'])->name('cliente.informacionb');
Route::get('/actividad/{id}', [ClienteController::class, 'actividad'])->name('cliente.actividad');
Route::get('/pagare', [ClienteController::class, 'pagare'])->name('cliente.pagare');
Route::get('/declaracion', [ClienteController::class, 'declaracion'])->name('cliente.declaracion');
Route::get('/conocimiento', [ClienteController::class, 'conocimiento'])->name('cliente.conocimiento');
 //storage
Route::post('/cliente/storepn', [ClienteController::class, 'storepn'])->name('clientes.storepn');
Route::post('/cliente/storeRepresentante', [ClienteController::class,'storeRepresentante'])->name('clientes.storeRepresentante');
Route::post('/cliente/storeInformaciont', [ClienteController::class,'storeInformaciont'])->name('clientes.storeInformaciont');
Route::post('/cliente/storeInformacionf', [ClienteController::class,'storeInformacionf'])->name('clientes.storeInformacionf');
Route::post('/cliente/storecontactopn', [ClienteController::class, 'storecontactopn'])->name('clientes.storecontactopn');


Route::get('/listarMunicipios', [ClienteController::class, 'listarMunicipios'])->name('listarMunicipios');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
