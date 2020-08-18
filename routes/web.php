<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    //return view('welcome');

    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


//(1) Employee routes starts here---------------------------------------------------
Route::get('/add-employee', 'EmployeeController@AddEmployee')->name('add.employee');
Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');
Route::post('/insert-employee','EmployeeController@StoreEmployeeData');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}','EmployeeController@UpdateEmployeeData');
//(1) Employee routes ends here-----------------------------------------------------



//(2) Customers routes starts here----------------------------------------------------
Route::get('/add-customers', 'CustomerController@AddCustomer')->name('add.customers');
Route::get('/all-customers', 'CustomerController@AllCustomer')->name('all.customers');
Route::post('/insert-customer', 'CustomerController@StoreCustomerData');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}','CustomerController@UpdateCustomer');
//(2) Customers routes ends here------------------------------------------------------



//(3) Suppliers routes starts here----------------------------------------------------
Route::get('/add-suppliers', 'SupplierController@AddSupplier')->name('add.suppliers');
Route::get('/all-suppliers', 'SupplierController@AllSupplier')->name('all.suppliers');
Route::post('/insert-supplier', 'SupplierController@StoreSupplierData');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}','SupplierController@UpdateSupplier');
//(3) Suppliers routes ends here------------------------------------------------------



//(4)Advance Salaries[Employee] routes starts here---------------------------------------------------
Route::get('/advance-salary', 'SalaryController@AddAdvanceEmployeeSalary')->name('advance.salaries');
Route::get('/all-advancesalary', 'SalaryController@AllAdvanceSalary')->name('all.advancesalaries');
Route::post('/insert-advancesalary', 'SalaryController@InsertAdvanceSalary');
//(4) Salaries[Employee]  routes ends here-----------------------------------------------------------


//(5)Category routes starts here---------------------------------------------------------
Route::get('/add-category', 'CategoryController@AddCategory')->name('add.categories');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.categories');
Route::post('/insert-category', 'CategoryController@InsertCategory');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');
//(5)Category routes ends here---------------------------------------------------------


//(6)Product routes starts here---------------------------------------------------------
Route::get('/add-product', 'ProductController@AddProduct')->name('add.products');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.products');
Route::post('/insert-product', 'ProductController@InsertProduct');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');
//(6)Product routes ends here---------------------------------------------------------


//(7)Pay salary[Employee] routes starts here---------------------------------------------------------

Route::get('/pay-salary', 'PaysalaryController@PaySalary')->name('pay.salaries');


//(7)Pay salary[Employee] routes starts here---------------------------------------------------------


//(8)Expense routes starts here----------------------------------------------------------------------
Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-todayexpense/{id}', 'ExpenseController@UpdateTodayExpense');
Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpenseController@YearlyExpense')->name('yearly.expense');

//All month show starts--------------------------------------------
Route::get('/january-expense', 'ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense', 'ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense', 'ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense', 'ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense', 'ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense', 'ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense', 'ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense', 'ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense', 'ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense', 'ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense', 'ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense', 'ExpenseController@DecemberExpense')->name('december.expense');
//All mmonth show ends------------------------------------------------

//(8)Expense routes ends here-----------------------------------------------------------------------

//(9)Attendence routes starts here---------------------------------------------------------------------
Route::get('/all-attendence', 'AttendenceController@AllAttendence')->name('all.attendence');
Route::get('/take-attendence', 'AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence', 'AttendenceController@InsertAttendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@EditAttendence');
Route::post('/update-attendence', 'AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{edit_date}', 'AttendenceController@ViewAttendence');
//(9)Attendence routes ends here---------------------------------------------------------------------


//(10)Setting routes starts here-----------------------------------------------------------------------
Route::get('/website-setting', 'SettingController@Setting')->name('website.setting');
Route::post('/update-setting/{id}', 'SettingController@UpdateSettig');
//(10)Setting routes ends here-------------------------------------------------------------------------


//(11)Pos routes starts here-----------------------------------------------------------------------
Route::get('/pos', 'PosController@PosIndex')->name('pos');

//(11)Pos routes ends here-------------------------------------------------------------------------



//(12)Cart routes starts here-----------------------------------------------------------------------
Route::post('/cart-add', 'CartController@cartAdd');
Route::post('/cart-update/{rowId}', 'CartController@cartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@cartRemove');
//Invoice
Route::post('/create-invoice', 'CartController@CreateInvoice');
Route::post('/fianl-invoice', 'CartController@FinalInvoice');

//(12)Cart routes ends here-------------------------------------------------------------------------