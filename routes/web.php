<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DepartamentoEmpleadoController;
use App\Http\Controllers\IndexController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Ruta de la pagina de inicio
Route::get('/', [IndexController::class,'inicio'])->name('inicio');

//Ruta general donde se encuentra la pagina principal
Route::get('/empleados', [IndexController::class,'empleados'])->name('empleados');
Route::get('/departamentos', [IndexController::class,'departamentos'])->name('departamentos');
Route::get('/departamentos_empleados', [IndexController::class,'departamentos_empleados'])->name('departamentos_empleados');


/*
*   Rutas de todos los empleados
*/  //Ruta para ver a todos empleados
    Route::get('/empleados/todos_los_empleados', [EmpleadoController::class,'ver_empleados'])->name('ver_empleados');
    Route::get('/empleados/getEmpleados', [EmpleadoController::class,'getEmpleados'])->name('getEmpleados');

    //Ruta para ver un empleado
    Route::get('/empleados/ver_empleado', [EmpleadoController::class,'ver_empleado'])->name('ver_empleado');
    Route::get('/empleados/ver_empleado/{id}', [EmpleadoController::class,'getEmpleado']);

    //Ruta para crear un empleado
    Route::get('/empleados/crear_empleado', [EmpleadoController::class,'crear_empleado'])->name('crear_empleado');
    Route::post('/empleados/setEmpleado', [EmpleadoController::class,'setEmpleado']);

    //Ruta para editar un empleado
    Route::get('/empleados/editar_empleado', [EmpleadoController::class,'editar_empleado'])->name('editar_empleado');
    Route::put('/empleados/editar_empleado/{id}', [EmpleadoController::class,'updateEmpleado']);

    //Ruta para eliminar un empleado
    Route::get('/empleados/eliminar_empleado', [EmpleadoController::class,'eliminar_empleado'])->name('eliminar_empleado');
    Route::delete('/empleados/eliminar_empleado/{id}', [EmpleadoController::class,'deleteEmpleado']);
/*
*   Rutas de todos los departamentos
*/
    //Ruta para ver a todos departamentos
    Route::get('/departementos/todos_los_departamentos', [DepartamentoController::class,'ver_departamentos'])->name('ver_departamentos');
    Route::get('/departementos/getDepartamentos', [DepartamentoController::class,'getDepartamentos'])->name('getDepartamentos');

    //Ruta para ver un departamentos
    Route::get('/departementos/ver_departamento', [DepartamentoController::class,'ver_departamento'])->name('ver_departamento');
    Route::get('/departementos/ver_departamento/{id}', [DepartamentoController::class,'getDepartamento']);

    //Ruta para crear un departamentos
    Route::get('/departementos/crear_departamento', [DepartamentoController::class,'crear_departamento'])->name('crear_departamento');
    Route::post('/departementos/setDepartamento', [DepartamentoController::class,'setDepartamento']);

    //Ruta para editar un departamentos
    Route::get('/departementos/editar_departamento', [DepartamentoController::class,'editar_departamento'])->name('editar_departamento');
    Route::put('/departementos/updateDepartamento', [DepartamentoController::class,'updateDepartamento']);

    //Ruta para eliminar un departamentos
    Route::get('/departementos/eliminar_departamento', [DepartamentoController::class,'eliminar_departamento'])->name('eliminar_departamento');
    Route::delete('/departementos/deleteDepartamento', [DepartamentoController::class,'deleteDepartamento']);


/*
*   Rutas para todos los empleados que pertenecen a departamentos 
*/
    //Ruta para ver todos los empleados que pertenecen a un departamento
    Route::get('/departamentos/empleados/ver_empleados_departamentos',[DepartamentoEmpleadoController::class,'ver_empleados_departamentos'])->name('ver_empleados_departamentos');
    Route::get('/departamentos/empleados/getDepartamentosEmpleados', [DepartamentoEmpleadoController::class,'getDepartamentosEmpleados']);

    //Ruta para ver un empleado que pertenece a un departamento
    Route::get('/departamentos/empleados/ver_empleado_departamento',[DepartamentoEmpleadoController::class, 'ver_empleado_departamento'])->name('ver_empleado_departamento');
    Route::get('/departamentos/empleados/ver_empleado_departamento/{id}',[DepartamentoEmpleadoController::class, 'getEmpleadoDepartamento']);

    //Ruta para asignar un empleado que pertenecezca a un departamento
    Route::get('/departamentos/empleados/crear_empleado_departamento',[DepartamentoEmpleadoController::class, 'crear_empleado_departamento'])->name('crear_empleado_departamento');
    Route::post('/departamentos/empleados/setDepartamentoEmpleado',[DepartamentoEmpleadoController::class, 'setEmpleadoDepartamento']);

    //Ruta para actualizar un empleado que pertenecezca a un departamento
    Route::get('/departamentos/empleados/editar_empleado_departamento',[DepartamentoEmpleadoController::class, 'editar_empleado_departamento'])->name('editar_empleado_departamento');
    Route::put('/departamentos/empleados/updateEmpleadoDepartamento/{id}',[DepartamentoEmpleadoController::class,'updateEmpleadoDepartamentos']);

    //Ruta para eliminar un empleado que pertenezca a un departamento
    Route::get('/departamentos/empleados/eliminar_empleado_departamento',[DepartamentoEmpleadoController::class, 'eliminar_empleado_departamento'])->name('eliminar_empleado_departamento');
    Route::delete('/departamentos/empleados/deleteEmpleadoDepartamento',[DepartamentoEmpleadoController::class, 'deleteEmpleadoDepartamento']);