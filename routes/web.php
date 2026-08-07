<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdvertisingAgencyContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'visitors.index')->name('home');
Route::get('/', [\App\Http\Controllers\VisitorController::class, 'index'])->name('home');
Route::view('/about', 'visitors.about')->name('about');
Route::view('/services', 'visitors.services')->name('services');
Route::view('/work', 'visitors.work')->name('work');
Route::view('/contact', 'visitors.contact')->name('contact');
Route::view('/advertising-agency-in-gurgaon', 'visitors.advertising-agency-in-gurgaon')->name('advertising-agency-in-gurgaon');
Route::view('/video-production-in-gurgaon', 'visitors.video-production-in-gurgaon')->name('video-production-in-gurgaon');


Route::view('/services/digital-marketing', 'visitors.services.digital-marketing')->name('digital-marketing');
Route::view('/services/seo', 'visitors.services.seo')->name('search-engine-optimization-seo-services');
Route::view('/services/performance-marketing', 'visitors.services.performance-marketing')->name('performance-marketing-agency');
Route::view('/services/social-media-marketing', 'visitors.services.social-media-marketing')->name('social-media-marketing-agency');
Route::view('/services/application-development', 'visitors.services.application-development')->name('application-development');

// "Web Design" was renamed to "Application Development". 301 rather than dropping
// the old URL: it has existing search rankings and inbound links, and a permanent
// redirect passes those to the new page instead of throwing them away.
// The old route name is kept as an alias so any missed route('web-design-agency')
// call still resolves rather than throwing a RouteNotFoundException.
Route::redirect('/services/web-design', '/services/application-development', 301)->name('web-design-agency');
Route::view('/services/real-estate-ads', 'visitors.services.real-estate-ads')->name('real-estate-ads');
Route::view('/services/branding', 'visitors.services.branding')->name('branding-agency');
Route::view('/services/strategy', 'visitors.services.strategy')->name('strategy-agency');


Route::view('/work/digital', 'visitors.digital')->name('digital');
Route::view('/work/print', 'visitors.print')->name('print');
Route::view('/work/print/zero-waste', 'visitors.zero_waste')->name('zero_waste');
Route::view('/work/print/mr-furniture', 'visitors.mr-furniture')->name('mr-furniture');
Route::view('/work/print/probity', 'visitors.probity')->name('probity');
Route::view('/work/print/psb-logistics', 'visitors.psb-logistics')->name('psb-logistics');
Route::view('/work/print/grafis_nusantara_sticker', 'visitors.grafis_nusantara_sticker')->name('grafis_nusantara_sticker');
Route::view('/work/print/7-sins', 'visitors.7-sins')->name('7-sins');
Route::view('/work/print/cure-j', 'visitors.cure-j')->name('cure-j');
Route::view('/work/print/s21-cafe', 'visitors.s21-cafe')->name('s21-cafe');

Route::view('/work/branding', 'visitors.branding')->name('branding');
Route::view('/work/branding/mr-furniture', 'visitors.mr_furniture')->name('mr_furniture');
Route::view('/work/branding/tobako-house', 'visitors.tobako_house')->name('tobako_house');
Route::view('/work/branding/bloom', 'visitors.bloom')->name('bloom');
Route::view('/work/branding/kobo', 'visitors.kobo')->name('kobo');
Route::view('/work/branding/printogram', 'visitors.printogram')->name('printogram');
Route::view('/work/branding/psb_logistics', 'visitors.psb_logistics')->name('psb_logistics');

Route::view('/work/website', 'visitors.website')->name('website');
Route::view('/work/website/zero-waste', 'visitors.zero-waste-website')->name('zero-waste-website');
Route::view('/work/website/probity', 'visitors.probity-website')->name('probity-website');
Route::view('/work/website/mr-skips', 'visitors.mr-skips-website')->name('mr-skips-website');
Route::view('/work/website/mr-furniture', 'visitors.mr-furniture-website')->name('mr-furniture-website');
Route::view('/work/website/psb-logistics', 'visitors.psb-logistics-website')->name('psb-logistics-website');

Route::view('/work/film', 'visitors.film')->name('film');

Route::view('/work/awards', 'visitors.awards')->name('awards');
Route::view('/work/awards/award-page-01', 'visitors.award-page-01')->name('award-page-01');

Route::view('/terms', 'visitors.terms')->name('terms');
Route::view('/thank-you', 'visitors.thank-you')->name('thank-you');
// Route::view('/blog', 'visitors.blog')->name('blog');

Route::get('/blog', [BlogController::class, 'blogs'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'blog'])->name('blog-detail');
Route::get('/tag/{slug}', [BlogController::class, 'tagBlogs'])->name('tag');
Route::get('/blog/category/{category_slug}', [BlogController::class, 'filterByCategory'])->name('blogs-category');

Route::post('/contact', [ContactController::class, 'contact'])->name('contact-submit');
Route::post('/inquiry-form', [ContactController::class, 'inquiry_form'])->name('inquiry-form');
Route::post('/task-submit', [ContactController::class, 'task_submit'])->name('task-submit');
Route::post('/project-form', [ContactController::class, 'project_form'])->name('project-form');
Route::post('/advertising-agency-contact', [AdvertisingAgencyContactController::class, 'store'])->name('advertising-agency-contact');
Route::post('/video-production-lead', [\App\Http\Controllers\VideoProductionLeadController::class, 'store'])->name('video-production-lead');
Route::post('/real-estate-lead', [\App\Http\Controllers\RealEstateLeadController::class, 'store'])->name('real-estate-lead');
Route::post('/api/voice-parse', [\App\Http\Controllers\VoiceParseController::class, 'parse'])->name('voice-parse');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




