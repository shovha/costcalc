<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/excel',function(){

	$arr = [
			['name'=>'a',
			'roll'=>1],
			['name'=>'b',
			'roll'=>2]
		];

	Excel::create('Filename', function($excel) use($arr) {

    // Set the title
    $excel->setTitle('Our new awesome title');

    // Chain the setters
    $excel->setCreator('Maatwebsite')
          ->setCompany('Maatwebsite');

    // Call them separately
    $excel->setDescription('A demonstration to change the file properties');

    
	 $excel->sheet('Sheetname', function($sheet) use($arr) {

        $sheet->fromArray($arr);

    });    


	})->export('xls');
});
