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


Auth::routes();


/*--program builder--*/


Route::get('/register/pt', array(
    'as' => 'pt_register',
    'uses' => 'Auth\RegisterController@ptRegisterIndex'
));

Route::post('/register/pt', 'Auth\RegisterController@ptRegister');
Route::get('/', function () {
    if(Auth::guest())
    {
        return view('welcome');
    }
    else
    {
        if(Auth::user()->user_type == 0)
        {
            return redirect('/finder');
        }
        else
        {
            return redirect('/dashboard');
        }
    }
});

Route::group(['middleware' => 'App\Http\Middleware\STMiddleware'], function()
{
    Route::post('/purchaseprogram', 'FinderController@PurchaseIndex');
    Route::post('/purchasefinish', 'FinderController@PurchaseFinish');
    Route::get('/finder', 'FinderController@Index');
    Route::get('/finder/workout', 'FinderController@WorkoutIndex');
    Route::get('/finder/nutrition', 'FinderController@NutritionIndex');
    Route::get('/finder/infodoc', 'FinderController@InfodocIndex');
});

Route::group(['middleware' => 'App\Http\Middleware\PTMiddleware'], function()
{
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/accountsetting', 'DashboardController@showaccountsettings');
    Route::get('/clientoverview', 'DashboardController@showclientoverview');
    Route::get('/myprograms', 'DashboardController@showmyprograms');
    Route::post('/myprograms', 'ProgrambuilderController@getProgramList');
    Route::get('/signuplist', 'DashboardController@showsignuplist');

    Route::post('/changepassword', 'AccountController@changePassword');
    Route::post('/changebilling', 'AccountController@changeBilling');
    Route::post('/changecontact', 'AccountController@changeContact');
    Route::post('/downgrade', 'AccountController@Downgrade');
    Route::get('/userdetail', 'AccountController@userdetailIndex');

    Route::group(['prefix' => 'programbuilder'], function () {
        Route::get('/', 'ProgrambuilderController@ProgramBuilderIndex');
        Route::get('/{programtype}', 'ProgrambuilderController@NewProgramIndex');
        Route::post('/{programtype}', 'ProgrambuilderController@CreateProgram');

        Route::group(['middleware' => 'App\Http\Middleware\PTProgramMiddleware'], function()
        {
            Route::get('/{programtype}/edit', 'ProgrambuilderController@ViewProgram');

            Route::group(['prefix' => '/{programtype}/{userid}/{programid}'], function () {
                Route::get('/', 'ProgrambuilderController@EditProgram');
                Route::post('/', 'ProgrambuilderController@UpdateProgram');
                Route::get('/edit', 'ProgrambuilderController@EditIndex');
                Route::get('/view', 'ProgrambuilderController@ViewProgramDetailIndex');
                Route::post('/finish', 'ProgrambuilderController@FinishProgramBuildIndex');
                Route::post('/publish', 'ProgrambuilderController@PublishProgram');
                Route::post('/delete', 'ProgrambuilderController@DeleteProgram');
                Route::get('/data', 'WorkoutController@getWorkouts');
                Route::post('/data', 'WorkoutController@addWorkout');
                Route::post('/savesetinfo', 'WorkoutController@saveSetContent');
                Route::post('/savedoc', 'WorkoutController@saveDocContent');
                Route::delete('/data', 'WorkoutController@deleteWorkout');
                Route::put('/data', 'WorkoutController@updateWorkout');
            });
        });
    });
});