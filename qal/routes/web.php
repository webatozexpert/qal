<?php

Auth::routes();

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/zone-setup', 'ZoneController@index');
Route::post('/zone-submit', 'ZoneController@zone_submit');
Route::get('/zone-edit/{id}', 'ZoneController@zone_edit');
Route::post('/zone-update', 'ZoneController@zone_update');

Route::get('/region-setup', 'RegionController@index');
Route::post('/region-submit', 'RegionController@region_submit');
Route::get('/region-edit/{id}', 'RegionController@region_edit');
Route::post('/region-update', 'RegionController@region_update');

Route::get('/agent-setup', 'CustomerController@index');
Route::get('/new-agent', 'CustomerController@new');
Route::post('/agent-submit', 'CustomerController@submit');
Route::get('/agent-edit/{id}', 'CustomerController@edit');
Route::post('/agent-update', 'CustomerController@update');
Route::get('/zone-wise-region', 'RegionController@zoneWiseRegions');

Route::get('/money-receipt', 'MoneyReceiptController@index');
Route::get('/new-money-receipt', 'MoneyReceiptController@new');
Route::post('/money-receipt-submit', 'MoneyReceiptController@submit');
Route::get('/money-receipt-edit/{id}', 'MoneyReceiptController@edit');
Route::post('/money-receipt-update', 'MoneyReceiptController@update');
Route::get('/money-receipt-pdf/{id}', 'MoneyReceiptController@mr_pdf');

Route::get('/money-receipt-delete', 'MoneyReceiptController@delete');

Route::get('/order', 'OrderController@index');
Route::get('/zone-wise-agent', 'OrderController@zone_wise_customer');
Route::get('/agent-info', 'OrderController@customer_info');
Route::get('/new-order', 'OrderController@new');
Route::post('/order-submit', 'OrderController@submit');

Route::get('/order-edit/{id}', 'OrderController@edit');
Route::post('/order-update', 'OrderController@update');
Route::get('/order-pdf/{id}', 'OrderController@order_pdf');

Route::get('/factory/gate-pass', 'FactoryController@gate_pass');
Route::get('/factory/agent-code', 'FactoryController@customer_info');
Route::get('/factory/new-gate-pass', 'FactoryController@gate_pass_new');
Route::post('/factory/gate-pass-submit', 'FactoryController@gate_pass_submit');
Route::get('/factory/gate-pass-pdf/{type}/{id}', 'FactoryController@gate_pass_pdf');

Route::get('/factory/challan', 'FactoryController@challan');
Route::get('/factory/do-code', 'FactoryController@do_info');
Route::get('/factory/new-challan', 'FactoryController@challan_new');
Route::post('/factory/challan-submit', 'FactoryController@challan_submit');
Route::get('/factory/challan-pdf/{type}/{id}', 'FactoryController@challan_pdf');

Route::get('/factory/invoice', 'FactoryController@invoice');
Route::get('/factory/invoice-code', 'FactoryController@invoice_info');
Route::get('/factory/new-invoice', 'FactoryController@invoice_new');
Route::post('/factory/invoice-submit', 'FactoryController@invoice_submit');
Route::get('/factory/invoice-pdf/{type}/{id}', 'FactoryController@invoice_pdf');


Route::get('/branch-setup', 'BranchController@page_index');
Route::post('/branch-submit', 'BranchController@submit');
Route::post('/branch-type-submit', 'BranchController@branch_type_submit');
Route::get('/branch-edit/{id}', 'BranchController@edit');
Route::post('/branch-update', 'BranchController@update');


Route::get('/product-setup', 'ProductController@page_index');
Route::post('/product-group-submit', 'ProductController@group_submit');
Route::post('/product-subgroup-submit', 'ProductController@subgroup_submit');
Route::post('/product-category-submit', 'ProductController@category_submit');
Route::post('/product-unit-submit', 'ProductController@unit_submit');
Route::post('/product-packsize-submit', 'ProductController@packsize_submit');


Route::get('/new-product', 'ProductController@new');
Route::get('/group-wise-subgroup', 'ProductController@group_wise_subgroup');
Route::get('/subgroup-wise-category', 'ProductController@subgroup_wise_category');
Route::post('/product-submit', 'ProductController@submit');
Route::get('/product-edit/{id}', 'ProductController@edit');
Route::post('/product-update', 'ProductController@update');


/////////////// ALL INVOICE, DO Update ///////////////////

Route::get('/m/do-update', 'OrderController@updateDo');
Route::get('/m/invoice-update', 'OrderController@updateInvoice');



///////////////////////// Report ///////////////////////////

Route::get('/report/do', 'ReportController@delivery_report');
Route::post('/report/do-report-pdf', 'ReportController@delivery_report_pdf');
Route::post('/report/daily-statement-pdf', 'ReportController@daily_statement_report_pdf');
Route::post('/report/do-report-excel', 'ReportController@delivery_report_excel');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Project Inform.
Route::get('/project-setup', 'ProjectController@index');
Route::post('/project-submit', 'ProjectController@project_submit');
Route::get('/project-edit/{id}', 'ProjectController@project_edit');
Route::post('/project-update', 'ProjectController@project_update');
Route::get('/project-delete/{id}', 'ProjectController@delete');

//Project Budget.
Route::get('/projectBudget-setup', 'ProjectBudgetController@index');
Route::post('/projectBudget-submit', 'ProjectBudgetController@projectBudget_submit');
Route::get('/projectBudget-edit/{id}', 'ProjectBudgetController@projectBudget_edit');
Route::post('/projectBudget-update', 'ProjectBudgetController@projectBudget_update');
Route::get('/projectBudget-delete/{id}', 'ProjectBudgetController@delete');

//Supplier/Vendor Detail 
Route::get('/supplier-setup', 'SupplierController@page_index');
Route::post('/new-city-submit', 'SupplierController@new_city_submit');
Route::post('/supplier-submit', 'SupplierController@submit');
Route::get('/supplier-edit/{id}', 'SupplierController@edit');
Route::post('/supplier-update', 'SupplierController@update');
Route::get('/supplier-delete/{id}', 'SupplierController@delete');



//Requisition part Start
Route::get('/requisition', 'RequisitionController@requisition');
Route::get('/creact-requisition', 'RequisitionController@creact_requisition');
Route::get('/group-wise-intemname', 'RequisitionController@group_wise_intemname');
Route::get('/intemname-wise-unit', 'RequisitionController@intemname_wise_unit');
Route::post('/requisition-submit', 'RequisitionController@requisition_submit');
Route::get('/requisition-view/{id}', 'RequisitionController@view');
Route::get('/requisition-edit/{id}', 'RequisitionController@edit');
Route::post('/requisition-update', 'RequisitionController@update');
Route::get('/requisition-delete/{id}', 'RequisitionController@delete');
Route::get('/requisition-print/{id}', 'RequisitionController@requisitionPrint');

//Requisition Approoved part
Route::get('/requisition-awaiting-approval/', 'RequisitionController@requiPendingList');
Route::get('/approved1','RequisitionController@approved1');
Route::get('/requisition-approved/', 'RequisitionController@approvedList');


//Requisition Confirm part
Route::get('/requisition-awaiting-confirm/', 'RequisitionController@awaitingConfirmList');

Route::get('/confirm1','RequisitionController@confirm');
Route::get('/requisition-confirm', 'RequisitionController@confirmList');

//Requisition OrderConfirm part
Route::get('/requisition-awaiting-orderconfirm/', 'RequisitionController@awaitingorderConfirmList');
Route::get('/requisitionConfirm','RequisitionController@requisitionConfirm');
Route::get('/requisition-orderconfirm', 'RequisitionController@orderConfirmList');

//Purchase Requisition part End

//Purchase Order part Start
Route::get('/purchase_order', 'purchaseOrderController@purchaseorder');
Route::get('/purchase_order/create', 'purchaseOrderController@purchaseorder_create');

Route::get('/requisition-wise-intemname', 'purchaseOrderController@requisition_wise_intemname');
Route::get('/intemname-wise-quantity', 'purchaseOrderController@intemname_wise_quantity');
Route::get('/requisition-wise-branch', 'purchaseOrderController@requisition_wise_branch');

Route::post('order-submit', 'purchaseOrderController@purchase_order_submit');
Route::get('/purchase-delete/{id}', 'purchaseOrderController@delete');
Route::get('/purchaseOrder-print/{id}', 'purchaseOrderController@purchaseOrderPrint');
Route::get('/po-edit/{id}', 'purchaseOrderController@poedit');
Route::post('/po-update', 'purchaseOrderController@poupdate');

//prochase Approoved part
Route::get('/order-awaiting-approval/', 'purchaseOrderController@orderPendingList');
Route::get('/approved2','purchaseOrderController@approved2');
Route::get('/order-approved/', 'purchaseOrderController@approvedList');


//prochase Confirm part
Route::get('/order-awaiting-confirm/', 'purchaseOrderController@awaitingConfirmList');
Route::get('/confirm2','purchaseOrderController@confirm');
Route::get('/order-confirm', 'purchaseOrderController@confirmList');

//prochase OrderConfirm part
Route::get('/order-awaiting-orderconfirm/', 'purchaseOrderController@awaitingorderConfirmList');
Route::get('/orderConfirm2','purchaseOrderController@orderConfirm');
Route::get('/order-orderconfirm', 'purchaseOrderController@prochaseorderConfirmList');


//Purchase Order part End




//User Management 
Route::get('/all-user', 'UserController@all_user')->name('all_user');
Route::get('/user/create', 'UserController@create')->name('/user/create');
Route::post('/user/store', 'UserController@store')->name('/user/store');
Route::get('/user-delete/{id}', 'UserController@delete')->name('/user/delete');
Route::get('/user-edit/{id}', 'UserController@edit')->name('/user/edit');
Route::post('/user-update/', 'UserController@update')->name('/user/update');

//User Role.
Route::get('/user-role', 'UserroleController@userrole');
Route::post('/user-role-create', 'UserroleController@rolename_create');
Route::get('/userrole-delete/{id}', 'UserroleController@delete');




























///////////////////// QIL SECTION ////////////////////////

Route::get('/qil/entry', 'EntryController@index');
Route::post('/qil/order-entry-submit', 'EntryController@order_entry_submit');
Route::post('/qil/query-entry-submit', 'EntryController@query_entry_submit');
Route::get('/qil/order/history', 'EntryController@qil_history');
Route::post('/qil/order-statement', 'EntryController@order_statement');