<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AdminController;





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

Route::get('/cliente/registrarse', function(){
    return view('bienvenido');
})->name('cliente.registrarse');

Route::get('/cliente/identificacion', [ClienteController::class, 'identificacion'])->name('cliente.identificacion');
Route::get('/proveedor/identificacion', [ProveedorController::class, 'identificacion'])->name('proveedor.identificacion');

Route::get('/cliente/pn/', [ClienteController::class, 'crearPn'])->name('cliente.pn');
Route::get('/cliente/pj', [ClienteController::class, 'crearPj'])->name('cliente.pj');
Route::get('/proveedor/pn', [ProveedorController::class, 'crearPn'])->name('proveedor.pn');
Route::get('/proveedor/pj', [ProveedorController::class, 'crearPj'])->name('proveedor.pj');
Route::get('/cliente/contacto/{id}', [ClienteController::class, 'contacto'])->name('cliente.contacto');
Route::get('/cliente/informacion/{id}', [ClienteController::class, 'informacion'])->name('cliente.informacion');
Route::get('/cliente/informaciont/{id}', [ClienteController::class, 'informaciont'])->name('cliente.informaciont');
Route::get('/cliente/informacionf/{id}', [ClienteController::class, 'informacionf'])->name('cliente.informacionf');
Route::get('/cliente/informacionb/{id}', [ClienteController::class, 'informacionb'])->name('cliente.informacionb');
Route::get('/actividad/{id}', [ClienteController::class, 'actividad'])->name('cliente.actividad');
Route::get('/pagare/{id}', [ClienteController::class, 'pagare'])->name('cliente.pagare');
Route::get('/declaracion/{id}', [ClienteController::class, 'declaracion'])->name('cliente.declaracion');
Route::get('/conocimiento/{id}', [ClienteController::class, 'conocimiento'])->name('cliente.conocimiento');
Route::get('/cliente/socios_accionistas/{id}', [ClienteController::class, 'socios_accionistas'])->name('clientes.socios_accionistas');
Route::get('/cliente/documentos_anexos/{id}', [ClienteController::class, 'documentos_anexos'])->name('clientes.documentos_anexos');

 //storage
Route::post('/cliente/storepn', [ClienteController::class, 'storepn'])->name('clientes.storepn');
Route::post('/cliente/storepj', [ClienteController::class, 'storepj'])->name('clientes.storepj');
Route::post('/proveedor/storepn', [ProveedorController::class, 'storepn'])->name('proveedor.storepn');
Route::post('/proveedor/storepj', [ProveedorController::class, 'storepj'])->name('proveedor.storepj');
Route::post('/cliente/storeRepresentante/{id}', [ClienteController::class,'storeRepresentante'])->name('clientes.storeRepresentante');
Route::post('/cliente/storeInformaciont/{id}', [ClienteController::class,'storeInformaciont'])->name('clientes.storeInformaciont');
Route::post('/cliente/storeInformacionf/{id}', [ClienteController::class,'storeInformacionf'])->name('clientes.storeInformacionf');
Route::post('/cliente/storeInformacionb/{id}', [ClienteController::class,'storeInformacionb'])->name('clientes.storeInformacionb');
Route::post('/cliente/storeaccionistas/{id}', [ClienteController::class,'storeaccionistas'])->name('clientes.storeaccionistas');
Route::post('/storeanexos/{id}', [DocumentosController::class,'storeanexos'])->name('storeanexos');
Route::post('/storeanexosn/{id}', [DocumentosController::class,'storeanexosn'])->name('storeanexosn');

Route::post('/storepagare/{id}', [DocumentosController::class,'storepagare'])->name('storepagare');
Route::post('/storefondo/{id}', [DocumentosController::class,'storefondo'])->name('storefondo');

Route::post('/storedeclaracion/{id}', [ClienteController::class,'storedeclaracion'])->name('storedeclaracion');
Route::post('/cliente/storeaccionistas/{id}', [ClienteController::class,'storeaccionistas'])->name('clientes.storeaccionistas');
Route::post('/cliente/storepersonaE/{id}', [ClienteController::class, 'storepersonaE'])->name('clientes.storepersonaE');
Route::post('/storecontactopn/{id}', [ClienteController::class,'storecontactopn'])->name('clientes.storecontactopn');

//admin
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/Informaciont', [AdminController::class, 'Informaciont'])->name('admin.Informaciont');
Route::get('/admin/comentario/{id}', [AdminController::class, 'comentario'])->name('admin.comentario');
Route::post('/admin/Informacionf', [AdminController::class, 'Informacionf'])->name('admin.Informacionf');
Route::post('/admin/Informacionb', [AdminController::class, 'Informacionb'])->name('admin.Informacionb');
Route::post('/admin/Informacionsocios', [AdminController::class, 'Informacionsocios'])->name('admin.Informacionsocios');
Route::post('/admin/InformacionP', [AdminController::class, 'InformacionP'])->name('admin.InformacionP');
Route::post('/admin/pagare', [AdminController::class, 'pagare'])->name('admin.pagare');
Route::get('/users/aprobarUser/{id}', [AdminController::class, 'aprobarUser'])->name('users.aprobarUser');
Route::get('/users/rechazarUser/{id}', [AdminController::class, 'rechazarUser'])->name('users.rechazarUser');
Route::get('/users/aprobarUser1/{id}', [AdminController::class, 'aprobarUser1'])->name('users.aprobarUser1');
Route::get('/users/rechazarUser1/{id}', [AdminController::class, 'rechazarUser1'])->name('users.rechazarUser1');
Route::get('/users/aprobarUser2/{id}', [AdminController::class, 'aprobarUser2'])->name('users.aprobarUser2');
Route::get('/users/rechazarUser2/{id}', [AdminController::class, 'rechazarUser2'])->name('users.rechazarUser2');
Route::get('/admin/pdf/{id}', [DocumentosController::class, 'pdf'])->name('admin.pdf');
Route::get('/admin/unirpdf/{id}', [DocumentosController::class, 'unirpdf'])->name('admin.unirpdf');

//editar

Route::put('/editpagare/{id}', [DocumentosController::class,'editpagare'])->name('editpagare');
Route::put('/editanexos/{id}', [DocumentosController::class,'editanexos'])->name('editanexos');
Route::put('/editanexosn/{id}', [DocumentosController::class,'editanexosn'])->name('editanexosn');

Route::put('/editfondo/{id}', [DocumentosController::class,'editfondo'])->name('editfondo');
Route::put('/editInformaciont/{id}', [ClienteController::class,'editInformaciont'])->name('editInformaciont');
Route::put('/editInformacionf/{id}', [ClienteController::class,'editInformacionf'])->name('editInformacionf');
Route::put('/editInformacionb/{id}', [ClienteController::class,'editInformacionb'])->name('editInformacionb');
Route::get('/cliente/perfil/{id}', [ClienteController::class,'perfil'])->name('clientes.perfil');
Route::put('/editpjp/{id}', [ProveedorController::class,'editpj'])->name('editppj');
Route::put('/editpnp/{id}', [ProveedorController::class,'editpn'])->name('editppn');
Route::put('/editRepresentante/{id}', [ClienteController::class,'editRepresentante'])->name('editRepresentante');
Route::put('/editpersonaE/{id}', [ClienteController::class,'editpersonaE'])->name('editpersonaE');
Route::put('/editcontactopn/{id}', [ClienteController::class,'editcontactopn'])->name('editcontactopn');
Route::put('/editdeclaracion/{id}', [ClienteController::class,'editdeclaracion'])->name('editdeclaracion');


Route::put('/editpn/{id}', [ClienteController::class,'editpn'])->name('editpn');
Route::put('/editarpn2', [ProveedorController::class,'editarpn2'])->name('editarpn2');
Route::put('/editarpj2', [ProveedorController::class,'editarpj2'])->name('editarpj2');
Route::put('/editpj/{id}', [ClienteController::class,'editpj'])->name('editpj');
Route::put('/editpj/{id}', [ClienteController::class,'editpj'])->name('editpj');
Route::put('/editarpj', [ClienteController::class,'editarpj'])->name('editarpj');
Route::put('/editarpn', [ClienteController::class,'editarpn'])->name('editarpn');




Route::get('/proveedor/perfil/{id}', [ProveedorController::class,'perfil'])->name('proveedor.perfil');

//eliminar
Route::delete('/accionistas/{id}', [ClienteController::class, 'destroysocio'])->name('accionistas.destroysocio');


//routas para alimentar municipios
Route::get('/listarMunicipios', [ClienteController::class, 'listarMunicipios'])->name('listarMunicipios');
Route::get('/listarpaises', [ClienteController::class, 'listarpaises'])->name('listarpaises');
Route::get('/informaciontributaria/{id}', [ClienteController::class, 'informaciontributaria'])->name('informaciontributaria');
Route::get('/pagareinf/{id}', [ClienteController::class, 'pagareinf'])->name('pagareinf');
Route::get('/perfiladicional/{id}', [ClienteController::class, 'perfiladicional'])->name('perfiladicional');
Route::get('/perfilrepresentante/{id}', [ClienteController::class, 'perfilrepresentante'])->name('perfilrepresentante');
Route::get('/declaracioninf/{id}', [ClienteController::class, 'declaracioninf'])->name('declaracioninf');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/descargar-pdf/{filename}', function ($filename) {
    $pathToFile = public_path('documentos/' . $filename);
    return response()->download($pathToFile);
});
