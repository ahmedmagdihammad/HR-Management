<?php

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['prefix'=>'{lang}'], function(){
	Route::get('home', 'Frontend\\HomeController@index')->name('home');
	Route::get('about', 'Frontend\\HomeController@about')->name('about');
	Route::get('services', 'Frontend\\HomeController@services')->name('services');
	Route::get('contact', 'Frontend\\HomeController@contact')->name('contact');
});

Route::get('/prints', function () {
    return view('print');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'Admin\\DashboardController@index')->name('dashboard');

	// Route Adminstration/Branch
		Route::get('/branches', 'Admin\Adminstration\BranchController@index')->name('branch');
		Route::post('/branch/store', 'Admin\Adminstration\BranchController@store')->name('branch.store');
		Route::post('/branch/{id}/edit', 'Admin\Adminstration\BranchController@update')->name('branch.edit');
		Route::post('/branch/{id}/delete', 'Admin\Adminstration\BranchController@destroy')->name('branch.delete');

	// Route Company/Company
		Route::get('/companies', 'Admin\Companies\CompanyController@index')->name('company');
		Route::post('/company/store', 'Admin\Companies\CompanyController@store')->name('company.store');
		Route::post('/company/{id}/edit', 'Admin\Companies\CompanyController@update')->name('company.edit');
		Route::post('/company/{id}/delete', 'Admin\Companies\CompanyController@destroy')->name('company.delete');
	
	// Route Company/Company/Service
		Route::get('/companies/customer', 'Admin\Companies\ServiceCompController@index')->name('companies.customer');
		Route::post('/getCustomerComp', 'Admin\Companies\ServiceCompController@getCustomerComp')->name('getCustomerComp');
		Route::get('/companies/customer/{id}/service', 'Admin\Companies\ServiceCompController@indexService')->name('service');
		Route::post('/companies/customer/service/store', 'Admin\Companies\ServiceCompController@store')->name('service.store');
		Route::post('/companies/customer/service/{id}/edit', 'Admin\Companies\ServiceCompController@update')->name('service.edit');
		Route::post('/companies/customer/service/{id}/delete', 'Admin\Companies\ServiceCompController@destroy')->name('service.delete');

	// Route Company/Company/Family
		Route::get('customer/family/{id}', 'Admin\CustManager\FamilyController@index')->name('family');
		Route::post('customer/family/store', 'Admin\CustManager\FamilyController@store')->name('family.store');
		Route::post('customer/family/{id}/edit', 'Admin\CustManager\FamilyController@update')->name('family.edit');
		Route::post('customer/family/{id}/delete', 'Admin\CustManager\FamilyController@destroy')->name('family.delete');

	// Route Company/Company/Profile
		Route::get('/company/profile/{id}', 'Admin\Companies\ProfileCompController@index')->name('profileComp');

	// Route Setting/Commission
		Route::get('/commissions', 'Admin\Setting\CommissionController@index')->name('commission');
		Route::post('/commission/store', 'Admin\Setting\CommissionController@store')->name('commission.store');
		Route::post('/commission/{id}/edit', 'Admin\Setting\CommissionController@update')->name('commission.edit');
		Route::post('/commission/{id}/delete', 'Admin\Setting\CommissionController@destroy')->name('commission.delete');

	// Route Setting/corprat Name
		Route::get('corporate_name', 'Admin\Setting\CorpNameController@index')->name('corp_name');
		Route::post('corporate_name/store', 'Admin\Setting\CorpNameController@store')->name('corp_name.store');
		Route::post('corporate_name/{id}/edit', 'Admin\Setting\CorpNameController@update')->name('corp_name.edit');
		Route::post('corporate_name/{id}/delete', 'Admin\Setting\CorpNameController@destroy')->name('corp_name.delete');

	// Route Report/allSalary
		Route::get('/salaries', 'Admin\Report\SalaryesController@index')->name('salaries');

	// Route Report/allCommission
		Route::get('allCommission', 'Admin\Report\allCommissionController@index')->name('allCommission');

	// Route Report/First and Scond Setting
		Route::get('/firstSecond', 'Admin\Setting\FisrtScondController@index')->name('firstSecond');
		Route::post('/firstSecond/store', 'Admin\Setting\FisrtScondController@store')->name('firstSecond.store');
		Route::post('/firstSecond/{id}/edit', 'Admin\Setting\FisrtScondController@update')->name('firstSecond.edit');
		Route::post('/firstSecond/{id}/delete', 'Admin\Setting\FisrtScondController@destroy')->name('firstSecond.delete');

	// Route Report/First Line and second line and out of line
		Route::get('/firstLine', 'Admin\Setting\FisrtController@firstLine')->name('firstLine');
		Route::get('/firstLine/{id}/edit', 'Admin\Setting\FisrtController@firstLineEdit')->name('firstLine.edit');
		Route::get('/secondtLine', 'Admin\Setting\FisrtController@secondtLine')->name('secondtLine');
		Route::get('/outPayment', 'Admin\Setting\FisrtController@outPayment')->name('outPayment');

	// Route Customers Manager/customer
		Route::get('/customer', 'Admin\CustManager\CustomerController@index')->name('customer');
		Route::post('/customer/store', 'Admin\CustManager\CustomerController@store')->name('customer.store');
		Route::post('/customer/{id}/edit', 'Admin\CustManager\CustomerController@update')->name('customer.edit');
		Route::post('/customer/{id}/delete', 'Admin\CustManager\CustomerController@destroy')->name('customer.delete');
		Route::get('/activeCustomer/{id}', 'Admin\CustManager\CustomerController@activeCustomer')->name('activeCustomer');
		Route::get('/suspendedCustomer/{id}', 'Admin\CustManager\CustomerController@suspendedCustomer')->name('suspendedCustomer');
		Route::post('/filterCustomer', 'Admin\CustManager\CustomerController@filterCustomer')->name('filterCustomer');
		Route::get('customer/print_cart/{id}', 'Admin\CustManager\CustomerController@show')->name('print_cart');
		Route::get('customer/print_id_card/{id}', 'Admin\CustManager\CustomerController@print_id_card')->name('print_id_card');

	// Route Customers Manager/Lead
		Route::resource('/lead', 'Admin\CustManager\LeadController');
	// Route Customers Manager/Lead/Payment
		// Route::get('/lead/Payment/{id}', 'Admin\CustManager\LeadPayController@index')->name('lead.payment');
		// Route::post('/lead/Payment/store/{id}', 'Admin\CustManager\LeadPayController@store')->name('lead.payment.store');
		// Route::post('/lead/Payment/{id}/edit', 'Admin\CustManager\LeadPayController@update')->name('lead.payment.update');
		// Route::post('/lead/Payment/{id}/delete', 'Admin\CustManager\LeadPayController@destroy')->name('lead.payment.delete');

	// Route Customers Manager/Lead/call center
		Route::get('/lead/call_center/{id}', 'Admin\CustManager\LeadCallController@index')->name('leadCall');
		Route::post('/lead/call_center/store', 'Admin\CustManager\LeadCallController@store')->name('leadCall.store');
		Route::post('/lead/call_center/{id}/edit', 'Admin\CustManager\LeadCallController@update')->name('leadCall.edit');
		Route::post('/lead/call_center/{id}/delete', 'Admin\CustManager\LeadCallController@destroy')->name('leadCall.delete');
		
	
	// Route customers/All Document
		Route::get('/allDocument/customer', 'Admin\CustManager\allDocumentController@index')->name('allDocumentCustomer');
		Route::get('/allDocument/employee', 'Admin\Hrdepartment\allDocumentempController@index')->name('allDocumentEmployee');
		Route::get('/allDocument/payment', 'Admin\Accounting\allDocumentpayController@index')->name('allDocumentPayment');

	// Route Customers Manager/Call Center
		Route::get('customer/call_center/{id}', 'Admin\CustManager\CallcenterControllert@index')->name('call_center');
		Route::post('customer/call_center/store', 'Admin\CustManager\CallcenterControllert@store')->name('call_center.store');
		Route::post('customer/call_center/{id}/edit', 'Admin\CustManager\CallcenterControllert@update')->name('call_center.edit');
		Route::post('customer/call_center/{id}/delete', 'Admin\CustManager\CallcenterControllert@destroy')->name('call_center.delete');

	// Route Customers Manager/payment
		Route::get('/customer/payment/{id}', 'Admin\CustManager\PayCustomerController@index')->name('payCustomer');
		Route::post('/customer/payment/store', 'Admin\CustManager\PayCustomerController@store')->name('payCustomer.store');
		Route::post('/customer/payment/{id}/edit', 'Admin\CustManager\PayCustomerController@update')->name('payCustomer.edit');
		Route::post('/customer/payment/{id}/delete', 'Admin\CustManager\PayCustomerController@destroy')->name('payCustomer.delete');
		Route::get('/customer/getCustomer', 'Admin\CustManager\PayCustomerController@getCustomer')->name('getCustomer');
		Route::get('/customer/payment/{id}/print', 'Admin\CustManager\PayCustomerController@CustPrint')->name('CustPrint');

	// Route Customers Manager/payment/Refound
		Route::get('payment/refund/{id}', 'Admin\CustManager\RefundController@index')->name('refund');
		Route::post('payment/refund/store', 'Admin\CustManager\RefundController@store')->name('refund.store');
		Route::post('payment/refund/{id}/edit', 'Admin\CustManager\RefundController@update')->name('refund.edit');
		Route::post('payment/refund/{id}/delete', 'Admin\CustManager\RefundController@destroy')->name('refund.delete');

	// Route Customers Manager/profile
		Route::get('/customer/profile/{id}', 'Admin\CustManager\ProfileController@index')->name('profile');
		Route::post('/customer/profile/{id}/edit', 'Admin\CustManager\ProfileController@update')->name('profile.edit');

	// Route Customers Manager/customer/Doecument
		Route::get('/customer/document/{id}', 'Admin\CustManager\DocumentCustController@index')->name('documentCust');
		Route::post('/customer/document/store', 'Admin\CustManager\DocumentCustController@store')->name('documentCust.store');
		Route::post('/customer/document/{id}/edit', 'Admin\CustManager\DocumentCustController@update')->name('documentCust.edit');
		Route::post('/customer/document/{id}/delete', 'Admin\CustManager\DocumentCustController@destroy')->name('documentCust.delete');

	// Route Hrdepartment/Department
		Route::get('/departments', 'Admin\Hrdepartment\DepartmentController@index')->name('department');
		Route::post('/department/store', 'Admin\Hrdepartment\DepartmentController@store')->name('department.store');
		Route::post('/department/{id}/edit', 'Admin\Hrdepartment\DepartmentController@update')->name('department.edit');
		Route::post('/department/{id}/delete', 'Admin\Hrdepartment\DepartmentController@destroy')->name('department.delete');
		Route::post('/addManager/{id}', 'Admin\Hrdepartment\DepartmentController@addManager')->name('addManager');

	// Route Hrdepartment/Job
		Route::get('/jobs', 'Admin\Hrdepartment\JobController@index')->name('job');
		Route::post('/job/store', 'Admin\Hrdepartment\JobController@store')->name('job.store');
		Route::post('/job/{id}/edit', 'Admin\Hrdepartment\JobController@update')->name('job.edit');
		Route::post('/job/{id}/delete', 'Admin\Hrdepartment\JobController@destroy')->name('job.delete');

	// Route Hrdepartment/Employee
		Route::get('/employees', 'Admin\Hrdepartment\EmployeeController@index')->name('employee');
		Route::post('/employee/store', 'Admin\Hrdepartment\EmployeeController@store')->name('employee.store');
		Route::post('/employee/{id}/edit', 'Admin\Hrdepartment\EmployeeController@update')->name('employee.edit');
		Route::post('/employee/{id}/delete', 'Admin\Hrdepartment\EmployeeController@destroy')->name('employee.delete');
		Route::post('/resetPass/{id}', 'Admin\Hrdepartment\EmployeeController@resetPass')->name('resetPass');
		Route::get('/getJobs', 'Admin\Hrdepartment\EmployeeController@getJobs')->name('getJobs');

	// Route Hrdepartment/New group
		Route::get('new_group', 'Admin\Hrdepartment\GroupControll@index')->name('new_group');
		Route::get('new_group/create', 'Admin\Hrdepartment\GroupControll@create')->name('new_group.create');

	// Route Hrdepartment/Profile
		Route::get('employee/profile/{id}', 'Admin\Hrdepartment\ProfilesController@index')->name('employee.profile');
		Route::post('employee/profile/{id}/edit', 'Admin\Hrdepartment\ProfilesController@update')->name('employee.profile.edit');

	// Route Hrdepartment/Employee/Bonus
		Route::get('employee/bonus/{id}', 'Admin\Hrdepartment\AwardController@index')->name('award');
		Route::post('employee/bonus/store', 'Admin\Hrdepartment\AwardController@store')->name('award.store');
		Route::post('employee/bonus/{id}/edit', 'Admin\Hrdepartment\AwardController@update')->name('award.edit');
		Route::post('employee/bonus/{id}/delete', 'Admin\Hrdepartment\AwardController@destroy')->name('award.delete');

	// Route Hrdepartment/Employee/Deduction
		Route::get('employee/deduction/{id}', 'Admin\Hrdepartment\DiscountController@index')->name('discount');
		Route::post('employee/deduction/store', 'Admin\Hrdepartment\DiscountController@store')->name('discount.store');
		Route::post('employee/deduction/{id}/edit', 'Admin\Hrdepartment\DiscountController@update')->name('discount.edit');
		Route::post('employee/deduction/{id}/delete', 'Admin\Hrdepartment\DiscountController@destroy')->name('discount.delete');

	// Route Hrdepartment/Employee/Document
		Route::get('/document/employee/{id}', 'Admin\Hrdepartment\DocumentController@index')->name('document');
		Route::post('/document/employee/store', 'Admin\Hrdepartment\DocumentController@store')->name('document.store');
		Route::post('/document/employee/{id}/edit', 'Admin\Hrdepartment\DocumentController@update')->name('document.edit');
		Route::post('/document/employee/{id}/delete', 'Admin\Hrdepartment\DocumentController@destroy')->name('document.delete');

	// Route Customers Manager/payment
		Route::get('/customer/payment', 'Admin\Accounting\PaymentController@index')->name('payment');
		Route::get('getPayment', 'Admin\Accounting\PaymentController@getPayment')->name('getPayment');
		Route::post('getPaymentFilter', 'Admin\Accounting\PaymentController@getPaymentFilter')->name('getPaymentFilter');

	// Route Accounting/Document
		Route::get('/payment/document/{id}', 'Admin\Accounting\DocumentPayController@index')->name('documentPay');
		Route::post('/payment/document/store', 'Admin\Accounting\DocumentPayController@store')->name('documentPay.store');
		Route::post('/payment/document/{id}/edit', 'Admin\Accounting\DocumentPayController@update')->name('documentPay.edit');
		Route::post('/payment/document/{id}/delete', 'Admin\Accounting\DocumentPayController@destroy')->name('documentPay.delete');

	// Route Accounting/Documents
		Route::get('/allDocumentsPay', 'Admin\Accounting\allDocumentpayController@index')->name('allDocumentsPay');

	// Route Accounting/Offer
		Route::get('/offers', 'Admin\Accounting\OfferController@index')->name('offer');
		Route::post('/offer/store', 'Admin\Accounting\OfferController@store')->name('offer.store');
		Route::post('/offer/{id}/edit', 'Admin\Accounting\OfferController@update')->name('offer.edit');
		Route::post('/offer/{id}/delete', 'Admin\Accounting\OfferController@destroy')->name('offer.delete');
		Route::get('/getActiveOffer/{id}', 'Admin\Accounting\OfferController@getActiveOffer')->name('getActiveOffer');
		Route::get('/getUnactiveOffer/{id}', 'Admin\Accounting\OfferController@getUnactiveOffer')->name('getUnactiveOffer');
		
	// Route Accounting/Expenses Type
		Route::get('/expensesType', 'Admin\Accounting\ExpenseTypeController@index')->name('expensesType');
		Route::post('/expensesType/store', 'Admin\Accounting\ExpenseTypeController@store')->name('expensesType.store');
		Route::post('/expensesType/{id}/edit', 'Admin\Accounting\ExpenseTypeController@update')->name('expensesType.edit');
		Route::post('/expensesType/{id}/delete', 'Admin\Accounting\ExpenseTypeController@destroy')->name('expensesType.delete');

	// Route Accounting/Expenses
		Route::get('/expenses', 'Admin\Accounting\ExpenseController@index')->name('expense');
		Route::post('/expenses/store', 'Admin\Accounting\ExpenseController@store')->name('expense.store');
		Route::post('/expenses/{id}/edit', 'Admin\Accounting\ExpenseController@update')->name('expense.edit');
		Route::post('/expenses/{id}/delete', 'Admin\Accounting\ExpenseController@destroy')->name('expense.delete');	

	// Route Profile User
		Route::get('profile', 'Admin\ProfileController@index')->name('profile.user');
		Route::post('profile/{id}/edit', 'Admin\ProfileController@update')->name('profile.user.edit');
	
	// Route Profile/Bonus
		Route::get('profile/bonus', function(){
			return view('pages.bonus');
		});

		Route::get('profile/deduction', function(){
			return view('pages.deduction');
		});

});