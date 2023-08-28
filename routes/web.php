<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BotMessages;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProjectPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
###############################Start Admin#################################
Auth::routes();
Auth::routes();
Route::group([],function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/create-user', [HomeController::class, 'createUser'])->name('create.user');
    Route::post('/create-user', [HomeController::class, 'createUserReq'])->name('create.user.req');
    Route::get('/users', [HomeController::class, 'users'])->name('users');
    Route::post('/delete-user/{id}', [HomeController::class, 'deleteUsers'])->name('delete.users');
    Route::post('/edite-user', [HomeController::class, 'editeUsers'])->name('edite.users');
    Route::post('/edite-user-form', [HomeController::class, 'editeUsersForm'])->name('edite.users.form');
    Route::get('/show-permeation',[HomeController::class,'showPermeation'])->name('show.permeation');
    Route::get('/edit-{id}-permeation',[HomeController::class,'editPermeation'])->name('edit.permeation');
    Route::post('/edit-permeation',[HomeController::class,'editPermeationForm'])->name('edit.permeation.form');
    Route::get('/create-permeation',[HomeController::class,'createPermeation'])->name('create.permeation');
    Route::post('/create-permeation',[HomeController::class,'createPermeationForm'])->name('create.permeation.form');
    Route::get('/types', [HomeController::class, 'types'])->name('types');
    Route::get('/create-type', [HomeController::class, 'createType'])->name('create.type');
    Route::post('/create-type', [HomeController::class, 'createTypeForm'])->name('create.type.form');
    Route::get('/edite-{id}-type', [HomeController::class, 'editeType'])->name('edite.type');
    Route::post('/edite-type', [HomeController::class, 'editeTypeForm'])->name('edite.type.form');
    Route::post('/delete-type', [HomeController::class, 'deleteType'])->name('delete.type');
    Route::get('/ads', [HomeController::class, 'ads'])->name('ads');
    Route::get('/create-ad', [HomeController::class, 'createAd'])->name('create.ad');
    Route::post('/create-ad', [HomeController::class, 'createAdForm'])->name('create.ad.form');
    Route::post('/del-re-ad', [HomeController::class, 'delReAd'])->name('del.re.ad');
    Route::get('ads-{id}-edit', [HomeController::class, 'editeAd'])->name('edite.ad');
    Route::post('ads-edit', [HomeController::class, 'editeAdForm'])->name('edite.ad.form');
    Route::get('/bots', [HomeController::class, 'bots'])->name('bots');
    Route::get('/create-bot', [HomeController::class, 'createBot'])->name('create.bot');
    Route::post('/create-bot', [HomeController::class, 'createBotForm'])->name('create.bot.form');
    Route::get('/bots-{id}-edit', [HomeController::class, 'editeBot'])->name('edite.bot');
    Route::post('/bots-edit', [HomeController::class, 'editeBotForm'])->name('edite.bot.form');
    Route::post('/bots-delete', [HomeController::class, 'deleteBotForm'])->name('delete.bot.form');
    Route::get('/best-house', [HomeController::class, 'bestHouse'])->name('best.house');
    Route::get('/houses-edit', [HomeController::class, 'editeBestHouse'])->name('edite.best.house');
    Route::post('/houses-edite', [HomeController::class, 'editeBestHouseForm'])->name('edite.best.house.form');
    Route::get('/progress', [HomeController::class, 'progress'])->name('progress');
    Route::get('/create-progress', [HomeController::class, 'createProgress'])->name('create.progress');
    Route::post('/create-progress', [HomeController::class, 'createProgressForm'])->name('create.progress.form');
    Route::get('/progress-{id}-edit', [HomeController::class, 'editProgress'])->name('edit.progress');
    Route::post('/edit-progress', [HomeController::class, 'editProgressForm'])->name('edit.progress.form');
    Route::post('/delete-progress', [HomeController::class, 'deleteProgressForm'])->name('delete.progress.form');
    Route::get('/settings', [HomeController::class, 'indexSetting'])->name('setting');
    Route::get('/settings-edit', [HomeController::class, 'editSetting'])->name('edit.setting');
    Route::post('/settings-update', [HomeController::class, 'updateSetting'])->name('edit.setting.form');
    Route::get('/pages-home', [HomePageController::class, 'index'])->name('HomePageController.index');
    Route::get('/pages-home-slide-create', [HomePageController::class, 'createSlide'])->name('HomePageController.createSlide');
    Route::get('/pages-home-partner-create', [HomePageController::class, 'createPartner'])->name('HomePageController.createPartner');
    Route::post('/pages-home-slide', [HomePageController::class, 'storeSlide'])->name('HomePageController.storeSlide');
    Route::post('/pages-home-partner', [HomePageController::class, 'storePartner'])->name('HomePageController.storePartner');
    Route::post('pages-home-slide/delete/{slide}', [HomePageController::class, 'deleteSlide'])->name('HomePageController.deleteSlide');
    Route::post('pages-home-slide/restore/{slide}', [HomePageController::class, 'restoreSlide'])->name('HomePageController.restoreSlide');
    Route::post('pages-home-partner/delete/{partner}', [HomePageController::class, 'deletePartner'])->name('HomePageController.deletePartner');
    Route::post('pages-home-partner/restore/{partner}', [HomePageController::class, 'restorePartner'])->name('HomePageController.restorePartner');
    Route::get('pages-home-slide-{slide}-edit', [HomePageController::class, 'editSlide'])->name('HomePageController.editSlide');
    Route::get('pages-home-partner-{partner}-edit', [HomePageController::class, 'editPartner'])->name('HomePageController.editPartner');
    Route::post('pages-home-slide/{slide}', [HomePageController::class, 'updateSlide'])->name('HomePageController.updateSlide');
    Route::post('pages-home-partner/{partner}', [HomePageController::class, 'updatePartner'])->name('HomePageController.updatePartner');
    Route::get('/pages-about', [AboutPageController::class, 'index'])->name('AboutPageController.index');
    Route::get('pages-about-{about}-edit', [AboutPageController::class, 'edit'])->name('AboutPageController.edit');
    Route::post('pages-about/{about}', [AboutPageController::class, 'update'])->name('AboutPageController.update');
    Route::get('/pages-contact', [ContactController::class, 'index'])->name('ContactController.index');
    Route::get('pages-contact-{contact}-edit', [ContactController::class, 'edit'])->name('ContactController.edit');
    Route::post('pages-contact', [ContactController::class, 'update'])->name('ContactController.update');
    Route::get('/pages-projects', [ProjectPageController::class, 'index'])->name('ProjectPageController.index');
    Route::get('/pages-projects-slide-create', [ProjectPageController::class, 'create'])->name('ProjectPageController.create');
    Route::post('/pages-projects-slide', [ProjectPageController::class, 'store'])->name('ProjectPageController.store');
    Route::post('pages-projects-slide/delete/{slide}', [ProjectPageController::class, 'delete'])->name('ProjectPageController.delete');
    Route::post('pages-projects-slide/restore/{slide}', [ProjectPageController::class, 'restore'])->name('ProjectPageController.restore');
    Route::get('pages-projects-slide-{slide}-edit', [ProjectPageController::class, 'edit'])->name('ProjectPageController.edit');
    Route::post('pages-projects-slide/{slide}', [ProjectPageController::class, 'update'])->name('ProjectPageController.update');
    Route::get('/pages-services', [ServiceController::class, 'index'])->name('ServiceController.index');
    Route::get('/pages-services-showTypes', [ServiceController::class, 'showTypes'])->name('ServiceController.showTypes');
    Route::get('/pages-services-{service}-create', [ServiceController::class, 'create'])->name('ServiceController.create');
    Route::post('pages-{service}-services', [ServiceController::class, 'store'])->name('ServiceController.store');
    Route::get('pages-services-{service}-edit', [ServiceController::class, 'edit'])->name('ServiceController.edit');
    Route::post('pages-services/{service}', [ServiceController::class, 'update'])->name('ServiceController.update');
    Route::post('pages-services/delete/{service}', [ServiceController::class, 'isDeleted'])->name('ServiceController.isDeleted');
    Route::post('pages-services/restore/{service}', [ServiceController::class, 'restore'])->name('ServiceController.restore');
    Route::get('/inboxes', [InboxController::class, 'index'])->name('inboxes');
    Route::post('inboxes-{id}', [InboxController::class, 'makeProcess'])->name('InboxController.makeProcess');
    Route::post('inboxes-re/{id}', [InboxController::class, 'makeDone'])->name('InboxController.makeDone');
    Route::get('/offers-create', [OfferController::class, 'create'])->name('create.offer');
    Route::post('/offers-create', [OfferController::class, 'store'])->name('OfferController.store');
    Route::get('/offers', [OfferController::class, 'index'])->name('offers');
    Route::get('/archive', [OfferController::class, 'archive'])->name('archive.offers');
    Route::post('/delete-offer-{id}',[OfferController::class, 'isDeleted'])->name('OfferController.isDeleted');
    Route::get('offers/restore/{offer}', [OfferController::class, 'restore'])->name('OfferController.restore');
    Route::get('offers/available/{offer}', [OfferController::class, 'makeAvailable'])->name('OfferController.makeAvailable');
    Route::get('offers/rented/{offer}', [OfferController::class, 'makeRented'])->name('OfferController.makeRented');
    Route::get('offers/soldout/{offer}', [OfferController::class, 'makeSoldOut'])->name('OfferController.makeSoldOut');
    Route::get('offers-{offer}-show', [OfferController::class, 'show'])->name('OfferController.show');
    Route::get('offers-{offer}-edit', [OfferController::class, 'edit'])->name('OfferController.edit');
    Route::post('offers/update/', [OfferController::class, 'updateOffer'])->name('OfferController.store.update');
    Route::get('/deals', [DealController::class, 'index'])->name('deals');
    Route::get('/deals-create', [DealController::class, 'create'])->name('create.deal');
    Route::post('deals', [DealController::class, 'store'])->name('DealController.store');
    Route::get('deals-{deal}-edit', [DealController::class, 'edit']);
    Route::post('deals/update', [DealController::class, 'update'])->name('DealController.update');
    Route::get('/links', [LinkController::class, 'index'])->name('links');
    Route::post('/edite', [LinkController::class, 'update'])->name('update.links');
    Route::post('/edite-images', [LinkController::class, 'updateImages'])->name('update.links.images');
    Route::get('/service-modals', [ServicePopController::class, 'index'])->name('services.models');
    Route::get('/service-modals-showTypes', [ServicePopController::class, 'showTypes'])->name('service.modals.showTypes');
    Route::get('/service-modals-{service}-create', [ServicePopController::class, 'create'])->name('service.create.model');
    Route::post('service-modals-{service}', [ServicePopController::class, 'store'])->name('ServicePopController.store');
    Route::get('service-modals-{service}-edit', [ServicePopController::class, 'edit'])->name('service.edite.model');
    Route::post('service-modals/{service}', [ServicePopController::class, 'update'])->name('ServicePopController.update');
    Route::post('service-modals/delete/{service}', [ServicePopController::class, 'isDeleted'])->name('service.model.isDeleted');
    Route::post('service-modals/restore/{service}', [ServicePopController::class, 'restore'])->name('service.model.restore');
    Route::get('/city', [HomeController::class, 'showCity'])->name('city');
    Route::get('/delete-{id}-city', [HomeController::class, 'deleteCity'])->name('delete-city');
    Route::get('/create-city', [HomeController::class, 'createCity'])->name('create.city');
    Route::post('/create-city', [HomeController::class, 'createCityForm'])->name('create.city.form');
    Route::get('/details', [HomeController::class, 'Details']);
});

###############################End Admin#################################

################################Site#######################################
    Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect'
        ]], function(){

    Route::get('/', [WebController::class, 'home']);
    Route::get('/services', [WebController::class, 'services']);
    Route::get('/projects', [WebController::class, 'projects']);
    Route::get('/projects-{project}-show', [WebController::class, 'oneProject']);
    Route::post('/projects-show', [WebController::class, 'detailProject'])->name('detail.project');
    Route::get('/about-us', [WebController::class, 'about']);
    Route::get('/contact-us', [WebController::class, 'contact']);
    Route::post('/contact-us', [WebController::class, 'storeMessage'])->name('WebController.storeMessage');
    Route::get('/filter-projects', [WebController::class, 'projectFilter'])->name('WebController.projectFilter');
    Route::get('/api/bot',[BotMessages::class,'index']);
    Route::get('/api/ads',[BotMessages::class,'ads']);
    Route::get('/api/sliders',[BotMessages::class,'sliders']);
});
#############################End Site#######################################
