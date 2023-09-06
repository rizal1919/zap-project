<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\Bidding\BiddingController;
use App\Http\Controllers\Admin\Bidding\DetailBiddingController;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\CreditApplication\CreditApplicationController;
use App\Http\Controllers\Admin\CreditApplication\CreditUsageController;
use App\Http\Controllers\Admin\CreditApplication\CreditPaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryOrder\DeliveryController;
use App\Http\Controllers\Admin\DeliveryOrder\DeliveryOrderController;
use App\Http\Controllers\Admin\Inbox\InboxController;
use App\Http\Controllers\Admin\MasterData\CarouselController;
use App\Http\Controllers\Admin\MasterData\Category\CategoryDetailController;
use App\Http\Controllers\Admin\MasterData\Category\CategoryHeaderController;
use App\Http\Controllers\Admin\MasterData\Category\CategorySubHeaderController;
use App\Http\Controllers\Admin\MasterData\DepositController;
use App\Http\Controllers\Admin\MasterData\EkspedisiController;
use App\Http\Controllers\Admin\MasterData\ParametersController;
use App\Http\Controllers\Admin\MasterData\ProductsController;
use App\Http\Controllers\Admin\MasterData\SatuanController;
use App\Http\Controllers\Admin\MasterData\SuppliersController;
use App\Http\Controllers\Admin\MasterData\ReasonCategoryController;
use App\Http\Controllers\Admin\Payment\PaymentsController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\Sales\ProformaInvController;
use App\Http\Controllers\Admin\Sales\SalesDeliveryController;
use App\Http\Controllers\Admin\Sales\SalesQuotationController;
use App\Http\Controllers\Admin\SupplierOrder\SupplierOrdersController;
use App\Http\Controllers\Admin\Purchase\PurchaseDeliveryController;
use App\Http\Controllers\Admin\Purchase\PurchaseInvoiceController;
use App\Http\Controllers\Admin\UserManagement\ContractorsController;
use App\Http\Controllers\Admin\Sales\SalesOrderController;
use App\Http\Controllers\Admin\Sales\SalesPaymentController;
use App\Http\Livewire\Pages\Sales\SalesOrder\AddSalesOrderComponents;
use App\Http\Livewire\Pages\Sales\SalesOrder\UpdateSalesOrderComponents;
use App\Http\Livewire\Pages\Sales\SalesInvoice\DetailSalesInvoiceComponents;
use App\Http\Livewire\Pages\Sales\SalesInvoice\EditSalesInvoiceComponents;

use App\Http\Controllers\Main\DashboardCont;
use App\Http\Controllers\ProductCont;

use App\Http\Controllers\Main\HomeCont;
use App\Http\Controllers\Main\PageCont;
use App\Http\Controllers\Main\LoginCont;
use App\Http\Controllers\Main\RegisterCont;
use App\Http\Controllers\Main\LogoutCont;

use App\Http\Controllers\MainFunction\AccountCont;
use App\Http\Controllers\MainFunction\MainCont;

use App\Http\Controllers\Kontraktor\KontraktorCont;
use App\Http\Controllers\Kontraktor\CartCont;
use App\Http\Controllers\Kontraktor\BiddingCont;
use App\Http\Controllers\Kontraktor\CheckoutCont;
use App\Http\Controllers\Kontraktor\FormKreditC;
use App\Http\Controllers\Kontraktor\PesananCont;
use App\Http\Controllers\Kontraktor\ProgressController;

use App\Http\Controllers\Third\XenditCont;

use App\Http\Controllers\MainFunction\CronCont;

use App\Http\Middleware\HasVerifedOTP;
use App\Http\Middleware\hasChoicedProyek;
use App\Http\Middleware\hasSessionBidding;
use App\Http\Middleware\hasSessionCheckout;
use App\Http\Middleware\hasSessionFormKredit1;
use App\Http\Middleware\hasSessionFormKredit2;
use App\Http\Middleware\hasSessionFormKredit3;
use App\Http\Middleware\hasSessionCreditData;
use App\Http\Middleware\isUserAdmin;
use App\Http\Middleware\isUserKontraktor;


//end caco
use App\Http\Controllers\Admin\UserManagement\PermissionsController;
use App\Http\Controllers\Admin\UserManagement\RolesController;
use App\Http\Controllers\Admin\UserManagement\UsersController;
use App\Http\Livewire\DashboardComponents;
use App\Http\Livewire\Pages\MasterData\Parameter\ParameterComponents;
use App\Http\Livewire\Pages\MasterData\Products\AddProductComponents;
use App\Http\Livewire\Pages\MasterData\Products\DetailProductComponents;
use App\Http\Livewire\Pages\MasterData\Products\EditProductComponents;
use App\Http\Livewire\Pages\MasterData\Products\ProductComponents;
use App\Http\Livewire\Pages\UserManagement\Contractor\AddContractorComponents;
use App\Http\Livewire\Pages\UserManagement\Contractor\ContractorComponents;
use App\Http\Livewire\Pages\UserManagement\Contractor\DetailContractorComponents;
use App\Http\Livewire\Pages\UserManagement\Contractor\EditContractorComponents;
use App\Http\Livewire\Pages\UserManagement\PermissionsComponents;
use App\Http\Livewire\Pages\UserManagement\RolesComponents;
use App\Http\Livewire\Pages\UserManagement\UsersComponents;
use App\Http\Controllers\Kontraktor\ProyekCont;
use App\Http\Livewire\Pages\Bidding\AddBiddingComponents;
use App\Http\Livewire\Pages\Bidding\BiddingComponents;
use App\Http\Livewire\Pages\Bidding\DetailBiddingComponents;
use App\Http\Livewire\Pages\Bidding\EditBiddingComponents;
use App\Http\Livewire\Pages\Bidding\SetBiddingComponents;
use App\Http\Livewire\Pages\Bidding\NewBiddingComponents;
use App\Http\Livewire\Pages\Bidding\NewSetBiddingComponents;
use App\Http\Livewire\Pages\CreditApplication\CreditApplicationComponents;
use App\Http\Livewire\Pages\CreditApplication\DetailCreditApplicationComponents;
use App\Http\Livewire\Pages\CreditApplication\EditCreditApplicationComponents;
use App\Http\Livewire\Pages\DeliveryOrder\AddDeliveryOrder;
use App\Http\Livewire\Pages\DeliveryOrder\DeliveryOrderComponents;
use App\Http\Livewire\Pages\DeliveryOrder\DetailDeliveryOrder;
use App\Http\Livewire\Pages\DeliveryOrder\EditDeliveryOrder;
use App\Http\Livewire\Pages\MasterData\Category\CategoryComponents;
use App\Http\Livewire\Pages\MasterData\Ekspedisi\EkspedisiComponents;
use App\Http\Livewire\Pages\MasterData\Satuan\SatuanComponents;
use App\Http\Livewire\Pages\MasterData\Supplier\AddSupplierComponents;
use App\Http\Livewire\Pages\MasterData\Supplier\DetailSupplierComponents;
use App\Http\Livewire\Pages\MasterData\Supplier\EditSupplierComponents;
use App\Http\Livewire\Pages\MasterData\Supplier\SupplierComponents;
use App\Http\Livewire\Pages\Payment\PaymentComponents;
use App\Http\Livewire\Pages\Project\AddProjectComponents;
use App\Http\Livewire\Pages\Project\DetailProjectComponents;
use App\Http\Livewire\Pages\Project\EditProjectComponents;
use App\Http\Livewire\Pages\Project\ProjectComponents;
use App\Http\Livewire\Pages\Purchase\PurchaseComponents;
use App\Http\Livewire\Pages\Purchase\PurchaseDelivery\DetailPurchaseDeliveryComponents;
use App\Http\Livewire\Pages\Purchase\PurchaseInvoice\DetailPurchaseInvoiceComponents;
// use App\Http\Livewire\Pages\Purchase\PurchaseDelivery\EditPurchaseDeliveryComponents;
use App\Http\Livewire\Pages\Sales\SalesComponents;
use App\Http\Livewire\Pages\Sales\SalesDelivery\AddSalesDeliveryComponents;
use App\Http\Livewire\Pages\Sales\SalesDelivery\DetailSalesDeliveryComponents;
use App\Http\Livewire\Pages\Sales\SalesDelivery\EditSalesDeliveryComponents;
use App\Http\Livewire\Pages\Sales\SalesQuotation\DetailSalesQuotationComponents;
use App\Http\Livewire\Pages\Sales\SalesQuotation\SalesQuotationComponents;
use App\Http\Livewire\Pages\SupplierOrder\SupplierOrderComponents;
use App\Http\Livewire\Pages\Sales\SalesOrder\SalesOrderComponents;
use App\Http\Livewire\Pages\Sales\SalesPayment\SalesPaymentComponents;
use App\Http\Livewire\Pages\Sales\SalesPayment\Sales\UpdateComponents;
use App\Http\Controllers\Admin\Sales\SalesInvoiceController;
use App\Http\Controllers\Admin\Sales\SalesOrderPaymentController;
use App\Http\Controllers\Admin\Sales\SyncJurnalController;
use App\Http\Controllers\Admin\SyncJurnalController as AdminSyncJurnalController;
use App\Http\Controllers\Kontraktor\BlogController as KontraktorBlogController;
use App\Http\Controllers\Kontraktor\ContactUsController;
use App\Http\Controllers\Kontraktor\PenggunaController;
use App\Http\Controllers\Sales\Contacts\KontraktorController;
use App\Http\Livewire\Pages\Blog\AddBlogComponents;
use App\Http\Livewire\Pages\Blog\BlogCategoryComponents;
use App\Http\Livewire\Pages\Blog\BlogComponents;
use App\Http\Livewire\Pages\Blog\EditBlogComponents;
use App\Http\Livewire\Pages\Contact\ContactComponents;
use App\Http\Livewire\Pages\MasterData\Carousel\CarouselComponents;
use App\Http\Livewire\Pages\Message\MessageComponents;
use App\Http\Livewire\Pages\Sales\SalesQuotation\AddSalesQuotationComponents;
use App\Http\Livewire\Pages\Sales\SalesQuotation\EditSalesQuotationComponents;
use App\Http\Livewire\Pages\SupplierOrder\DetailSupplierOrderComponents;
use App\Http\Livewire\Pages\SupplierOrder\EditSupplierOrderComponents;
use App\Http\Livewire\Pages\Dashboard\SalesQuoteComponents;
use App\Http\Livewire\Sales\DashboardComponents as SalesDashboardComponents;
use App\Http\Livewire\Sales\Pages\Contacts\ContactsComponents;
use App\Http\Livewire\Sales\Pages\Contacts\Category\AddKontraktorComponents;
use App\Http\Middleware\isUserSales;
use App\Http\Controllers\RetailController;
use App\Http\Livewire\Pages\MasterData\Retail\AddRetailComponents;
use App\Http\Livewire\Pages\MasterData\Retail\DetailRetailComponents;
use App\Http\Livewire\Pages\MasterData\Retail\EditRetailComponents;

use App\Http\Livewire\Pages\Ticketing\TicketComponents;
use App\Http\Controllers\Admin\Ticketing\TicketingController;
use App\Http\Controllers\Sales\DashboardController as SalesDashboardController;
use App\Http\Livewire\Sales\Pages\Contacts\DetailKontraktorComponents;
use App\Http\Livewire\Sales\Pages\Contacts\EditKontraktorComponents;
use App\Http\Livewire\Sales\Pages\Project\ProyekComponents;
use App\Http\Livewire\Pages\Reimbursement\AdminReimbursementComponent;
use App\Http\Livewire\Pages\Sales\SalesOrder\DetailProformaInvoice;
use App\Http\Livewire\Pages\Sales\SalesOrder\EditProformaInvoice;

// sales
use App\Http\Livewire\Sales\Pages\Project\AddProyekComponents;
use App\Http\Livewire\Sales\Pages\Project\ProjectDetails\DetailComponents;
use App\Http\Livewire\Sales\Pages\Project\ProjectDetails\DetailProyekComponent;
use App\Http\Controllers\Sales\Activity\SalesActivityController;
use App\Http\Livewire\Sales\Pages\Project\ProjectDetails\DetailAddRequestHistoryComponent;
use App\Http\Controllers\Sales\Request\SalesRequestController;
use App\Http\Livewire\Sales\Pages\Order\DetailSalesRequest;
use App\Http\Livewire\Pages\MasterData\Deposit\DepositComponents;
use App\Http\Livewire\Pages\Sales\Proforma\AddProformaInvComponents;
use App\Http\Livewire\Pages\Sales\ReceivePayment\AddSalesReceivePaymentComponents;
use App\Http\Livewire\Pages\Sales\ReceivePayment\DetailSalesReceivePaymentComponents;
use App\Http\Controllers\Admin\Sales\ReceivePaymentController;
use App\Http\Livewire\Pages\Sales\ReceivePayment\EditSalesReceivePaymentComponents;
use App\Http\Livewire\Pages\Sales\SalesOrder\AddSalesOrderPaymentComponents;
use App\Http\Livewire\Pages\Sales\SalesOrder\EditSalesOrderPaymentComponents;
use App\Http\Livewire\Pages\Sales\SalesOrder\EditSalesOrderComponents;
use App\Http\Livewire\Pages\Sales\SalesInvoice\AddSalesInvoiceComponents;
use App\Http\Livewire\ReportComponents;
use App\Http\Livewire\Sales\Pages\Activity\ActivityComponents;
use App\Http\Livewire\Sales\Pages\Project\ProjectDetails\DetailShowRequestComponent;
use App\Http\Livewire\Sales\Pages\Project\ProjectDetails\DetailEditRequestHistoryComponent;
use App\Http\Livewire\Sales\Pages\Order\OrderComponents;
use App\Http\Livewire\Sales\Pages\Order\AddOrderComponent;
use App\Http\Livewire\Pages\Sales\SalesRequest\DetailSalesRequestComponents;
use App\Http\Livewire\Pages\Sales\SalesRequest\EditSalesRequestComponents;
use App\Http\Livewire\Sales\ReportSalesComponents;
use App\Http\Livewire\Sales\Pages\Report\ReportDataComponents;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesQuotation;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesOrder;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesDelivery;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesByCustomer;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesContact;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesActivity;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesCustomerBalance;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesRequest;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesByProduct;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesDeliveryDetail;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesOrderCompletion;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesProductProfitability;
use App\Http\Livewire\Sales\Pages\Reimbursement\ReimbursementComponents;
use App\Http\Controllers\Sales\Reimbursement\ReimbursementController;
use App\Http\Livewire\Sales\Pages\Setting\SettingComponents;
use App\Http\Livewire\Sales\Pages\Leads\LeadsComponents;
use App\Http\Controllers\Sales\Leads\LeadsController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Livewire\Sales\Pages\Leads\AddLeadsComponents;
use App\Http\Livewire\Sales\Pages\Leads\DetailLeadsComponents;
use App\Http\Livewire\Sales\Pages\Leads\EditLeadsComponents;
use App\Http\Livewire\Sales\Pages\Order\DetailSalesDelivery;
use App\Http\Livewire\Sales\Pages\Order\DetailSalesInvoice;
use App\Http\Livewire\Sales\Pages\Order\DetailSalesOrder;
use App\Http\Livewire\Sales\Pages\Order\DetailSalesQuotation;
use App\Http\Livewire\Sales\Pages\Plan\PlanComponents;
use App\Http\Controllers\Sales\Dashboard\NotificationController;
use App\Http\Livewire\DashboardAllComponents;
use App\Http\Livewire\Pages\Dashboard\SalesOrderComponents as DashboardSalesOrderComponents;
use App\Http\Livewire\Pages\Dashboard\SalesInvoiceComponents as DashboardSalesInvoiceComponents;
use App\Http\Livewire\Pages\MasterData\MasterReasonCategory\MasterReasonCategoryComponents;
use App\Http\Livewire\Pages\Sales\SalesRequest\AddSalesRequestComponents;
use App\Http\Livewire\Sales\Pages\Report\ReportSalesLeadsProgress;


//error
Route::get('underMaintence', [PageCont::class, 'underMaintence']);

//xendit
Route::name('xendit.')->group(function(){
    Route::any('xendit/success/{code?}', [XenditCont::class, 'successPayment'] )->name('success');
    Route::any('xendit/error', [XenditCont::class, 'errorPayment'])->name('error');
    Route::any('xendit/callback', [XenditCont::class, 'callback'])->name('callback');
});

//funct
Route::name('home.')->group(function(){

    Route::post('product/getProduct', [ProductCont::class, 'getProduct'])->name('getProduct');
    Route::get('/search', [DashboardCont::class, 'search'])->name('search');
    Route::get('product/{slug}', [DashboardCont::class, 'product'])->name('product');

});

// Share Bid
Route::get('share-bid/{id}', [BiddingController::class, 'share_bid'])->name('bid.share_bid');

//main
Route::match(['get', 'post'], 'sendcode', [MainCont::class, 'sendcode'])->name('main.sendcode');
Route::match(['get', 'post'], 'verifcode', [MainCont::class, 'verifcode'])->name('main.verifcode');
Route::match(['get', 'post'], 'checkEmailHasRegistered', [MainCont::class, 'checkEmailHasRegistered'])->name('check.emailExist');

Route::get('/delivery-slip/{code?}', [DeliveryOrderController::class, 'delivery_slip'])->name('link-delivery');
Route::get('/delivery-shipping', [DeliveryOrderController::class, 'delivery_slip_order'])->name('delivery-data');
Route::post('/delivery-shipping-store-ttd', [DeliveryOrderController::class, 'upload_form'])->name('delivery-upload');
Route::post('/delivery-shipping-store-all', [DeliveryOrderController::class, 'delivery_slip_store'])->name('delivery-upload');
// Route::post('/delivery-shipping-store-ttd', [DeliveryOrderController::class, 'upload_form'])->name('delivery-upload');

Route::middleware([isUserKontraktor::class])->group(function(){
    Route::get('/', [DashboardCont::class, 'index'])->name('base_kontraktor');
    //all
    Route::get('/dashboard2', [DashboardCont::class, 'index2']);

    //home
    Route::get('about-us', [HomeCont::class, 'about_us']);
    Route::get('how-to-order', [HomeCont::class, 'how_to_order']);
    Route::get('faq', [HomeCont::class, 'faq']);
    Route::get('shipping_policy', [HomeCont::class, 'shipping_policy']);
    Route::get('privation_policy', [HomeCont::class, 'privation_policy']);
    Route::get('return', [HomeCont::class, 'return']);
    Route::get('terms_of_use', [HomeCont::class, 'terms_of_use']);
    Route::get('kemitraan', [HomeCont::class, 'kemitraan']);
    Route::get('griyaService', [HomeCont::class, 'griyaService']);
    Route::get('pengiriman', [HomeCont::class, 'pengiriman']);
    Route::get('retur1', [HomeCont::class, 'retur1']);
    Route::get('retur2', [HomeCont::class, 'retur2']);

    Route::get('/blogs', [KontraktorBlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/{id}', [KontraktorBlogController::class, 'show'])->name('blog.show');
    Route::get('/blogs/category/{id}', [KontraktorBlogController::class, 'blog_category'])->name('blog.blogCategory');
    Route::post('/blogs/store-comment', [KontraktorBlogController::class, 'storeComment'])->name('blog.storeComment');
    Route::resource('/contact-us', ContactUsController::class);
    //
});

//guest
Route::middleware(['guest'])->group(function(){
    Route::get('login', [LoginCont::class, 'index'])->name('kontraktor.login');
    Route::post('authLogin', [LoginCont::class, 'authLogin']);

    Route::get('register', [RegisterCont::class, 'register'])->name('kontraktor.register');
    Route::get('register/new', [RegisterCont::class, 'userInvite'])->name('kontraktor.invite');
    Route::post('register/new', [RegisterCont::class, 'addUserInvite'])->name('add.user.invite');
    Route::get('register2/{email}', [RegisterCont::class, 'register2'])->middleware(HasVerifedOTP::class)->name('kontraktor.register2');
    // Route::get('register2/{email}', [RegisterCont::class, 'register2'])->name('register2');
    Route::get('register3', [RegisterCont::class, 'register3'])->name('kontraktor.register3');

    Route::post('fillDataRegister', [RegisterCont::class, 'fillDataRegister']);
});


Route::middleware(['auth'])->group(function(){
    Route::get('logout', [LogoutCont::class, 'logout'])->name('logout');
});

//auth
Route::middleware(['auth', isUserKontraktor::class,])->group(function(){

    //kontraktor
    Route::get('account', [KontraktorCont::class, 'account']) ->name('kontraktor.account');
    Route::match(['get', 'post'], 'getProyek/{datatablesFormat?}', [ProyekCont::class, 'getProyek'])->name('kontraktor.proyek.get');
    Route::get('/credit-usage/get-data/{id}', [CreditUsageController::class, 'getData'])->name('kontraktor.creditUsage.getData');
    Route::get('/credit-payment/get-data/{id}', [CreditPaymentController::class, 'getData'])->name('kontraktor.creditPayment.getData');
    Route::get('/history-contractor/detail/{id}', [ContractorsController::class, 'getHistoryContractor'])->name('kontraktor.credit.getHistoryContractor');
    //kontraktor function
    Route::post('updateAccount', [KontraktorCont::class, 'updateAccount'])->name('kontraktor.account.update');

    //Account
    Route::post('changeEmal', [AccountCont::class, 'changeEmail'])->name('account.changeEmail');
    Route::post('changePassword', [AccountCont::class, 'changePassword'])->name('account.changePassword');
    Route::post('updateUser', [AccountCont::class, 'updateUser'])->name('account.update');

    //Proyek
    Route::get('proyek', [ProyekCont::class, 'proyek'])->name('proyek');
    Route::get('historyProyek/{id}', [ProyekCont::class, 'historyProyek'])->name('proyek.history');
    Route::delete('deleteProyek', [ProyekCont::class, 'deleteProyek'])->name('proyek.delete');
    Route::post('addProyek', [ProyekCont::class, 'addProyek'])->name('proyek.add');
    Route::get('edit-proyek/{id}', [ProyekCont::class, 'editProyek'])->name('proyek.edit');
    Route::post('update-proyek/{id}', [ProyekCont::class, 'updateProyek'])->name('proyek.update');
    Route::post('setChoicedProyek', [ProyekCont::class, 'setChoicedProyek'])->name('proyek.setChoicedProyek');
    Route::prefix('progress')->group(function(){

        Route::get('/getProgress/{id}', [ProgressController::class, 'index'])->name('progress.index');
        Route::get('/addProgress', [ProgressController::class, 'addProgress'])->name('progress.add');
        Route::post('/storeProgress', [ProgressController::class, 'store'])->name('progress.store');
        Route::get('/ajaxProgress', [ProgressController::class, 'getAll'])->name('progress.ajax');
        Route::get('/ajaxPercentage', [ProgressController::class, 'getProgress'])->name('progress.getProgress');
        Route::get('/changeStatusProgress', [ProgressController::class, 'changeStatus'])->name('progress.changeStatus');
        Route::get('/getDataEdit', [ProgressController::class, 'getDataEdit'])->name('progress.get.edit');
        Route::post('/editProgress', [ProgressController::class, 'editProgress'])->name('progress.edit');
        Route::post('/deleteProgress', [ProgressController::class, 'deleteProgress'])->name('progress.delete');

        Route::get('/detail', [ProgressController::class, 'detailProgress'])->name('progress.detail');
    }); 

    //Cart
    Route::post('manageCart', [CartCont::class, 'manageCart'])->middleware(hasChoicedProyek::class)->name('cart.manage');
    Route::post('getCart', [CartCont::class, 'getCart'])->name('cart.get');
    Route::delete('deleteCart', [CartCont::class, 'deleteCart'])->name('cart.delete');
    Route::post('setSelectedCartForBidding', [CartCont::class, 'setSelectedCartForBidding'])->name('cart.setBidding');

    //bidding
    Route::get('bidding', [BiddingCont::class, 'bidding'])->middleware(hasSessionBidding::class)->name('bidding');
    Route::post('addBidding', [BiddingCont::class, 'addBidding'])->name('bidding.add');
    Route::match(['get', 'post'], 'getBidding/{datatablesFormat?}', [BiddingCont::class, 'getBidding'])->name('bidding.get');
    Route::get('detailBidding/{id}', [BiddingCont::class, 'detailBidding'])->name('bidding.detail');
    Route::post('changeStatusBidding', [BiddingCont::class, 'changeStatusBidding'])->name('bidding.changeStatus');
    Route::post('extendsBiddingDuration', [BiddingCont::class, 'extendsBiddingDuration'])->name('bidding.extendDurations');
    Route::post('setSelectedBiddingForCheckout', [BiddingCont::class, 'setSelectedBiddingForCheckout'])->name('cart.setCheckout');

    //checkout
    Route::name('checkout.')->group(function(){
        Route::get('checkout', [CheckoutCont::class, 'checkout'])->middleware(hasSessionCheckout::class)->name('index');
        Route::post('checkoutPesanan', [CheckoutCont::class, 'checkoutPesanan'])->middleware(hasSessionCheckout::class)->name('checkout');

        //kredit kontkrator
        Route::name('credit.')->group(function(){
            Route::match(['get', 'post'], 'credit/saveCreditForm', [CheckoutCont::class, 'saveCreditForm'])->middleware(hasSessionCreditData::class)->name('store');

            Route::name('contractor.')->group(function(){
                Route::get('credit/contractor1/{pesanan_kontraktor_id?}', [CheckoutCont::class, 'contractorCredit1'])->name('credit1');
                Route::match(['get', 'post'], 'credit/contractor2', [CheckoutCont::class, 'contractorCredit2'])->middleware(hasSessionFormKredit1::class)->name('credit2');
                Route::match(['get', 'post'], 'credit/contractor3', [CheckoutCont::class, 'contractorCredit3'])->middleware(hasSessionFormKredit2::class)->name('credit3');
                Route::match(['get', 'post'], 'credit/contractor4', [CheckoutCont::class, 'contractorCredit4'])->middleware(hasSessionFormKredit3::class)->name('credit4');
            });

            Route::name('pemilikProyek.')->group(function(){
                Route::get('credit/pemilikProyek1/{pesanan_kontraktor_id?}', [CheckoutCont::class, 'proyekCredit1'])->name('credit1');
                Route::match(['get', 'post'], 'credit/pemilikProyek2', [CheckoutCont::class, 'proyekCredit2'])->middleware(hasSessionFormKredit1::class)->name('credit2');
                Route::match(['get', 'post'], 'credit/pemilikProyek3', [CheckoutCont::class, 'proyekCredit3'])->middleware(hasSessionFormKredit2::class)->name('credit3');
                Route::match(['get', 'post'], 'credit/pemilikProyek4', [CheckoutCont::class, 'proyekCredit4'])->middleware(hasSessionFormKredit3::class)->name('credit4');
            });
        });

    });

    //pesanan
    Route::name('pesanan.')->group(function(){
        Route::match(['get', 'post'], 'pesanan/get/{datatablesFormat?}', [PesananCont::class, 'getPesanan'])->name('get');
        Route::get('pesanan/detail/{id}', [PesananCont::class, 'detailPesanan'])->name('detail');
        Route::get('pesanan/printInvoice/{id}', [PesananCont::class, 'printInvoice'])->name('print');
        Route::post('pesanan/update/', [PesananCont::class, 'updatePesanan'])->name('update');

        Route::name('pengiriman.')->group(function(){
            Route::get('pesanan/detailPengiriman/{id}', [PesananCont::class, 'detailPengiriman'])->name('index');
            Route::post('pesanan/confirmPengiriman/{id}', [PesananCont::class, 'confirmPengiriman'])->name('confirm');
        });

        Route::name('retur.')->group(function(){
            Route::get('retur/{id}', [PesananCont::class, 'retur'])->name('index');
            Route::post('retur/retur/{id}', [PesananCont::class, 'returPengiriman'])->name('retur');

            Route::get('retur/progress/{id}', [PesananCont::class, 'progressRetur'])->name('progress');
        });
    });

    // Prngguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('datapengguna');
    Route::get('/data-roles', [PenggunaController::class, 'dataRoles'])->name('dataroles');
    Route::get('/role-pengguna', [PenggunaController::class, 'role'])->name('rolepengguna');
    Route::get('/edit-role/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::post('/addpengguna', [PenggunaController::class, 'store'])->name('addpengguna');
    Route::post('/undang-pengguna', [PenggunaController::class, 'sendInvitation'])->name('undangpengguna');
    Route::post('/pengguna', [PenggunaController::class, 'update'])->name('editpengguna');
    Route::post('/pengguna/role', [PenggunaController::class, 'createRole'])->name('addrolepengguna');
    Route::post('/pengguna/role/edit', [PenggunaController::class, 'editRole'])->name('editrolepengguna');
    Route::delete('/pengguna', [PenggunaController::class, 'delete'])->name('deletepengguna');
    Route::delete('/role-delete', [PenggunaController::class, 'deleteRole'])->name('deleterole');

});

// Route::fallback(fn() => Redirect::to(('https://wa.me/+6282117765162?text=Hallo, apa ada yang bisa kami bantu?')) );

//Cronjob
Route::prefix('cronjob')->name('cronjob.')->group(function(){

    Route::prefix('bidding')->name('bidding.')->group(function(){
        Route::get('runBiddingAutomatically', [CronCont::class, 'runBiddingAutomatically'])->name('start');
        Route::get('stopBiddingAutomatically', [CronCont::class, 'stopBiddingAutomatically'])->name('stop');
    });

    Route::prefix('notification')->name('notification.')->group(function(){
        Route::get('sendNotification', [NotificationController::class, 'sendNotification'])->name("notification");
    });

});

Route::prefix('admin')->middleware(['auth', isUserAdmin::class])->group(function () {
    Route::get('/dashboard-owner', DashboardAllComponents::class)->name('admin.dashboardAll');
    Route::get('/dashboard', DashboardComponents::class)->name('admin.dashboard');
    Route::get('/statistic-delivery', [DashboardController::class, 'getDelivery'])->name('admin.getDelivery');
    Route::get('/statistic-delivery-month', [DashboardController::class, 'getDeliveryMonth'])->name('admin.getDeliveryMonth');
    Route::post('/statistic-profit', [DashboardController::class, 'getProfit'])->name('admin.getProfit');
    Route::post('/statistic-sales-quotation', [DashboardController::class, 'getSalesQuotation'])->name('admin.getSalesQuotation');
    Route::post('/statistic-sales-order', [DashboardController::class, 'getSalesOrder'])->name('admin.getSalesOrder');
    Route::post('/statistic-sales-delivery', [DashboardController::class, 'getSalesDelivery'])->name('admin.getSalesDelivery');
    Route::get('/statistic-contractor-pending', [DashboardController::class, 'getListPendingContractor'])->name('admin.getListPendingContractor');
    Route::get('/statistic-supplier-pending', [DashboardController::class, 'getListPendingSupplier'])->name('admin.getListPendingSupplier');   
    Route::get('/statistic-average', [DashboardController::class, 'getAverage'])->name('admin.getAverage');
    Route::get('/statistic-ratio', [DashboardController::class, 'getRatioFromProcess'])->name('admin.getRatio');
    Route::get('/statistic-payment', [DashboardController::class, 'getPayment'])->name('admin.getPaymentTableData');
    Route::get('/statistic-best-product', [DashboardController::class, 'getBestProduct'])->name('admin.getBestProductData');
    Route::get('/statistic-top-customer', [DashboardController::class, 'getTopCustomer'])->name('admin.getTopCustomer');
    Route::get('/statistic-top-suppliers', [DashboardController::class, 'getTopSupplier'])->name('admin.getTopSupplier');
    Route::get('/statistic-sq-to-so', [DashboardController::class, 'getDataSqSo'])->name('admin.getDataSqSo');
    Route::get('/statistic-so-to-sd', [DashboardController::class, 'getDataSoSd'])->name('admin.getDataSoSd');
    Route::get('/statistic-sd-to-si', [DashboardController::class, 'getDataSdSi'])->name('admin.getDataSdSi');
    Route::get('/statistic-sr-to-sq', [DashboardController::class, 'getDataSrSq'])->name('admin.getDataSrSq');
    Route::get('/average-transaction-time', [DashboardController::class, 'avgtt'])->name('admin.avgtt');
    Route::get('/sales-quote', [DashboardController::class, 'getSalesQuote'])->name('admin.getSq');
    Route::get('/sales-order', [DashboardController::class, 'getSalesOrders'])->name('admin.getSo');
    Route::get('/sales-invoice', [DashboardController::class, 'getSalesInvoice'])->name('admin.getSi');
    Route::get('/on-progress', [DashboardController::class, 'onProgressTicketing'])->name('admin.onProgress');
    Route::get('/dashboard/sales-quote/{id}', SalesQuoteComponents::class)->name('admin.sq');
    Route::get('/dashboard/sales-order/{id}', DashboardSalesOrderComponents::class)->name('admin.so');
    Route::get('/dashboard/sales-invoice/{id}', DashboardSalesInvoiceComponents::class)->name('admin.si');

    //? Report
    Route::get('/report', ReportComponents::class)->name('admin.report');
    Route::get('/data-report-sqso', [ReportController::class, 'sqToSo'])->name('admin.report.sqso');
    Route::get('/data-report-sosd', [ReportController::class, 'soToSd'])->name('admin.report.sosd');
    Route::get('/data-report-invpay', [ReportController::class, 'invPay'])->name('admin.report.invpay');
    Route::get('/data-report-excel', [ReportController::class, 'export'])->name('admin.report.export');
    Route::get('/data-report-excelSoSd', [ReportController::class, 'exportSoSd'])->name('admin.report.exportSoSd');
    Route::get('/data-report-excelInvDelivery', [ReportController::class, 'exportInvDel'])->name('admin.report.exportInvDel');
    Route::get('/data-report-poin', [ReportController::class, 'exportPoin'])->name('admin.report.poin');

    //? Master Data
    Route::prefix('settings')->middleware(['can:Settings.view'])->group(function () {

        //* Parameters
        Route::prefix('parameters')->middleware(['can:Parameter.view'])->group(function () {
            Route::get('/', ParameterComponents::class)->name('admin.parameter.index');
            Route::resource('/parameter-data', ParametersController::class);
        });

        //* Satuan
        Route::prefix('satuan')->middleware(['can:Satuan.view'])->group(function () {
            Route::get('/', SatuanComponents::class)->name('admin.satuan.index');
            Route::resource('/satuan-data', SatuanController::class);
        });

        //* Category
        Route::prefix('category')->middleware(['can:Category.view'])->group(function () {
            Route::get('/', CategoryComponents::class)->name('admin.category.index');

            Route::resource('/category-header-data', CategoryHeaderController::class);
            Route::post('/category-header-data/doUpdate/{id}', [CategoryHeaderController::class, 'update'])->name('category.header.update');

            Route::resource('/category-subheader-data', CategorySubHeaderController::class);
            Route::resource('/category-detail-data', CategoryDetailController::class);
        });


        //* Ekspedisi
        Route::prefix('ekspedisi')->middleware(['can:Ekspedisi.view'])->group(function () {
            Route::get('/', EkspedisiComponents::class)->name('admin.ekspedisi.index');
            Route::resource('/ekspedisi-data', EkspedisiController::class);
        });

        //* Carousel
        Route::prefix('carousel')->middleware(['can:Carousel.view'])->group(function () {
            Route::get('/', CarouselComponents::class)->name('admin.carousel.index');
            Route::resource('/carousel-data', CarouselController::class);
        });

        //* ReasonCategory
        Route::prefix('reason-category')->middleware(['can:Settings.view'])->group(function () {
            Route::get('/', MasterReasonCategoryComponents::class)->name('admin.reasonCategory.index');
            Route::resource('/reason-category-data', ReasonCategoryController::class);
        });

        //* Blog
        Route::prefix('blog')->middleware(['can:Carousel.view'])->group(function () {
            Route::get('/', BlogComponents::class)->name('admin.blog.index');
            Route::get('/create', AddBlogComponents::class)->name('admin.blog.create');
            Route::post('/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::get('/edit/{id}', EditBlogComponents::class)->name('admin.blog.edit');
            Route::resource('/blog-data', BlogController::class);
            Route::post('/upload-image', [BlogController::class, 'upload_image'])->name('blog-data.uploadImage');

            
            //* Category Blog
            Route::prefix('blog-category')->middleware(['can:Carousel.view'])->group(function () {
                Route::get('/', BlogCategoryComponents::class)->name('admin.categoryBlog.index');
                Route::resource('/blog-category-data', BlogCategoryController::class);
            });
        });

        //? User Management
        Route::prefix('users-management')->middleware(['can:User Management.view'])->group(function () {
            //* Users
            Route::prefix('users')->group(function () {
                Route::get('/', UsersComponents::class)->name('admin.users.index');
                Route::get('/user-data', [UsersController::class, 'index'])->name('user-data.index');
                Route::get('/user-data/show/{id}', [UsersController::class, 'show'])->name('user-data.show');
                Route::post('/user-data/store', [UsersController::class, 'store'])->name('user-data.store');
                Route::post('/user-data/update/{id}', [UsersController::class, 'update'])->name('user-data.update');
                Route::delete('/user-data/destroy/{id}', [UsersController::class, 'destroy'])->name('user-data.destroy');
            });

            //* Roles
            Route::prefix('roles')->group(function () {
                Route::get('/', RolesComponents::class)->name('admin.roles.index');
                Route::resource('/role-data', RolesController::class);
            });

            //* Permissions
            Route::prefix('permissions')->group(function () {
                Route::get('/', PermissionsComponents::class)->name('admin.permissions.index');
                Route::resource('/permission-data', PermissionsController::class);
            });
        });

        //* Deposit
        Route::prefix('deposit')->middleware(['can:Deposit.view'])->group(function () {
            Route::get('/', DepositComponents::class)->name('admin.deposit.index');
            Route::resource('/deposit-data', DepositController::class);
        });
    });

    //? Message
    Route::prefix('message')->middleware(['can:Message.view'])->group(function () {
        Route::get('/', MessageComponents::class)->name('admin.message.index');
        Route::resource('/message-data', InboxController::class);
    });

    //? Message
    Route::prefix('contact')->middleware(['can:Contact.view'])->group(function () {
        Route::get('/', ContactComponents::class)->name('admin.contact.index');
        
        //? Supplier
        Route::prefix('suppliers')->middleware(['can:Supplier.view'])->group(function () {
            Route::get('/', SupplierComponents::class)->name('admin.supplier.index');
            Route::resource('/supplier-data', SuppliersController::class);
            Route::get('/create', AddSupplierComponents::class)->name('admin.supplier.create');
            Route::post('/update/{id}', [SuppliersController::class, 'update'])->name('admin.supplier.update');
            Route::post('/activated/{id}', [SuppliersController::class, 'activated'])->name('admin.supplier.activated');
            Route::post('/disabled/{id}', [SuppliersController::class, 'disabled'])->name('admin.supplier.disabled');
            Route::get('/show/{id}', DetailSupplierComponents::class)->name('admin.supplier.show');
            Route::get('/edit/{id}', EditSupplierComponents::class)->name('admin.supplier.edit');
            Route::get('/download', [SuppliersController::class, 'download'])->name('admin.supplier.download');
            Route::post('/import', [SuppliersController::class, 'import'])->name('admin.supplier.import');
            Route::post('/add-supplier', [SuppliersController::class, 'addSupplier'])->name('admin.supplier.add');
        });

        //? Retail
        Route::prefix('retails')->middleware(['can:Retail.view'])->group(function () {
            Route::get('/create', AddRetailComponents::class)->name('admin.retail.create');
            Route::post('/store', [ContractorsController::class, 'storeRetail'])->name('admin.retail.store');
            Route::get('/detail/pic/{id}', [RetailController::class, 'getAllPic'])->name('admin.retail.details.pics');
            Route::get('/detail/bank/{id}', [RetailController::class, 'getAllBank'])->name('admin.retail.details.banks');
            Route::post('/update/pic/{id}', [RetailController::class, 'updatePic'])->name('admin.retail.details.update.pic');
            Route::get('/delete/pic/{id}', [RetailController::class, 'deletePic'])->name('admin.retail.details.delete.pic');
            Route::post('/add/pic/{id}', [RetailController::class, 'addPic'])->name('admin.retail.details.add.pic');
            Route::post('/update/bank/{id}', [RetailController::class, 'updateBank'])->name('admin.retail.details.update.bank');
            Route::get('/delete/bank/{id}', [RetailController::class, 'deleteBank'])->name('admin.retail.details.delete.bank');
            Route::post('/add/bank/{id}', [RetailController::class, 'addBank'])->name('admin.retail.details.add.bank');
            Route::post('/update/retail/{id}', [RetailController::class, 'updateRetail'])->name('admin.retail.update');
            Route::get('/update/retail/order-history/{id}', [RetailController::class, 'getOrderHistory'])->name('admin.retail.historyOrder');
            Route::get('/show/{id}', DetailRetailComponents::class)->name('admin.retail.show');
            Route::get('/edit/{id}', EditRetailComponents::class)->name('admin.retail.edit');
            // Route::get('/', SupplierComponents::class)->name('admin.supplier.index');
            // Route::resource('/supplier-data', SuppliersController::class);
            // Route::get('/create', AddSupplierComponents::class)->name('admin.supplier.create');
            // Route::post('/update/{id}', [SuppliersController::class, 'update'])->name('admin.supplier.update');
            // Route::post('/activated/{id}', [SuppliersController::class, 'activated'])->name('admin.supplier.activated');
            // Route::post('/disabled/{id}', [SuppliersController::class, 'disabled'])->name('admin.supplier.disabled');
            // Route::get('/show/{id}', DetailSupplierComponents::class)->name('admin.supplier.show');
            // Route::get('/edit/{id}', EditSupplierComponents::class)->name('admin.supplier.edit');
            // Route::get('/download', [SuppliersController::class, 'download'])->name('admin.supplier.download');
            // Route::post('/import', [SuppliersController::class, 'import'])->name('admin.supplier.import');
            // Route::post('/add-supplier', [SuppliersController::class, 'addSupplier'])->name('admin.supplier.add');
        });

        //? Contractors
        Route::prefix('contractors')->middleware(['can:Contractor.view'])->group(function () {
            Route::get('/', ContractorComponents::class)->name('admin.contractor.index');
            Route::resource('/contractor-data', ContractorsController::class);
            Route::get('/create', AddContractorComponents::class)->name('admin.contractor.create');
            Route::post('/update/{id}', [ContractorsController::class, 'update'])->name('admin.contractor.update');
            Route::post('/activated/{id}', [ContractorsController::class, 'activated'])->name('admin.contractor.activated');
            Route::post('/disabled/{id}', [ContractorsController::class, 'disabled'])->name('admin.contractor.disabled');
            Route::get('/show/{id}', DetailContractorComponents::class)->name('admin.contractor.show');
            Route::get('/edit/{id}', EditContractorComponents::class)->name('admin.contractor.edit');
            Route::get('/download', [ContractorsController::class, 'download'])->name('admin.contractor.download');
            Route::post('/import', [ContractorsController::class, 'import'])->name('admin.contractor.import');
            Route::get('/index/retail', [RetailController::class, 'index'])->name('admin.retail.index');
            
            
            Route::get('/history/{id}', [ContractorsController::class, 'getHistory'])->name('admin.contractor.getHistory');
            Route::get('/history/detail/{id}', [ContractorsController::class, 'getDetailHistory'])->name('admin.contractor.getDetailHistory');
            Route::get('/history-contractor/detail/{id}', [ContractorsController::class, 'getHistoryContractor'])->name('admin.contractor.getHistoryContractor');
            Route::post('/add-customer', [ContractorsController::class, 'addCustomer'])->name('admin.contractor.customer');
        });
        // Route::resource('/message-data', InboxController::class);
    });

    //? Ticketing
    Route::get('/ticketing', TicketComponents::class)->name('ticket.index');
    Route::post('/ticketing-all', [TicketingController::class, 'get_ticket_permission'])->name('ticket.permission');
    Route::get('/ticketing-get-data', [TicketingController::class, 'index'])->name('ticket.alldata');
    Route::get('/ticketing-get-data-waitlist', [TicketingController::class, 'indexWaitList'])->name('ticket.alldata.waitinglist');
    Route::get('/ticketing-get-delivery', [TicketingController::class, 'get_delivery'])->name('ticket.DataDelivery');
    Route::get('/ticketing-get-quantities', [TicketingController::class, 'get_quantities'])->name('ticket.Quantities');
    Route::post('/ticketing-get-permission', [TicketingController::class, 'check_permission'])->name('ticket.CheckAuth');
    Route::get('/ticketing-submit-permission', [TicketingController::class, 'submit_permission'])->name('ticket.SubmitAuth');

    //? Project
    Route::prefix('projects')->middleware(['can:Project.view'])->group(function () {
        Route::get('/', ProjectComponents::class)->name('admin.project.index');
        Route::resource('/project-data', ProjectController::class);
        Route::get('/get-by-contractor/{id}', [ProjectController::class, 'get_by_contractor'])->name('admin.project.getByContractor');
        Route::get('/get-data/{id}', [ProjectController::class, 'getData'])->name('admin.project.getData');
        Route::get('/create', AddProjectComponents::class)->name('admin.project.create');
        Route::get('/edit/{id}', EditProjectComponents::class)->name('admin.project.edit');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::get('/show/{id}', DetailProjectComponents::class)->name('admin.project.show');
    });

    //? Products
    Route::prefix('products')->middleware(['can:Product.view'])->group(function () {
        Route::get('/', ProductComponents::class)->name('admin.product.index');
        Route::resource('/product-data', ProductsController::class);
        Route::post('/upload-image', [ProductsController::class, 'upload_image'])->name('product-data.uploadImage');
        Route::delete('/delete-images/{id}', [ProductsController::class, 'delete_image'])->name('product-data.deleteImage');
        Route::get('/create', AddProductComponents::class)->name('admin.product.create');
        Route::post('/update/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
        Route::get('/show/{id}', DetailProductComponents::class)->name('admin.product.show');
        Route::get('/edit/{id}', EditProductComponents::class)->name('admin.product.edit');
        Route::get('/download', [ProductsController::class, 'download'])->name('admin.product.download');
        Route::post('/import', [ProductsController::class, 'import'])->name('admin.product.import');
        
        Route::get('/get-product-satuan/{id}', [ProductsController::class, 'getProductSatuan'])->name('admin.product.getProductSatuan');
        Route::get('/find-product-satuan/{id}', [ProductsController::class, 'findProductSatuan'])->name('admin.product.findProductSatuan');
    });

    //? Delivery Order
    Route::prefix('delivery-order')->group(function () {
        Route::get('/', DeliveryOrderComponents::class)->name('admin.deliveryOrder.index');
        Route::get('/create', AddDeliveryOrder::class)->name('admin.deliveryOrder.create');
        Route::get('/edit/{code}', EditDeliveryOrder::class)->name('admin.deliveryOrder.edit');
        Route::get('/detail/{code}', DetailDeliveryOrder::class)->name('admin.deliveryOrder.detail');
        Route::resource('/delivery-order-data', DeliveryOrderController::class);
        Route::resource('/delivery-data', DeliveryController::class);
        Route::post('/set-arrive/{id}', [DeliveryOrderController::class, 'set_arrive'])->name('admin.deliveryOrder.setArrive');
    });

    //? Payment
    Route::prefix('payment')->group(function () {
        Route::get('/', PaymentComponents::class)->name('admin.payment.index');
        Route::resource('/payment-data', PaymentsController::class);
        Route::post('/varified/{id}', [PaymentsController::class, 'verification'])->name('admin.payment.verif');
        Route::post('/un-verified/{id}', [PaymentsController::class, 'unVerification'])->name('admin.payment.unVerif');
    });

    //? Sales
    Route::prefix('sales')->middleware(['can:Sales.view'])->group(function () {
        Route::post('/ekspektasi-kirim/add', [DetailBiddingController::class, 'addDelivery'])->name('admin.ekspektasi.add');
        Route::post('/ekspektasi-kirim/update', [DetailBiddingController::class, 'updateDelivery'])->name('admin.ekspektasi.update');

          //? Bidding
        Route::prefix('bidding')->middleware(['can:Bidding.view'])->group(function () {
            Route::get('/', BiddingComponents::class)->name('admin.bidding.index');
            Route::resource('/bidding-data', BiddingController::class);
            Route::resource('/bidding-detail-data', DetailBiddingController::class);
            Route::post('/new-bid/update/{id}', [DetailBiddingController::class, 'update'])->name('admin.bidding.update');
            Route::post('/bidding-detail-end-bidding/{id}', [BiddingController::class, 'end_bidding'])->name('admin.bidding-detail.endBidding');
            Route::post('/extend-bidding/{id}', [BiddingController::class, 'extend_bidding'])->name('admin.extend-bidding');
            Route::post('/storeByRequest/{id}', [BiddingController::class, 'storeByRequest'])->name('admin.storeByRequest');

            Route::get('/bidding-detail-table/{id}', [DetailBiddingController::class, 'index'])->name('admin.bidding-detail.table');
            Route::get('/detail-lelang/{id}', [DetailBiddingController::class, 'getLelangDetail'])->name('admin.bidding-detail.getLelangDetail');
            Route::get('/show/{id}', DetailBiddingComponents::class)->name('admin.bidding.show');
            Route::get('/edit/{id}', EditBiddingComponents::class)->name('admin.bidding.edit');
            Route::get('/create/{id?}', AddBiddingComponents::class)->name('admin.bidding.create');
            Route::get('/set-bidding/{id}', SetBiddingComponents::class)->name('admin.bidding.set');

            Route::get('/new-bidding/{id}', NewBiddingComponents::class)->name('admin.newbidding.set');
            Route::get('/new-set-bidding/{id}', NewSetBiddingComponents::class)->name('admin.newsetbidding');

            Route::get('/livewire-export', [BiddingController::class, 'download'])->name('export-lelang-to-excel');
            Route::get('/get-last-bid', [BiddingController::class, 'getLastBid'])->name('admin.bidding.getLastBid');
            // Route::get('/livewire', [BiddingController::class, 'fetchData']);
        });

        Route::get('/', SalesComponents::class)->name('admin.sales.index');

        //* Sales Quotation
        Route::prefix('sales-quotation')->group(function () {
            Route::resource('/sales-quotation-data', SalesQuotationController::class);
            Route::delete('/delete', [SalesQuotationController::class,'destroy'])->name('admin.sales_quotation.delete');
            Route::get('/create/{id}', AddSalesQuotationComponents::class)->name('admin.salesQuotation.create');
            Route::get('/detail/{id}', DetailSalesQuotationComponents::class)->name('admin.salesQuotation.detail');
            Route::get('/edit/{id}', EditSalesQuotationComponents::class)->name('admin.salesQuotation.edit');
            Route::post('/send_email/{id}', [SalesQuotationController::class, 'send_email'])->name('admin.salesQuotation.sendEmail');
            Route::post('/make_order/{id}', [SalesQuotationController::class, 'make_order'])->name('admin.salesQuotation.makeOrder');
            Route::post('/make_quote', [SalesQuotationController::class, 'make_quote'])->name('admin.salesQuotation.makeQuote');
            Route::delete('/delete/{id}', [SalesQuotationController::class, 'delete'])->name('admin.salesQuotation.delete');
            Route::post('/close/{id}', [SalesQuotationController::class, 'closeSQ'])->name('admin.salesQuotation.closeSQ');
            Route::get('/autocloseSQ', [SalesQuotationController::class, 'autocloseSQ'])->name('admin.salesQuotation.autocloseSQ');
            
            Route::get('/download', [SalesQuotationController::class, 'download'])->name('admin.salesQuotation.download');
            Route::post('/import', [SalesQuotationController::class, 'import'])->name('admin.salesQuotation.import');
            
            Route::post('/get-data-jurnal', [SalesQuotationController::class, 'getDataJurnal'])->name('admin.salesQuotation.getDataJurnal');


            Route::get('/index-sales-request', [SalesRequestController::class, 'index'])->name('admin.index.salesRequest');
            Route::get('/add-sales-request', AddSalesRequestComponents::class)->name('admin.add.salesRequest');
            Route::get('/show-sales-request/{id}', DetailSalesRequestComponents::class)->name('admin.show.salesRequest');
            Route::get('/edit-sales-request/{id}', EditSalesRequestComponents::class)->name('admin.edit.salesRequest');
        });


        //* Sales Delivery
        Route::prefix('sales-delivery')->group(function () {
            Route::resource('/sales-delivery-data', SalesDeliveryController::class);
            Route::delete('/delete', [SalesDeliveryController::class,'destroy'])->name('admin.sales_delivery.delete');
            Route::get('/create/{code?}', AddSalesDeliveryComponents::class)->name('admin.salesDelivery.create');
            Route::get('/detail/{id}', DetailSalesDeliveryComponents::class)->name('admin.salesDelivery.detail');
            Route::get('/edit/{id}', EditSalesDeliveryComponents::class)->name('admin.salesDelivery.edit');
            Route::post('/send_email/{id}', [SalesDeliveryController::class, 'send_email'])->name('admin.salesDelivery.sendEmail');
            Route::post('/make_order/{id}', [SalesDeliveryController::class, 'make_order'])->name('admin.salesDelivery.makeOrder');
            Route::get('/pdf/{id}', [SalesDeliveryController::class, 'print_pdf'])->name('admin.salesDelivery.printPdf');

            Route::get('/tracking', [SalesDeliveryController::class, 'get_tracking'])->name('get_tracking');
            Route::post('/trackingUpdate', [SalesDeliveryController::class, 'update_tracking'])->name('update_tracking');
            Route::post('/upload-delivery-evidence', [DeliveryOrderController::class, 'upload_evidence'])->name("product-data.uploadEvidence");
            Route::post('/store-delivery-evidence', [DeliveryOrderController::class, 'store_evidence'])->name("product-data.storeEvidence");
            Route::post('/delete-img-evidence', [DeliveryOrderController::class, 'delete_img_evidence'])->name("product-data.deleteEvidence");
        });

        // Route::get('/', CreditApplicationComponents::class)->name('admin.creditApplication.index');
        // Route::get('/detail/{id}', DetailCreditApplicationComponents::class)->name('admin.detailCreditApplication.index');
        // Route::post('/approve/{id}', [CreditApplicationController::class, 'approve'])->name('admin.creditApplication.approve');
        // Route::post('/reject/{id}', [CreditApplicationController::class, 'reject'])->name('admin.creditApplication.reject');

        Route::prefix('sales-order')->name('admin.so.')->group(function(){
            Route::get('/', [SalesOrderComponents::class, 'render'])->name('index');
            Route::post('/getData', [SalesOrderComponents::class, 'getData'])->name('get');
            Route::prefix('create')->name('create.')->group(function(){
                Route::get('/', AddSalesOrderComponents::class)->name('index');
            });
            Route::post('/sendEmail/{id}', [SalesOrderController::class, 'sendEmailSalesInvoice'])->name('sendEmail');
            Route::prefix('update')->name('update.')->group(function(){
                Route::get('/{id}', UpdateSalesOrderComponents::class)->name('index');
                Route::post('update/{id}', [SalesOrderController::class, 'updateSalesOrder'])->name('update');
                Route::post('update-data/{id}', [SalesOrderController::class, 'update'])->name('updateData');
            });
            Route::get('/all', [SalesOrderController::class, 'index'])->name('getAll');
            Route::delete('pesanan/delete', [SalesOrderController::class, 'destroy'])->name('delete');

            Route::get('/', AddSalesOrderComponents::class)->name('addOrder');
            Route::get('/edit/{id}', EditSalesOrderComponents::class)->name('editOrder');
            Route::post('/store-order', [SalesOrderController::class, 'store'])->name('storeOrder');
            Route::post('/check-credit/{id}', [SalesOrderController::class, 'checkCredit'])->name('checkCredit');
        });

        Route::prefix('sync-jurnal')->group(function(){
            Route::post('/get-last-sync', [SyncJurnalController::class, 'getLastSync'])->name('sync.getLastSync');
            Route::post('/get-data-sales-quotation', [SyncJurnalController::class, 'syncSalesQuotation'])->name('sync.salesQuotation');

            Route::post('/get-data-sales-order', [SyncJurnalController::class, 'syncSalesOrder'])->name('sync.salesOrder');

            Route::post('/get-data-purchase-order', [SyncJurnalController::class, 'syncPurchaseOrder'])->name('sync.purchaseOrder');

            Route::post('/get-data-sales-payment', [SyncJurnalController::class, 'syncSalesPayment'])->name('sync.salesPayment');
            
            Route::post('/get-data-sales-delivery', [SyncJurnalController::class, 'syncSalesDelivery'])->name('sync.salesDelivery');

            Route::post('/get-data-sales-invoice', [SyncJurnalController::class, 'syncSalesInvoice'])->name('sync.salesInvoice');

            Route::post('/get-data-receive-payment', [SyncJurnalController::class, 'syncReceivePayment'])->name('sync.receivePayment');

            Route::post('/get-data-purchase-delivery', [SyncJurnalController::class, 'syncPurchaseDelivery'])->name('sync.purchaseDelivery');
        });

            //?Sales Invoice
        Route::prefix('sales-invoice')->name('admin.salesInvoice.')->group(function(){
            // Route::get('/');
            Route::match(['get', 'post'] ,'/getSalesInvoice/{datatablesFormat?}', [SalesInvoiceController::class, 'getSalesInvoice'])->name('get');
            Route::get('/create', AddSalesInvoiceComponents::class)->name('create');
            Route::post('/addSalesInvoice', [SalesInvoiceController::class, 'addSalesInvoice'])->name('addInvoice');
            Route::post('/add', [SalesInvoiceController::class, 'addSI'])->name('add');
            Route::get('/detail/{id}', DetailSalesInvoiceComponents::class)->name('detail');
            Route::get('/edit/{id}', EditSalesInvoiceComponents::class)->name('edit');
            Route::post('/update/{id}', [SalesInvoiceController::class, 'updateSalesInvoice'])->name('update');
            Route::post('/upload-tt/{id}', [SalesInvoiceController::class, 'uploadtt'])->name('uploadtt');
            Route::post('/update-data/{id}', [SalesInvoiceController::class, 'updateData'])->name('updateData');
            Route::post('/confirmReceivePayment/{id}', [SalesInvoiceController::class, 'confirmReceivePayment'])->name('confirmReceivePayment');
            Route::match(['get', 'post'], '/downloadSalesInvoice/{id}', [SalesInvoiceController::class, 'downloadSalesInvoice'])->name('downloadSalesInvoice');
            Route::post('/sendSalesInvoiceMail/{id}', [SalesInvoiceController::class, 'sendSalesInvoiceMail'])->name('sendMail');
            Route::delete('/delete', [SalesInvoiceController::class, 'destroy'])->name('destroy');
            Route::get('/tes', [SalesInvoiceController::class, 'tes'])->name('tes');
            Route::get('/get-data-invoice', [SalesInvoiceController::class, 'index'])->name('index');
            Route::get('/getInvoiceByContractor/{id}', [SalesInvoiceController::class, 'getInvoiceByContractor'])->name('getInvoiceByContractor');
        });

          //* Sales Order Payment
          Route::prefix('sales-order-payment')->group(function () {
            Route::get('/{id}', AddSalesOrderPaymentComponents::class)->name('admin.salesOrderPayment.create');
            Route::get('/edit/{id}', EditSalesOrderPaymentComponents::class)->name('admin.salesOrderPayment.edit');
            Route::resource('/sales-order-payment-data', SalesOrderPaymentController::class);
            Route::post('/upload-image', [SalesOrderPaymentController::class, 'upload_image'])->name('sales-order-payment-data.uploadImage');
            Route::post('/update-data/{id}', [SalesOrderPaymentController::class, 'update'])->name('sales-order-payment-data.updateData');
            Route::delete('/delete-images/{id}', [SalesOrderPaymentController::class, 'delete_image'])->name('sales-order-payment-data.deleteImage');
            // Route::delete('/delete', [SalesQuotationController::class,'destroy'])->name('admin.sales_quotation.delete');
        });

        
        //* Receive Payment
        Route::prefix('sales-receive-payment')->group(function () {
            Route::resource('/receive-payment-data', ReceivePaymentController::class);
            Route::get('/add/{id?}', AddSalesReceivePaymentComponents::class)->name('admin.receivePayment.create');
            Route::get('/detail/{id?}', DetailSalesReceivePaymentComponents::class)->name('admin.receivePayment.detail');
            Route::post('/upload-image', [ReceivePaymentController::class, 'upload_image'])->name('receive-payment-data.uploadImage');
            Route::post('/update-data/{id}', [ReceivePaymentController::class, 'update'])->name('receive-payment-data.updateData');
            Route::delete('/delete-images/{id}', [ReceivePaymentController::class, 'delete_image'])->name('receive-payment-data.deleteImage');
            // Route::delete('/delete', [SalesQuotationController::class,'destroy'])->name('admin.sales_quotation.delete');
        });


        //* Proforma Invoice
        Route::prefix('proforma-inv')->group(function(){
            Route::get('/{id}', AddProformaInvComponents::class)->name('proformaInv.create');
            Route::post('/create/{id}', [ProformaInvController::class, 'store'])->name('proformaInv.store');
            Route::get('/cetak/{id}', [ProformaInvController::class, 'cetak'])->name('proformaInv.cetak');
            Route::get('detail/{id}', DetailProformaInvoice::class)->name('proformaInv.detail');
            Route::get('edit/{id}', EditProformaInvoice::class)->name('proformaInv.edit');
            Route::post('update/{id}', [ProformaInvController::class, 'update'])->name('proformaInv.update');
            Route::get('delete/{id}', [ProformaInvController::class, 'delete'])->name('proformaInv.delete');
        });
    });

    //? Purchase
    Route::prefix('purchase')->middleware(['can:SupplierOrder.view'])->group(function () {
        Route::get('/', PurchaseComponents::class)->name('admin.purchase.index');

        //? Supplier Order
        Route::prefix('order-supplier')->middleware(['can:SupplierOrder.view'])->group(function () {
            Route::get('/', SupplierOrderComponents::class)->name('admin.supplierOrder.index');
            Route::get('/detail/{id}', DetailSupplierOrderComponents::class)->name('admin.supplierOrder.detail');
            Route::get('/edit/{id}', EditSupplierOrderComponents::class)->name('admin.supplierOrder.edit');
            Route::get('/print/{id}', [SupplierOrdersController::class, 'print_pdf'])->name('admin.supplierOrder.print_pdf');
            Route::post('/send_email/{id}', [SupplierOrdersController::class, 'send_email'])->name('admin.supplierOrder.sendEmail');
            Route::resource('/supplier-order-data', SupplierOrdersController::class);
        });

        //? Purchase Delivery
        Route::prefix('purchase-delivery')->middleware(['can:SupplierOrder.view'])->group(function () {
            Route::get('/detail/{id}', DetailPurchaseDeliveryComponents::class)->name('admin.purchaseDelivery.detail');
            // Route::get('/edit/{id}', EditPurchaseDeliveryComponents::class)->name('admin.purchaseDelivery.edit');
            Route::resource('/purchase-delivery-data', PurchaseDeliveryController::class);
        });

        //? Purchase Invoice
        Route::prefix('purchase-invoice')->middleware(['can:SupplierOrder.view'])->group(function () {
            Route::get('/detail/{id}', DetailPurchaseInvoiceComponents::class)->name('admin.purchaseInvoice.detail');
            // Route::get('/edit/{id}', EditPurchaseDeliveryComponents::class)->name('admin.purchaseDelivery.edit');
            Route::resource('/purchase-invoice-data', PurchaseInvoiceController::class);
        });
    });

    //? Sales Payment
    Route::prefix('sales-payment')->middleware(['can:Payment.view'])->name('admin.salesPayment.')->group(function(){
        Route::get('/', SalesPaymentComponents::class)->name('index');

        Route::prefix('sales')->name('sales.')->group(function(){
            Route::get('update/{id}', UpdateComponents::class)->name('update');
            Route::post('/store', [SalesPaymentController::class, 'store'])->name('store');
            Route::post('update/addCredit', [SalesPaymentController::class, 'addCredit'])->name('addCredit');
            Route::post('update/update/{id}', [SalesPaymentController::class, 'updatePayment'])->name('doUpdate');
            Route::post('update/receipt/{id}', [SalesPaymentController::class, 'updatePaymentReceipt'])->name('uploadReceipt');

            Route::match(['post', 'get'], 'getSalesPayment/{datatablesFormat?}', [SalesPaymentController::class, 'getSalesPayment'])->name('get');
        });
    });

    // Reimbursement
    Route::prefix('reimbursement')->middleware(['can:Reimbursement.view'])->group(function(){
        Route::get('/', AdminReimbursementComponent::class)->name('admin.reimbursement.index');
        Route::get('/index', [ReimbursementController::class, 'index'])->name('admin.reimbursement.datas');
        // Route::post('/add', [ReimbursementController::class, 'store'])->name('admin.reimbursement.add');
        Route::post('/edit-approve', [ReimbursementController::class, 'update_approval'])->name('admin.reimbursement.approve');
        Route::post('/edit-reject', [ReimbursementController::class, 'update_rejection'])->name('admin.reimbursement.reject');
    });

    // Sync Jurnal
    Route::prefix('sync-jurnal')->group(function(){
        Route::get('sq/{id}', [AdminSyncJurnalController::class, 'sq']);
        Route::get('po/{id}', [AdminSyncJurnalController::class, 'po']);
        Route::get('so/{id}', [AdminSyncJurnalController::class, 'so']);
        Route::get('convert-sq-so/{id}', [AdminSyncJurnalController::class, 'convertSqSo']);
        Route::get('product/{id}', [AdminSyncJurnalController::class, 'product']);
        Route::get('cobo', [AdminSyncJurnalController::class, 'delete']);
    });
});

    //? Application Credit
    Route::prefix('credit/credit-application')->middleware(['auth','can:Credit.view'])->group(function () {
        Route::get('/', CreditApplicationComponents::class)->name('admin.creditApplication.index');
        Route::get('/detail/{id}', DetailCreditApplicationComponents::class)->name('admin.detailCreditApplication.index');
        Route::get('/edit/{id}', EditCreditApplicationComponents::class)->name('admin.editCreditApplication.index');
        Route::post('/update/{id}', [CreditApplicationController::class, 'update'])->name('admin.editCreditApplication.update');
        Route::get('/export/{id}', [CreditApplicationController::class, 'exportData'])->name('admin.editCreditApplication.exportData');
        Route::resource('/credit-application-data', CreditApplicationController::class);
        Route::get('/has-app-credit/{id}', [CreditApplicationController::class, 'hasApplicationCredit'])->name("admin.hasApplicationCredit");
        Route::post('/approve/{id}', [CreditApplicationController::class, 'approve'])->name('admin.creditApplication.approve');
        Route::post('/reject/{id}', [CreditApplicationController::class, 'reject'])->name('admin.creditApplication.reject');
        Route::get('/get-detail/{id}', [CreditApplicationController::class, 'getDataCredit'])->name('admin.creditApplication.getDataCredit');
        Route::post('/approve-founder/{id}', [CreditApplicationController::class, 'approvalFounder'])->name('admin.creditApplication.approvalFounder');
        Route::post('/update-approve-founder/{id}', [CreditApplicationController::class, 'updateApprove'])->name('admin.creditApplication.updateApprove');
        Route::post('/decline-founder/{id}', [CreditApplicationController::class, 'declineFounder'])->name('admin.creditApplication.declineFounder');
        Route::get('/check-all-founders/{id}', [CreditApplicationController::class, 'totalFounders'])->name('admin.creditApplication.totalFounders');
        Route::get('/notifications/{id}', [NotificationController::class, 'openNotif'])->name('admin.notifications.openNotif');
        Route::get('/notif-credit-all', [CreditApplicationController::class, 'markAllNotif'])->name('admin.creditApplication.markAllNotif');
        Route::get('/updateReason/{id}', [CreditApplicationController::class, 'updateReasonDecline'])->name('admin.creditApplication.updateReasonDecline');
        Route::post('/requestLimit/{id}', [CreditApplicationController::class, 'requestUpgradeLimit'])->name('admin.creditApplication.requestUpgradeLimit');
        Route::post('/requestUpgrade/{id}', [CreditApplicationController::class, 'approveRequest'])->name('admin.creditApplication.approveRequest');
        Route::post('/requestUpdateUpgrade', [CreditApplicationController::class, 'updateRequest'])->name('admin.creditApplication.updateRequest');
        Route::get('/all-table/credit-apps', [CreditApplicationController::class, 'allTables'])->name('admin.creditApplication.allTables');
        Route::get('/order-history', [CreditApplicationController::class, 'orderHistory'])->name('admin.creditApplication.history');
        Route::get('/order-history/amount', [CreditApplicationController::class, 'historyAmount'])->name('admin.creditApplication.historyAmount');
        Route::get('/history-transaction', [CreditApplicationController::class, 'historyTransaction'])->name('admin.creditApplication.historyTransaction');
        
        Route::get('/get-province', [CreditApplicationController::class, 'get_provinces'])->name('get-province');
        Route::get('/get_city/{id}', [CreditApplicationController::class, 'get_city'])->name('get-city');
        Route::get('/get_kecamatan/{id}', [CreditApplicationController::class, 'get_kecamatan'])->name('get-kecamatan');
        Route::get('/get_kelurahan/{id}', [CreditApplicationController::class, 'get_kelurahan'])->name('get-kelurahan');

        Route::prefix('credit-usage')->group(function () {
            Route::get('/get-data/{id}', [CreditUsageController::class, 'getData'])->name('admin.creditUsage.getData');
            Route::get('/bill/get-detail/{id}', [CreditUsageController::class, 'getDetailBill'])->name('admin.creditUsage.getDetailBill');
            Route::resource('/creadit-usage-data', CreditUsageController::class);
            Route::get('/credit-details/kontraktor', [CreditUsageController::class, 'getDetailUsage'])->name('admin.creditUsage.getDetailUsage');
            Route::get('/credit-details/approval', [CreditUsageController::class, 'approveOverlimitTransactions'])->name('admin.creditUsage.approveOverlimitTransactions');
            Route::get('/credit-details/rejection', [CreditUsageController::class, 'rejectOverlimitTransactions'])->name('admin.creditUsage.rejectOverlimitTransactions');
        });

        Route::get('/detail-contractor/{id}', [ContractorsController::class, 'show'])->name('contractors.showData');
        Route::prefix('credit-payment')->group(function () {
            Route::get('/get-data/{id}', [CreditPaymentController::class, 'getData'])->name('admin.creditPayment.getData');
            Route::get('/overdue/{id}', [CreditPaymentController::class, 'overdue'])->name('admin.creditPayment.overdue');
            Route::get('/payment/get-detail/{id}', [CreditPaymentController::class, 'getDetailPayment'])->name('admin.creditPayment.getDetailPayment');
            Route::resource('/creadit-payment-data', CreditPaymentController::class);
        });

        Route::get('/history-contractor/detail/{id}', [ContractorsController::class, 'getHistoryContractor'])->name('admin.credit.getHistoryContractor');

        Route::get('/orders/{id}', [SalesOrderController::class, 'dataOrderCredit'])->name('admin.credit.getOrderContractor');
    });

Route::prefix('sales')->middleware(['auth', isUserSales::class])->group(function () {
    Route::get('/dashboard', SalesDashboardComponents::class)->name('sales.dashboard');
    Route::prefix('dashboard')->group(function () {
        Route::get('/due-payment', [SalesDashboardController::class, 'getPayment'])->name('sales.getPaymentTableData');
        Route::get('/customers', [SalesActivityController::class, 'get_customer'])->name("sales.dashboard.get-customers");
        Route::get('/persons', [SalesActivityController::class, 'get_person'])->name("sales.dashboard.get-persons");
        Route::get('/today', [SalesActivityController::class, 'get_plans_today'])->name('sales.dashboard.today.schedules');
        Route::get('/show/{id}', [SalesActivityController::class, 'show'])->name('sales.dashboard.get-activity');
        Route::post('/edit', [SalesActivityController::class, 'update_plan'])->name("sales.dashboard.edit");
        Route::post('/realization', [SalesActivityController::class, 'realizations_update'])->name("sales.dashboard.realization");
        Route::get('/del-plan-form', [SalesActivityController::class, 'delete_plan_in_form'])->name("sales.dashboard.delete.form");
        Route::get('/notification', [NotificationController::class, 'index'])->name("sales.dashboard.notifications");
        Route::get('/open-notifications/{id}', [NotificationController::class, 'update'])->name("sales.dashboard.open_notifications");
        Route::get('/read-notifications', [NotificationController::class, 'update_all'])->name("sales.dashboard.read_all_notifications");
        Route::get('/funnel', [SalesDashboardController::class, 'get_funnel_statistics'])->name("sales.dashboard.funnel");
        Route::get('/order-pie-chart', [SalesDashboardController::class, 'order_statistics'])->name("sales.dashboard.order");
        Route::get('/total-schedule', [SalesDashboardController::class, 'todayScheduleTotal'])->name("sales.dashboard.totalSchedule");
        Route::get('/today-schedule-data', [SalesDashboardController::class, 'todayScheduleData'])->name("sales.dashboard.todayScheduleData");
        Route::get('/allday-schedule-data', [SalesDashboardController::class, 'allDayScheduleData'])->name("sales.dashboard.allDayScheduleData");
    });
    
    // Report
    Route::prefix('report')->group(function(){
        Route::get('/data-report-dashboard', ReportSalesComponents::class)->name('data.sales.report');
        Route::get('/full-components', ReportDataComponents::class)->name('sales.report.full-component');
        Route::get('/sales-quotation', [SalesQuotationController::class, 'indexSQ'])->name("sales.report.sq");
        Route::get('/sales-order', [SalesOrderController::class, 'indexSO'])->name('sales.report.so');
        Route::get('/sales-delivery', [SalesDeliveryController::class, 'indexSD'])->name('sales.report.sd');
        Route::get('/sales-by-customer', ReportSalesByCustomer::class)->name("sales.report.bycustomer");
        Route::get('/sales-invoice', [SalesInvoiceController::class, 'indexSI'])->name('sales.report.si.bycustomer');
        Route::get('/sales-contact', ReportSalesContact::class)->name('sales.report.contact');
        Route::get('/sales-contact/data', [SalesQuotationController::class, 'indexContact'])->name('sales.report.contact.datas');
        Route::get('/sales-activity', ReportSalesActivity::class)->name('sales.report.activity');
        Route::get('/sales-activity/data', [SalesActivityController::class, 'indexAll'])->name('sales.report.activity.datas');
        Route::get('/sales-customer-balance', ReportSalesCustomerBalance::class)->name('sales.report.customerbalance');
        Route::get('/sales-request', ReportSalesRequest::class)->name('sales.report.req');
        Route::get('/sales-request/data', [SalesRequestController::class, 'indexReport'])->name('sales.report.request');
        Route::get('/sales-by-product', ReportSalesByProduct::class)->name('sales.report.byproduct');
        Route::get('/sales-by-product/data', [ProductsController::class, 'sales_by_product_in_sales'])->name('sales.report.byproduct.datas');
        Route::get('/sales-delivery-detail', ReportSalesDeliveryDetail::class)->name('sales.report.delivery');
        Route::get('/sales-delivery-detail/data', [DeliveryOrderController::class, 'indexDeliverySales'])->name('sales.report.delivery.datas');
        Route::get('/sales-order-completion', ReportSalesOrderCompletion::class)->name('sales.report.order-completion');
        Route::get('/sales-order-completion/data', [SalesOrderController::class, 'indexOrderCompletionSales'])->name('sales.report.order-completion.datas');
        Route::get('/sales-product-profit', ReportSalesProductProfitability::class)->name('sales.report.product-profit');
        Route::get('/sales-product-profit/data', [ProductsController::class, 'sales_product_profitable_in_sales'])->name('sales.report.product-profit.datas');
        Route::get('/sales-leads-progress', ReportSalesLeadsProgress::class)->name('sales.report.leads-progress');
        Route::get('/sales-leads-progress/data', [KontraktorController::class, 'getLeadsProgressReport'])->name('sales.report.leads-progress.datas');
        Route::get('/sales-leads-progress/salesData', [KontraktorController::class, 'getLeadsSales'])->name('sales.report.leads-sales.datas');
        Route::get('/sales-leads-progress/getSales', [KontraktorController::class, 'getAllSales'])->name('sales.get-all-sales');
        
        Route::prefix('pdf')->group(function(){
            Route::get('/export/sq/{date?}', [SalesQuotationController::class, 'exportPDFSales'])->name("sales.export.sq");
            Route::get('/export/so/{date?}', [SalesOrderController::class, 'exportPDFSales'])->name("sales.export.so");
            Route::get('/export/sd/{date?}', [SalesDeliveryController::class, 'exportPDFSales'])->name("sales.export.sd");
            Route::get('/export/si/{date?}', [SalesInvoiceController::class, 'exportPDFSales'])->name("sales.export.si");
            Route::get('/export/sa/{date?}', [SalesActivityController::class, 'exportPDFSales'])->name("sales.export.sa");
            Route::get('/export/contact/{date?}', [SalesQuotationController::class, 'exportPDFContact'])->name("sales.export.contact");
            Route::get('/export/req/{date?}', [SalesRequestController::class, 'exportPDFSales'])->name("sales.export.req");
            Route::get('/export/product/{date?}', [ProductsController::class, 'exportPDFSales'])->name("sales.export.product");
            Route::get('/export/delivery/{date?}', [DeliveryOrderController::class, 'exportPDFSales'])->name("sales.export.delivery");
            Route::get('/export/order/{date?}', [SalesOrderController::class, 'exportPDFOrderCompletion'])->name("sales.export.order-completion");
            Route::get('/export/product-profit/{date?}', [ProductsController::class, 'exportPDFProductProfit'])->name("sales.export.product-profit");
            Route::get('/export/leads/{date?}', [KontraktorController::class, 'exportPDFLeadsProgress'])->name("sales.export.leads");
            Route::get('/export/leads/{date?}', [KontraktorController::class, 'exportPDFLeadsBySales'])->name("sales.export.leads.bysales");
        });
    });

    // Leads
    Route::prefix('leads')->middleware(['can:Leads Sales.view'])->group(function () {
        Route::get('/', LeadsComponents::class)->name('sales.leads.index');
        Route::get('/index', [LeadsController::class, 'index'])->name('sales.leads.table');
        Route::get('/index-general', [LeadsController::class, 'generalContractor'])->name('sales.leads.generalContractor');
        Route::get('/action-leads', [LeadsController::class, 'actionToLeadsHistory'])->name('sales.leads.actions');
        Route::get('/add', AddLeadsComponents::class)->name('sales.leads.add');
        Route::post('/contractor-data', [LeadsController::class, 'store'])->name("sales.leads.add.contractor");
        Route::post('/contractor-data-update', [LeadsController::class, 'update'])->name("sales.leads.update.contractor");
        Route::get('/show/{id}', DetailLeadsComponents::class)->name("sales.leads.show");
        Route::get('/update-status', [LeadsController::class, 'updateLeadsStatus'])->name("sales.leads.update");
        Route::get('/delete-pic', [LeadsController::class, 'deletePic'])->name("sales.leads.delete-pic");
        Route::post('/update-pic', [LeadsController::class, 'updatePic'])->name("sales.leads.update-pic");
        Route::post('/add-pic', [LeadsController::class, 'addPic'])->name("sales.leads.add-pic");
        Route::post('/add-activity', [SalesActivityController::class, 'store'])->name("sales.leads.add-activity");
        Route::get('/delete-activity/{id}', [SalesActivityController::class, 'destroyVisitActivity'])->name("sales.leads.delete-activity");
        Route::post('/update-activity/{id}', [SalesActivityController::class, 'updateVisitActivity'])->name('sales.leads.update-activity');
        Route::get('/delete-leads/{id}', [LeadsController::class, 'destroyLeads'])->name("sales.leads.delete");
        Route::get('/edit/{id}', EditLeadsComponents::class)->name("sales.leads.edit");
        Route::post('/convert-leads', [LeadsController::class, 'convertLeads'])->name("sales.leads.convert");
    });

    // Contact
    Route::prefix('contact')->middleware(['can:Contact Sales.view'])->group(function () {
        Route::get('/', ContactsComponents::class)->name('sales.contact.index');
        Route::prefix('kontraktor')->middleware(['can:Contact Sales.view'])->group(function () {
            Route::get('/', ContractorComponents::class)->name('sales.contractor.index');
            Route::resource('/data-kontraktor', KontraktorController::class);
            Route::get('/data-kontraktor-industri', [KontraktorController::class, 'industri'])->name('data.kontraktor.industri');
            Route::get('/data-kontraktor-perorangan-owner', [KontraktorController::class, 'perorangan'])->name('data.kontraktor.perorangan.owner');
            Route::get('/data-kontraktor-kontak', [KontraktorController::class, 'kontak'])->name('data.kontraktor.kontak');
            Route::get('/data-kontraktor-perorangan', [KontraktorController::class, 'kontraktor_perorangan'])->name('data.kontraktor.perorangan');
            Route::get('/data-kontraktor-hotel', [KontraktorController::class, 'hotel'])->name('data.kontraktor.hotel');
            Route::get('/create', AddKontraktorComponents::class)->name('sales.contractor.create');
            Route::post('/update/{id}', [KontraktorController::class, 'update'])->name('sales.kontraktor.update');
            Route::get('/show/{id}', DetailKontraktorComponents::class)->name('sales.kontraktor.show');
            Route::get('/edit/{id}', EditKontraktorComponents::class)->name('sales.kontraktor.edit');
            Route::get('/delete/{id}', [KontraktorController::class, 'destroy'])->name('sales.kontraktor.delete');
            Route::get('/details/person', [KontraktorController::class, 'getPersons'])->name("sales.details.person");
            Route::post('/details/add/person', [KontraktorController::class, 'addPersons'])->name("sales.details.person.add");
            Route::post('/details/edit/person', [KontraktorController::class, 'editPersons'])->name("sales.details.person.edit");
            Route::get('/details/project', [KontraktorController::class, 'getProjects'])->name("sales.details.project");
            Route::get('/details/visit', [KontraktorController::class, 'getVisits'])->name("sales.details.visit");
            Route::post('/details/visit/add', [KontraktorController::class, 'addVisits'])->name("sales.details.visit.add");
            Route::post('/details/visit/edit', [KontraktorController::class, 'editVisits'])->name("sales.details.visit.edit");
            Route::get('/details/visit/delete/{id}', [KontraktorController::class, 'deleteVisits'])->name("sales.details.visit.delete");
            Route::get('/details/order', [KontraktorController::class, 'getOrders'])->name("sales.details.order");
            Route::get('/action-leads', [LeadsController::class, 'actionToLeadsHistory'])->name('sales.contact.actions');
        });
    });
    
    // Project
    Route::prefix('projects')->middleware(['can:Project Sales.view'])->group(function () {
        Route::resource('/proyek-sales', ProjectController::class);
        Route::get('/proyek-by-sales', [ProjectController::class, 'get_all_projects_by_sales'])->name("proyek.bysales.all");
        Route::resource('/sales-contractor-data', ContractorsController::class);
        Route::get('/', ProyekComponents::class)->name('sales.project.index');
        Route::get('/proyek-sales-pages/{id}', DetailComponents::class)->name('proyek-sales-detail');
        Route::get('/create', AddProyekComponents::class)->name('sales.project.create');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('sales.project.update');
        Route::post('/destroy/{id}', [ProjectController::class, 'destroy'])->name('sales.project.destroy');
        Route::prefix('details')->group(function(){
            Route::get('/show/{id}', DetailProyekComponent::class)->name('proyek-sales-show');
            Route::resource('/activity-sales', SalesActivityController::class);
            Route::get('/activity-sales-visit', [SalesActivityController::class, 'data_visit'])->name('get-visit');
            Route::post('/activity-sales/{id}', [SalesActivityController::class, 'updateVisitActivity'])->name('sales.update.visit');
            Route::get('/activity-sales-delete/{id}', [SalesActivityController::class, 'destroyVisitActivity'])->name('sales.destroy.visit');
            Route::post('/activity-visit/add-pic', [SalesActivityController::class, 'addPic'])->name('sales.proyekvisit.addpic');
            Route::get('/request-history/{id}', DetailAddRequestHistoryComponent::class)->name('sales.add.requestHistory');
            Route::post('/create-sales-request', [SalesRequestController::class, 'store'])->name('sales.add.salesRequest');
            Route::post('/update-sales-request/{id}', [SalesRequestController::class, 'update'])->name('sales.edit.salesDetailRequest');
            Route::get('/delete-sales-request/{id}', [SalesRequestController::class, 'delete'])->name('sales.delete.salesDetailRequest');
            Route::get('/sales-progress-project', [ProgressController::class, 'getProgressToSales'])->name('sales.index.progressProject');
            Route::get('/sales-percentage-progress-project', [ProgressController::class, 'getProgress'])->name('sales.percentage.progressProject');
            Route::get('/history-detail/{id}', [ContractorsController::class, 'getOrderHistory'])->name('sales.project.getDetailHistory');
            Route::get('/index-sales-request', [SalesRequestController::class, 'index'])->name('sales.index.salesRequest');
            Route::get('/show-sales-request/{id}', DetailShowRequestComponent::class)->name('sales.show.salesRequest');
            Route::get('/edit-sales-request/{id}', DetailEditRequestHistoryComponent::class)->name('sales.edit.salesRequest');
            Route::post('/upload-image', [ProductsController::class, 'upload_draft_image'])->name('product-data.sales.uploadImage');
            Route::post('/product-data', [ProductsController::class, 'store_product'])->name("sales.storeNewProduct");
        });
    });

    // Calendar Plan
    Route::prefix('plan')->middleware(['can:Calendar Plan.view'])->group(function () {
        Route::get('/', PlanComponents::class)->name('sales.plan.index');
        Route::post('/add', [SalesActivityController::class, 'store_plan'])->name("sales.plan.add");
        Route::post('/edit', [SalesActivityController::class, 'update_plan'])->name("sales.plan.edit");
        Route::post('/realization', [SalesActivityController::class, 'realizations_update'])->name("sales.plan.realization");
        Route::get('/get-schedules', [SalesActivityController::class, 'get_schedules'])->name("sales.schedules.get");
        Route::get('/get-plans', [SalesActivityController::class, 'get_plans'])->name("sales.plans.get");
        Route::get('/get-all-schedules', [SalesActivityController::class, 'get_all_schedules'])->name("sales.plans.get-all");
        Route::get('/get-realizations', [SalesActivityController::class, 'get_realizations'])->name("sales.plans.get-realizations");
        Route::post('/del-plans', [SalesActivityController::class, 'delete_plan'])->name("sales.plans.delete");
        Route::get('/del-plan-form', [SalesActivityController::class, 'delete_plan_in_form'])->name("sales.plans.delete.form");
        Route::get('/customers', [SalesActivityController::class, 'get_customer'])->name("sales.get-customers");
        Route::get('/persons', [SalesActivityController::class, 'get_person'])->name("sales.get-persons");
    });

    // Activity
    Route::prefix('activity')->middleware(['can:Activity Sales.view'])->group(function () {
        Route::get('/', ActivityComponents::class)->name('sales.activity.index');
        Route::get('/get_pic/{id}', [SalesActivityController::class, 'getPic'])->name('sales.activity.getPic');
        Route::post('/post_pic', [SalesActivityController::class, 'addPic'])->name('sales.activity.addPic');
        Route::get('/get_activity', [SalesActivityController::class, 'getActivity'])->name('sales.activity.getActivity');
        Route::get('/show/{id}', [SalesActivityController::class, 'show'])->name('sales.activity.show');
        Route::post('/postData', [SalesActivityController::class, 'storeActivity'])->name('sales.activity.store');
        Route::post('/updateData/{id}', [SalesActivityController::class, 'updateData'])->name('sales.activity.update');
        Route::delete('/delete/{id}', [SalesActivityController::class, 'destroy'])->name('sales.activity.destroy');
        
    });

    // Order
    Route::prefix('order')->middleware(['can:Order Sales.view'])->group(function(){
        Route::get('/', OrderComponents::class)->name('sales.order.index');
        Route::get('/index', [SalesQuotationController::class, 'get_order_request_for_sales'])->name('sales.index.orderSales');
        Route::get('/add-request', AddOrderComponent::class)->name('sales.create-request.orderSales');
        Route::get('/quotation/detail/{id}', DetailSalesQuotation::class)->name('sales.quotation.detail');
        Route::get('/order/detail/{id}', DetailSalesOrder::class)->name('sales.order.detail');
        Route::get('/delivery/detail/{id}', DetailSalesDelivery::class)->name('sales.delivery.detail');
        Route::get('/invoice/detail/{id}', DetailSalesInvoice::class)->name('sales.invoice.detail');
        Route::get('/request/detail/{id}', DetailSalesRequest::class)->name('sales.request.detail');

        Route::get('/getRequest', [SalesRequestController::class, 'salesRequestSales'])->name('sales.order.getRequest');
        Route::get('/getQuotation', [SalesController::class, 'getQuotation'])->name('sales.order.getQuotation');
        Route::get('/getOrder', [SalesController::class, 'getOrder'])->name('sales.order.getOrder');
        Route::get('/getDelivery', [SalesController::class, 'getDelivery'])->name('sales.order.getDelivery');
        Route::get('/getInvoice', [SalesController::class, 'getInvoice'])->name('sales.order.getInvoice');
    });

    // Reimbursement
    Route::prefix('reimbursement')->middleware(['can:Reimbursement Sales.view'])->group(function () {
        Route::get('/', ReimbursementComponents::class)->name('sales.reimbursement.index');
        Route::get('/index', [ReimbursementController::class, 'index'])->name('sales.reimbursement.datas');
        Route::post('/add', [ReimbursementController::class, 'store'])->name('sales.reimbursement.add');
        Route::post('/edit', [ReimbursementController::class, 'update'])->name('sales.reimbursement.update');
        Route::get('/delete', [ReimbursementController::class, 'destroy'])->name('sales.reimbursement.destroy');
        
    });

    // Setting
    Route::prefix('setting')->middleware(['can:Pengaturan.view'])->group(function () {
        Route::get('/', SettingComponents::class)->name('sales.setting.index');
        Route::post('/update-password', [UsersController::class, 'updatePasswordSales'])->name('sales.setting.update-password');
        Route::post('/update-email', [AccountCont::class, 'changeEmail'])->name('sales.changeEmail');
        Route::post('/update-name', [UsersController::class, 'settingGeneralSales'])->name('sales.changeName');
    });
    

});

Route::prefix('pdf')->group(function () {
    Route::get('/sales-quotation/{id}', [SalesQuotationController::class, 'print_pdf'])->name('admin.salesQuotation.print_pdf');
    Route::get('/export/activity/{date?}', [SalesActivityController::class, 'exportPDFActivity'])->name("sales.export.activity");
});


# Form Kredit kontraktor - pemilik-proyek
Route::controller(FormKreditC::class)->group(function () {

    Route::get('k_formKredit1', 'k_form_kredit_1')->name('kontraktor.formKredit1');
    Route::get('k_formKredit2', 'k_form_kredit_2')->name('kontraktor.formKredit2');
    Route::get('k_formKredit3', 'k_form_kredit_3')->name('kontraktor.formKredit3');
    Route::get('k_formKredit4', 'k_form_kredit_4')->name('kontraktor.formKredit4');

    Route::get('py_formKredit1', 'pm_form_kredit_1')->name('pemilik-proyek.formKredit1');
    Route::get('py_formKredit2', 'pm_form_kredit_2')->name('pemilik-proyek.formKredit2');
    Route::get('py_formKredit3', 'pm_form_kredit_3')->name('pemilik-proyek.formKredit3');
    Route::get('py_formKredit4', 'pm_form_kredit_4')->name('pemilik-proyek.formKredit4');
 });

//Coba
use App\Http\Controllers\Dump\CobaController;

Route::get('view_lelang_policy/{id}', [CobaController::class, 'view_lelang_policy']);
Route::get('view_lelang_gate/{id}', [CobaController::class, 'view_lelang_policy']);
Route::get('view_lelang_gate/{id}', [CobaController::class, 'view_lelang_policy']);
Route::get('view_lelang_gate/{id}', [CobaController::class, 'view_lelang_policy']);
Route::get('xenditInvoice/{id}', [CobaController::class, 'xenditInvoice']);

require __DIR__.'/auth.php';
