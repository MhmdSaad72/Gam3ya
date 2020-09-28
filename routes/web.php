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

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', 'HomeController@index')->name('dashboard');

  // Children
  Route::resource('admin/family-details', 'Admin\\FamilyDetailsController');
  // Route::patch('admin/relative-exchange/family/{id}' , 'Admin\\FamilyDetailsController@familyChecked');
  Route::post('admin/monthly-exchange/family/{id}' , 'Admin\\FamilyDetailsController@familyMonthChecked');
  Route::post('admin/relative-exchange/family/{id}' , 'Admin\\FamilyDetailsController@familyRelativeChecked');
  Route::resource('admin/children', 'Admin\\ChildrenController');
  Route::resource('admin/category', 'Admin\\CategoryController');
  Route::resource('admin/orphan-sponser', 'Admin\\OrphanSponserController');
  Route::resource('admin/monthly-exchange', 'Admin\\MonthlyExchangeController');
  Route::resource('admin/relative-exchange', 'Admin\\RelativeExchangeController');
  Route::get('admin/relative-exchange/family-details/{id}' , 'Admin\\RelativeExchangeController@familyDetails');
  Route::get('admin/monthly-exchange/family-details/{id}' , 'Admin\\MonthlyExchangeController@familyDetails');
  // check barcode with scanner
  Route::get('admin/monthly-exchange/barcodes/{id}' , 'Admin\\MonthlyExchangeController@barcodes');
  Route::post('admin/monthly-exchange/barcodes/{id}' , 'Admin\\MonthlyExchangeController@checkBarcode')->name('check.barcode');
  Route::get('admin/relative-exchange/barcodes/{id}' , 'Admin\\RelativeExchangeController@barcodes');
  Route::post('admin/relative-exchange/barcodes/{id}' , 'Admin\\RelativeExchangeController@checkBarcode')->name('check.relative.barcode');

  Route::get('admin/care-numbers', 'Admin\\CareNumbersController@index')->name('care-numbers.index');
  Route::get('admin/care-numbers/{id}', 'Admin\\CareNumbersController@show')->name('care-numbers.show');

  // routes for excel
  Route::get('admin/monthly-exchange/family/excel' , 'Admin\\MonthlyExchangeController@viewExport');
  Route::get('admin/relative-exchange/family/excel' , 'Admin\\RelativeExchangeController@viewExport');

  // Reports For Children
  Route::get('admin/males/reports' , 'Admin\\ChildrenReportsController@males')->name('reports.males');
  Route::get('admin/females/reports' , 'Admin\\ChildrenReportsController@females')->name('reports.females');
  Route::get('admin/married/reports' , 'Admin\\ChildrenReportsController@married')->name('reports.married');

  Route::resource('admin/basic', 'Admin\\BasicController');

  // routes for poor people
  Route::resource('poor-people/family-details', 'Poor\\FamilyDetailsController' ,[ 'as' => 'poor']);
  // Route::patch('poor-people/relative-exchange/family/{id}' , 'Poor\\FamilyDetailsController@familyChecked');
  Route::post('poor-people/monthly-exchange/family/{id}' , 'Poor\\FamilyDetailsController@familyMonthChecked');
  Route::post('poor-people/relative-exchange/family/{id}' , 'Poor\\FamilyDetailsController@familyRelativeChecked');
  Route::resource('poor-people/children', 'Poor\\ChildrenController' ,[ 'as' => 'poor']);
  Route::resource('poor-people/category', 'Poor\\CategoryController' ,[ 'as' => 'poor']);
  Route::resource('poor-people/orphan-sponser', 'Poor\\OrphanSponserController' ,[ 'as' => 'poor']);
  Route::resource('poor-people/monthly-exchange', 'Poor\\MonthlyExchangeController' ,[ 'as' => 'poor']);
  Route::resource('poor-people/relative-exchange', 'Poor\\RelativeExchangeController' ,[ 'as' => 'poor']);
  Route::get('poor-people/relative-exchange/family-details/{id}' , 'Poor\\RelativeExchangeController@familyDetails');
  Route::get('poor-people/monthly-exchange/barcodes/{id}' , 'Poor\\MonthlyExchangeController@barcodes');
  Route::get('poor-people/monthly-exchange/family-details/{id}' , 'Poor\\MonthlyExchangeController@familyDetails');
  Route::get('poor-people/care-numbers', 'Admin\\CareNumbersController@poorIndex')->name('poor.care-numbers.index');
  Route::get('poor-people/care-numbers/{id}', 'Admin\\CareNumbersController@poorShow')->name('poor.care-numbers.show');

  Route::get('poor-people/monthly-exchange/family/excel' , 'Poor\\MonthlyExchangeController@viewExport');
  Route::get('poor-people/relative-exchange/family/excel' , 'Poor\\RelativeExchangeController@viewExport');

  // check barcode with scanner
  Route::get('poor-people/monthly-exchange/barcodes/{id}' , 'Poor\\MonthlyExchangeController@barcodes');
  Route::post('poor-people/monthly-exchange/barcodes/{id}' , 'Poor\\MonthlyExchangeController@checkBarcode')->name('poor.check.barcode');
  Route::get('poor-people/relative-exchange/barcodes/{id}' , 'Poor\\RelativeExchangeController@barcodes');
  Route::post('poor-people/relative-exchange/barcodes/{id}' , 'Poor\\RelativeExchangeController@checkBarcode')->name('poor.check.relative.barcode');

  // Reports For Children
  Route::get('poor-people/males/reports' , 'Poor\\ChildrenReportsController@males')->name('poor.reports.males');
  Route::get('poor-people/females/reports' , 'Poor\\ChildrenReportsController@females')->name('poor.reports.females');
  Route::get('poor-people/married/reports' , 'Poor\\ChildrenReportsController@married')->name('poor.reports.married');

  Route::resource('poor-people/basic', 'Poor\\BasicController',[ 'as' => 'poor']);

  // Barcode
  Route::get('admin/care-numbers/image/{id}','Admin\\CareNumbersController@makeImage')->name('image');
  Route::get('poor-people/care-numbers/image/{id}','Admin\\CareNumbersController@makeImage2')->name('image_2');

  // Mosques
  Route::resource('mosque/mosque', 'Mosque\\MosqueController');
  Route::resource('mosque/worker', 'Mosque\\WorkerController');
  Route::resource('mosque/incoming', 'Mosque\\IncomingController');
  Route::resource('mosque/cost', 'Mosque\\CostController');

  // Girls' Marriage
  Route::resource('girls-marriage/girls', 'Girls\\GirlsController');
  Route::get('girls-marriage/purchase/create/{id}' , 'Girls\\PurchaseController@create')->name('purchase.create');
  Route::post('girls-marriage/purchase/create/{id}' , 'Girls\\PurchaseController@store')->name('purchase.store');
  Route::get('girls-marriage/purchase/{id}/edit' , 'Girls\\PurchaseController@edit')->name('purchase.edit');
  Route::patch('girls-marriage/purchase/{id}/edit' , 'Girls\\PurchaseController@update')->name('purchase.update');
  Route::get('girls-marriage/purchase/{id}' , 'Girls\\PurchaseController@show')->name('purchase.show');

  // Treatment
  Route::resource('treatment/treatment', 'Treatment\\TreatmentController');
  Route::resource('treatment/donation', 'Treatment\\DonationController');

  // Disabled
  Route::resource('disabled/family-details', 'Disabled\\FamilyDetailsController' ,[ 'as' => 'disabled']);
  Route::post('disabled/monthly-exchange/family/{id}' , 'Disabled\\FamilyDetailsController@familyMonthChecked');
  Route::post('disabled/relative-exchange/family/{id}' , 'Disabled\\FamilyDetailsController@familyRelativeChecked');
  Route::resource('disabled/children', 'Disabled\\ChildrenController' ,[ 'as' => 'disabled']);
  Route::resource('disabled/category', 'Disabled\\CategoryController' ,[ 'as' => 'disabled']);
  Route::resource('disabled/orphan-sponser', 'Disabled\\OrphanSponserController' ,[ 'as' => 'disabled']);
  Route::resource('disabled/monthly-exchange', 'Disabled\\MonthlyExchangeController' ,[ 'as' => 'disabled']);
  Route::resource('disabled/relative-exchange', 'Disabled\\RelativeExchangeController' ,[ 'as' => 'disabled']);
  Route::get('disabled/relative-exchange/family-details/{id}' , 'Disabled\\RelativeExchangeController@familyDetails');
  Route::get('disabled/monthly-exchange/barcodes/{id}' , 'Disabled\\MonthlyExchangeController@barcodes');
  Route::get('disabled/monthly-exchange/family-details/{id}' , 'Disabled\\MonthlyExchangeController@familyDetails');
  Route::resource('disabled/basic', 'Disabled\\BasicController',[ 'as' => 'disabled']);
  Route::get('disabled/care-numbers', 'Disabled\\CareNumbersController@index')->name('disabled.care-numbers.index');
  Route::get('disabled/care-numbers/{id}', 'Disabled\\CareNumbersController@show')->name('disabled.care-numbers.show');
  Route::resource('disabled/orphan-sponser', 'Disabled\\OrphanSponserController' ,[ 'as' => 'disabled']);
  Route::get('disabled/males/reports' , 'Disabled\\ChildrenReportsController@males')->name('disabled.reports.males');
  Route::get('disabled/females/reports' , 'Disabled\\ChildrenReportsController@females')->name('disabled.reports.females');
  Route::get('disabled/married/reports' , 'Disabled\\ChildrenReportsController@married')->name('disabled.reports.married');
  Route::get('disabled/monthly-exchange/barcodes/{id}' , 'Disabled\\MonthlyExchangeController@barcodes');
  Route::post('disabled/monthly-exchange/barcodes/{id}' , 'Disabled\\MonthlyExchangeController@checkBarcode')->name('disabled.check.barcode');
  Route::get('disabled/relative-exchange/barcodes/{id}' , 'Disabled\\RelativeExchangeController@barcodes');
  Route::post('disabled/relative-exchange/barcodes/{id}' , 'Disabled\\RelativeExchangeController@checkBarcode')->name('disabled.check.relative.barcode');
  Route::get('disabled/monthly-exchange/family/excel' , 'Disabled\\MonthlyExchangeController@viewExport');
  Route::get('disabled/relative-exchange/family/excel' , 'Disabled\\RelativeExchangeController@viewExport');
  Route::resource('disabled/disabled', 'Disabled\\DisabledController');

  // Students
  Route::resource('student/student', 'Student\\StudentController');
  Route::resource('student/relative-exchange', 'Student\\RelativeExchangeController',[ 'as' => 'student']);

  // Table
  Route::resource('table/income', 'Table\\IncomeController');
  Route::resource('table/outcome', 'Table\\OutcomeController');

  // Quran Memorization
  Route::resource('quran-memorization/teacher', 'QuranMemorization\\TeacherController');
  Route::resource('quran-memorization/boy', 'QuranMemorization\\BoyController');
  Route::get('quran-memorization/teacher/{id}/dates' , 'QuranMemorization\\TeacherController@view_dates')->name('teacher.dates');
  Route::post('quran-memorization/teacher/{id}/dates' , 'QuranMemorization\\TeacherController@store_dates');
  Route::get('quran-memorization/teacher/dates/{id}/edit' , 'QuranMemorization\\TeacherController@dates')->name('edit.dates');
  Route::get('quran-memorization/dates/{id}/edit' , 'QuranMemorization\\TeacherController@show_date')->name('update.dates');
  Route::patch('quran-memorization/dates/{id}/edit' , 'QuranMemorization\\TeacherController@update_date')->name('update.dates');
  Route::delete('quran-memorization/dates/{id}' , 'QuranMemorization\\TeacherController@destroy_date')->name('destroy.date');

  // Medical Center
  Route::resource('medical-center/devices-donations', 'MedicalCenter\\DeviceDonationController');
  Route::resource('medical-center/money-donations', 'MedicalCenter\\MonyDonationController');
  Route::resource('medical-center/employee', 'MedicalCenter\\EmployeeController');
  Route::resource('medical-center/doctor', 'MedicalCenter\\DoctorController');
  Route::get('medical-center/tools', 'MedicalCenter\\CostController@index_tools' )->name('tools.index');
  Route::post('medical-center/tools', 'MedicalCenter\\CostController@store_tools' )->name('tools.store');
  Route::get('medical-center/tools/create', 'MedicalCenter\\CostController@create_tools' )->name('tools.create');
  Route::get('medical-center/tools/{id}', 'MedicalCenter\\CostController@show_tools' )->name('tools.show');
  Route::delete('medical-center/tools/{id}', 'MedicalCenter\\CostController@destroy_tools' )->name('tools.destroy');
  Route::get('medical-center/tools/{id}/edit', 'MedicalCenter\\CostController@edit_tools' )->name('tools.edit');
  Route::patch('medical-center/tools/{id}/edit', 'MedicalCenter\\CostController@update_tools' )->name('tools.update');
  Route::get('medical-center/doctor-salary', 'MedicalCenter\\CostController@index_salary' )->name('doctor-salary.index');
  Route::post('medical-center/doctor-salary', 'MedicalCenter\\CostController@store_salary' )->name('doctor-salary.store');
  Route::get('medical-center/doctor-salary/create', 'MedicalCenter\\CostController@create_salary' )->name('doctor-salary.create');
  Route::get('medical-center/doctor-salary/{id}', 'MedicalCenter\\CostController@show_salary' )->name('doctor-salary.show');
  Route::delete('medical-center/doctor-salary/{id}', 'MedicalCenter\\CostController@destroy_salary' )->name('doctor-salary.destroy');
  Route::get('medical-center/doctor-salary/{id}/edit', 'MedicalCenter\\CostController@edit_salary' )->name('doctor-salary.edit');
  Route::patch('medical-center/doctor-salary/{id}/edit', 'MedicalCenter\\CostController@update_salary' )->name('doctor-salary.update');
  Route::get('medical-center/dates/{id}' , 'MedicalCenter\\DoctorController@view_dates')->name('doctor.dates');
  Route::post('medical-center/dates/{id}' , 'MedicalCenter\\DoctorController@store_dates');
  Route::get('medical-center/{id}/dates' , 'MedicalCenter\\DoctorController@dates')->name('doctor.all.dates');
  Route::get('medical-center/dates/{id}/edit' , 'MedicalCenter\\DoctorController@edit_dates')->name('doctor.update.dates');
  Route::patch('medical-center/dates/{id}/edit' , 'MedicalCenter\\DoctorController@update_date');
  Route::delete('medical-center/destroy/dates/{id}' , 'MedicalCenter\\DoctorController@destroy_date')->name('doctor.destroy.date');
  Route::resource('medical-center/device', 'MedicalCenter\\DeviceController');

  // Nursery Incomes
  Route::get('nursery/nursery-accounts', 'Nursery\\IncomeController@index_accounts' )->name('nursery-accounts.index');
  Route::post('nursery/nursery-accounts', 'Nursery\\IncomeController@store_accounts' )->name('nursery-accounts.store');
  Route::get('nursery/nursery-accounts/create', 'Nursery\\IncomeController@create_accounts' )->name('nursery-accounts.create');
  Route::get('nursery/nursery-accounts/{id}', 'Nursery\\IncomeController@show_accounts' )->name('nursery-accounts.show');
  Route::delete('nursery/nursery-accounts/{id}', 'Nursery\\IncomeController@destroy_accounts' )->name('nursery-accounts.destroy');
  Route::get('nursery/nursery-accounts/{id}/edit', 'Nursery\\IncomeController@edit_accounts' )->name('nursery-accounts.edit');
  Route::patch('nursery/nursery-accounts/{id}/edit', 'Nursery\\IncomeController@update_accounts' )->name('nursery-accounts.update');
  Route::get('nursery/nursery-donnations', 'Nursery\\IncomeController@index_donnations' )->name('nursery-donnations.index');
  Route::post('nursery/nursery-donnations', 'Nursery\\IncomeController@store_donnations' )->name('nursery-donnations.store');
  Route::get('nursery/nursery-donnations/create', 'Nursery\\IncomeController@create_donnations' )->name('nursery-donnations.create');
  Route::get('nursery/nursery-donnations/{id}', 'Nursery\\IncomeController@show_donnations' )->name('nursery-donnations.show');
  Route::delete('nursery/nursery-donnations/{id}', 'Nursery\\IncomeController@destroy_donnations' )->name('nursery-donnations.destroy');
  Route::get('nursery/nursery-donnations/{id}/edit', 'Nursery\\IncomeController@edit_donnations' )->name('nursery-donnations.edit');
  Route::patch('nursery/nursery-donnations/{id}/edit', 'Nursery\\IncomeController@update_donnations' )->name('nursery-donnations.update');

  // Nursery Outcomes
  Route::get('nursery/nursery-salaries', 'Nursery\\OutcomeController@index_salaries' )->name('nursery-salaries.index');
  Route::post('nursery/nursery-salaries', 'Nursery\\OutcomeController@store_salaries' )->name('nursery-salaries.store');
  Route::get('nursery/nursery-salaries/create', 'Nursery\\OutcomeController@create_salaries' )->name('nursery-salaries.create');
  Route::get('nursery/nursery-salaries/{id}', 'Nursery\\OutcomeController@show_salaries' )->name('nursery-salaries.show');
  Route::delete('nursery/nursery-salaries/{id}', 'Nursery\\OutcomeController@destroy_salaries' )->name('nursery-salaries.destroy');
  Route::get('nursery/nursery-salaries/{id}/edit', 'Nursery\\OutcomeController@edit_salaries' )->name('nursery-salaries.edit');
  Route::patch('nursery/nursery-salaries/{id}/edit', 'Nursery\\OutcomeController@update_salaries' )->name('nursery-salaries.update');
  Route::get('nursery/nursery-expenses', 'Nursery\\OutcomeController@index_expenses' )->name('nursery-expenses.index');
  Route::post('nursery/nursery-expenses', 'Nursery\\OutcomeController@store_expenses' )->name('nursery-expenses.store');
  Route::get('nursery/nursery-expenses/create', 'Nursery\\OutcomeController@create_expenses' )->name('nursery-expenses.create');
  Route::get('nursery/nursery-expenses/{id}', 'Nursery\\OutcomeController@show_expenses' )->name('nursery-expenses.show');
  Route::delete('nursery/nursery-expenses/{id}', 'Nursery\\OutcomeController@destroy_expenses' )->name('nursery-expenses.destroy');
  Route::get('nursery/nursery-expenses/{id}/edit', 'Nursery\\OutcomeController@edit_expenses' )->name('nursery-expenses.edit');
  Route::patch('nursery/nursery-expenses/{id}/edit', 'Nursery\\OutcomeController@update_expenses' )->name('nursery-expenses.update');

  // Route::resource('nursery/outcome', 'Nursery\\OutcomeController' , ['as' => 'nursery']);
  Route::resource('nursery/employee', 'Nursery\\EmployeeController' , ['as' => 'nursery']);
  Route::resource('nursery/children', 'Nursery\\ChildrenController' , ['as' => 'nursery']);

});

Auth::routes();
