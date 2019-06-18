<?php
Route::get('/','FrontEndController@index');
Route::get('admin','FrontEndController@admin');
Route::resource('usuario','UsuarioController');
Route::get('municipios/{id}','UsuarioController@getMunicipios');

Route::resource('constructora','EmpresaController');
Route::resource('empresa','EmpresadqController');
Route::resource('asignacionconstructora','AsignacionConstructoraController');

//Login puto
Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
//Route::resource('login','LoginController');


Route::resource('faseuno','FaseUnoController');
Route::post('faseuno/{id}/1',['as'=>'boton1','uses'=>'FaseUnoController@boton1']);
Route::post('faseuno/{id}/2',['as'=>'boton2','uses'=>'FaseUnoController@boton2']);
Route::post('faseuno/{id}/3',['as'=>'boton3','uses'=>'FaseUnoController@boton3']);
Route::post('faseuno/{id}/4',['as'=>'boton4','uses'=>'FaseUnoController@boton4']);
Route::post('faseuno/{id}/5',['as'=>'boton5','uses'=>'FaseUnoController@boton5']);
Route::post('faseuno/{id}/6',['as'=>'boton6','uses'=>'FaseUnoController@boton6']);
Route::post('faseuno/{id}/7',['as'=>'boton7','uses'=>'FaseUnoController@boton7']);
Route::post('faseuno/{id}/8',['as'=>'boton8','uses'=>'FaseUnoController@boton8']);
Route::post('faseuno/{id}/9',['as'=>'boton9','uses'=>'FaseUnoController@boton9']);
Route::post('faseuno/{id}/10',['as'=>'boton10','uses'=>'FaseUnoController@boton10']);
Route::post('faseuno/{id}/11',['as'=>'boton11','uses'=>'FaseUnoController@boton11']);
Route::post('faseuno/{id}/12',['as'=>'boton12','uses'=>'FaseUnoController@boton12']);
Route::post('faseuno/{id}/13',['as'=>'boton13','uses'=>'FaseUnoController@boton13']);
Route::post('faseuno/{id}/14',['as'=>'boton14','uses'=>'FaseUnoController@boton14']);
Route::post('faseuno/{id}/15',['as'=>'boton15','uses'=>'FaseUnoController@boton15']);
Route::post('faseuno/{id}/16',['as'=>'boton16','uses'=>'FaseUnoController@boton16']);
Route::post('faseuno/{id}/17',['as'=>'boton17','uses'=>'FaseUnoController@boton17']);
Route::post('faseuno/{id}/18',['as'=>'boton18','uses'=>'FaseUnoController@boton18']);
Route::post('faseuno/{id}/19',['as'=>'boton19','uses'=>'FaseUnoController@boton19']);
Route::post('faseuno/{id}/20',['as'=>'boton20','uses'=>'FaseUnoController@boton20']);


Route::resource('faseuno_adq','FaseUno_adqController');
Route::post('faseuno_adq/{id}/1',['as'=>'_boton1','uses'=>'FaseUno_adqController@boton1']);
Route::post('faseuno_adq/{id}/2',['as'=>'_boton2','uses'=>'FaseUno_adqController@boton2']);
Route::post('faseuno_adq/{id}/3',['as'=>'_boton3','uses'=>'FaseUno_adqController@boton3']);
Route::post('faseuno_adq/{id}/4',['as'=>'_boton4','uses'=>'FaseUno_adqController@boton4']);
Route::post('faseuno_adq/{id}/5',['as'=>'_boton5','uses'=>'FaseUno_adqController@boton5']);
Route::post('faseuno_adq/{id}/6',['as'=>'_boton6','uses'=>'FaseUno_adqController@boton6']);
Route::post('faseuno_adq/{id}/7',['as'=>'_boton7','uses'=>'FaseUno_adqController@boton7']);
Route::post('faseuno_adq/{id}/8',['as'=>'_boton8','uses'=>'FaseUno_adqController@boton8']);
Route::post('faseuno_adq/{id}/9',['as'=>'_boton9','uses'=>'FaseUno_adqController@boton9']);
Route::post('faseuno_adq/{id}/10',['as'=>'_boton10','uses'=>'FaseUno_adqController@boton10']);
Route::post('faseuno_adq/{id}/11',['as'=>'_boton11','uses'=>'FaseUno_adqController@boton11']);
Route::post('faseuno_adq/{id}/12',['as'=>'_boton12','uses'=>'FaseUno_adqController@boton12']);
Route::post('faseuno_adq/{id}/13',['as'=>'_boton13','uses'=>'FaseUno_adqController@boton13']);
Route::post('faseuno_adq/{id}/14',['as'=>'_boton14','uses'=>'FaseUno_adqController@boton14']);
Route::post('faseuno_adq/{id}/15',['as'=>'_boton15','uses'=>'FaseUno_adqController@boton15']);
Route::post('faseuno_adq/{id}/16',['as'=>'_boton16','uses'=>'FaseUno_adqController@boton16']);
Route::post('faseuno_adq/{id}/17',['as'=>'_boton17','uses'=>'FaseUno_adqController@boton17']);
Route::post('faseuno_adq/{id}/18',['as'=>'_boton18','uses'=>'FaseUno_adqController@boton18']);
Route::post('faseuno_adq/{id}/19',['as'=>'_boton19','uses'=>'FaseUno_adqController@boton19']);
Route::post('faseuno_adq/{id}/20',['as'=>'_boton20','uses'=>'FaseUno_adqController@boton20']);



Route::resource('fase_dos_adq','fasedos_adqController');
Route::post('fase_dos_adq/{id}','FaseUno_adqController@faseuno');
Route::post('fase_dos_adq/{id}/1',['as'=>'_boton','uses'=>'FaseDos_adqController@_boton']);
Route::post('fase_dos_adq/{id}/2',['as'=>'_boton21','uses'=>'FaseDos_adqController@_boton2']);
Route::post('fase_dos_adq/{id}/3',['as'=>'_boton31','uses'=>'FaseDos_adqController@_boton3']);
Route::post('fase_dos_adq/{id}/4',['as'=>'_boton41','uses'=>'FaseDos_adqController@_boton4']);
Route::post('fase_dos_adq/{id}/5',['as'=>'_boton51','uses'=>'FaseDos_adqController@_boton5']);
Route::post('fase_dos_adq/{id}/6',['as'=>'_boton61','uses'=>'FaseDos_adqController@_boton6']);
Route::post('fase_dos_adq/{id}/7',['as'=>'_boton71','uses'=>'FaseDos_adqController@_boton7']);
Route::post('fase_dos_adq/{id}/8',['as'=>'_boton81','uses'=>'FaseDos_adqController@_boton8']);
Route::post('fase_dos_adq/{id}/9',['as'=>'_boton91','uses'=>'FaseDos_adqController@_boton9']);
Route::post('fase_dos_adq/{id}/10',['as'=>'_boton101','uses'=>'FaseDos_adqController@_boton10']);
Route::post('fase_dos_adq/{id}/11',['as'=>'_boton111','uses'=>'FaseDos_adqController@_boton11']);

Route::resource('fasedos','FaseDosController');
Route::post('fasedos/{id}','FaseUno_adqController@faseuno');
Route::post('fasedos/{id}/1',['as'=>'boton','uses'=>'FaseDosController@boton']);
Route::post('fasedos/{id}/2',['as'=>'boton21','uses'=>'FaseDosController@boton2']);
Route::post('fasedos/{id}/3',['as'=>'boton31','uses'=>'FaseDosController@boton3']);
Route::post('fasedos/{id}/4',['as'=>'boton41','uses'=>'FaseDosController@boton4']);
Route::post('fasedos/{id}/5',['as'=>'boton51','uses'=>'FaseDosController@boton5']);
Route::post('fasedos/{id}/6',['as'=>'boton61','uses'=>'FaseDosController@boton6']);
Route::post('fasedos/{id}/7',['as'=>'boton71','uses'=>'FaseDosController@boton7']);
Route::post('fasedos/{id}/8',['as'=>'boton81','uses'=>'FaseDosController@boton8']);
Route::post('fasedos/{id}/9',['as'=>'boton91','uses'=>'FaseDosController@boton9']);
Route::post('fasedos/{id}/10',['as'=>'boton101','uses'=>'FaseDosController@boton10']);
Route::post('fasedos/{id}/11',['as'=>'boton111','uses'=>'FaseDosController@boton11']);



Route::resource('fasetres_adq', 'FaseTres_adqController');
Route::post('fasetres_adq/{id}/1',['as'=>'_boto1','uses'=>'FaseTres_adqController@_boto1']);
Route::post('fasetres_adq/{id}/2',['as'=>'_boto2','uses'=>'FaseTres_adqController@_boto2']);
Route::post('fasetres_adq/{id}/3',['as'=>'_boto3','uses'=>'FaseTres_adqController@_boto3']);
Route::post('fasetres_adq/{id}/4',['as'=>'_boto4','uses'=>'FaseTres_adqController@_boto4']);
Route::post('fasetres_adq/{id}/5',['as'=>'_boto5','uses'=>'FaseTres_adqController@_boto5']);
Route::post('fasetres_adq/{id}/6',['as'=>'_boto6','uses'=>'FaseTres_adqController@_boto6']);
Route::post('fasetres_adq/{id}/7',['as'=>'_boto7','uses'=>'FaseTres_adqController@_boto7']);
Route::post('fasetres_adq/{id}/8',['as'=>'_boto8','uses'=>'FaseTres_adqController@_boto8']);
Route::post('fasetres_adq/{id}/9',['as'=>'_boto9','uses'=>'FaseTres_adqController@_boto9']);
Route::post('fasetres_adq/{id}/10',['as'=>'_boto10','uses'=>'FaseTres_adqController@_boto10']);
Route::post('fasetres_adq/{id}/11',['as'=>'_boto11','uses'=>'FaseTres_adqController@_boto11']);
Route::post('fasetres_adq/{id}/12',['as'=>'_boto12','uses'=>'FaseTres_adqController@_boto12']);
Route::post('fasetres_adq/{id}/13',['as'=>'_boto13','uses'=>'FaseTres_adqController@_boto13']);
Route::post('fasetres_adq/{id}/14',['as'=>'_boto14','uses'=>'FaseTres_adqController@_boto14']);
Route::post('fasetres_adq/{id}/15',['as'=>'_boto15','uses'=>'FaseTres_adqController@_boto15']);
Route::post('fasetres_adq/{id}/evidencia',['as'=>'_boto20','uses'=>'FaseTres_adqController@_boto20']);
Route::post('fasetres_adq/{id}/evidencia/1',['as'=>'_boto16','uses'=>'FaseTres_adqController@_boto16']);
Route::resource('fasetres_adq/{id}/evidencia/img', 'ImagesController');



Route::resource('fasetres', 'FaseTresController');
Route::post('fasetres/{id}/1',['as'=>'boto1','uses'=>'FaseTresController@boto1']);
Route::post('fasetres/{id}/2',['as'=>'boto2','uses'=>'FaseTresController@boto2']);
Route::post('fasetres/{id}/3',['as'=>'boto3','uses'=>'FaseTresController@boto3']);
Route::post('fasetres/{id}/4',['as'=>'boto4','uses'=>'FaseTresController@boto4']);
Route::post('fasetres/{id}/5',['as'=>'boto5','uses'=>'FaseTresController@boto5']);
Route::post('fasetres/{id}/6',['as'=>'boto6','uses'=>'FaseTresController@boto6']);
Route::post('fasetres/{id}/7',['as'=>'boto7','uses'=>'FaseTresController@boto7']);
Route::post('fasetres/{id}/8',['as'=>'boto8','uses'=>'FaseTresController@boto8']);
Route::post('fasetres/{id}/9',['as'=>'boto9','uses'=>'FaseTresController@boto9']);
Route::post('fasetres/{id}/10',['as'=>'boto10','uses'=>'FaseTresController@boto10']);
Route::post('fasetres/{id}/11',['as'=>'boto11','uses'=>'FaseTresController@boto11']);
Route::post('fasetres/{id}/12',['as'=>'boto12','uses'=>'FaseTresController@boto12']);
Route::post('fasetres/{id}/13',['as'=>'boto13','uses'=>'FaseTresController@boto13']);
Route::post('fasetres/{id}/14',['as'=>'boto14','uses'=>'FaseTresController@boto14']);
Route::post('fasetres/{id}/15',['as'=>'boto15','uses'=>'FaseTresController@boto15']);
Route::post('fasetres/{id}/evidencia',['as'=>'boto20','uses'=>'FaseTresController@boto20']);
Route::post('fasetres/{id}/evidencia/1',['as'=>'boto16','uses'=>'FaseTresController@boto16']);
Route::resource('fasetres/{id}/evidencia/img', 'ImagesController');




Route::resource('img/', 'ImagesController');



Route::resource('proyecto', 'ProyectoController');
Route::resource('adquisicion', 'AdquisicionController');



Route::resource('municipio', 'MunicipioController');
Route::get('/usuarios', 'Controlador@usuarios');
Route::get('/ato', 'Controlador@ato');
Route::get('/florencia', 'Controlador@florencia');
Route::get('/mmx', 'Controlador@mmx');
Route::get('/santa_maria', 'Controlador@santa_maria');
Route::get('/tepechitlan', 'Controlador@tepechitlan');
Route::get('/teul', 'Controlador@teul');

Route::get('/tgo', 'Controlador@tgo');
Route::get('/significado', 'Controlador@SIROPA');
Route::get('/garcia', 'Controlador@garcia');
Route::get('/funcion_publica', 'Controlador@funcion_publica');

//controlador de la vista del proyecto
Route::resource('VistaProyecto', 'VistaProyectoController');
Route::resource('VistaAdquisicion', 'VistaAdquisicionController');
Route::resource('VistaPDF', 'PDFController');
Route::resource('Zip', 'DataController');

