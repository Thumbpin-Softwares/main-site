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

// Home goes through a controller, not Route::view: the page needs $projects passed
// into it. (A commented-out Route::view('/', 'visitors.index') used to sit here and
// was misleading, since rendering that view without $projects would fail.)
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
Route::view('/services/social-media-management', 'visitors.services.social-media-management')->name('social-media-management');
Route::view('/services/application-development', 'visitors.services.application-development')->name('application-development');
Route::view('/services/ai-automation', 'visitors.services.ai-automation')->name('ai-automation');
Route::view('/services/events', 'visitors.services.events')->name('events-live');
Route::view('/services/disruptive-ideas', 'visitors.services.disruptive-ideas')->name('disruptive-ideas');
Route::view('/services/friendship-with-benefits', 'visitors.services.friendship-with-benefits')->name('friendship-with-benefits');

// "Web Design" was renamed to "Application Development". 301 rather than dropping
// the old URL: it has existing search rankings and inbound links, and a permanent
// redirect passes those to the new page instead of throwing them away.
// The old route name is kept as an alias so any missed route('web-design-agency')
// call still resolves rather than throwing a RouteNotFoundException.
Route::redirect('/services/web-design', '/services/application-development', 301)->name('web-design-agency');

// Same treatment for "Social Media Marketing" -> "Social Media Management": the old
// URL keeps its rankings via the 301, and the old route name survives as an alias.
Route::redirect('/services/social-media-marketing', '/services/social-media-management', 301)->name('social-media-marketing-agency');
Route::view('/services/real-estate-ads', 'visitors.services.real-estate-ads')->name('real-estate-ads');
Route::view('/services/branding', 'visitors.services.branding')->name('branding-agency');
Route::view('/services/strategy', 'visitors.services.strategy')->name('strategy-agency');


Route::view('/work/digital', 'visitors.work.digital')->name('digital');
Route::view('/work/print', 'visitors.work.print')->name('print');
Route::view('/work/print/zero-waste', 'visitors.work.print.zero-waste')->name('zero_waste');
Route::view('/work/print/mr-furniture', 'visitors.work.print.mr-furniture')->name('mr-furniture');
Route::view('/work/print/probity', 'visitors.work.print.probity')->name('probity');
Route::view('/work/print/psb-logistics', 'visitors.work.print.psb-logistics')->name('psb-logistics');
Route::view('/work/print/grafis_nusantara_sticker', 'visitors.work.print.grafis-nusantara-sticker')->name('grafis_nusantara_sticker');
Route::view('/work/print/7-sins', 'visitors.work.print.7-sins')->name('7-sins');
Route::view('/work/print/cure-j', 'visitors.work.print.cure-j')->name('cure-j');
Route::view('/work/print/s21-cafe', 'visitors.work.print.s21-cafe')->name('s21-cafe');

Route::view('/work/branding', 'visitors.work.branding')->name('branding');
Route::view('/work/branding/mr-furniture', 'visitors.work.branding.mr-furniture')->name('mr_furniture');
Route::view('/work/branding/tobako-house', 'visitors.work.branding.tobako-house')->name('tobako_house');
Route::view('/work/branding/bloom', 'visitors.work.branding.bloom')->name('bloom');
Route::view('/work/branding/kobo', 'visitors.work.branding.kobo')->name('kobo');
Route::view('/work/branding/printogram', 'visitors.work.branding.printogram')->name('printogram');
Route::view('/work/branding/psb_logistics', 'visitors.work.branding.psb-logistics')->name('psb_logistics');

Route::view('/work/website', 'visitors.work.website')->name('website');
Route::view('/work/website/zero-waste', 'visitors.work.website.zero-waste')->name('zero-waste-website');
Route::view('/work/website/probity', 'visitors.work.website.probity')->name('probity-website');
Route::view('/work/website/mr-skips', 'visitors.work.website.mr-skips')->name('mr-skips-website');
Route::view('/work/website/mr-furniture', 'visitors.work.website.mr-furniture')->name('mr-furniture-website');
Route::view('/work/website/psb-logistics', 'visitors.work.website.psb-logistics')->name('psb-logistics-website');

Route::view('/work/film', 'visitors.work.film')->name('film');

Route::view('/work/awards', 'visitors.work.awards')->name('awards');
Route::view('/work/awards/award-page-01', 'visitors.work.awards.award-page-01')->name('award-page-01');

Route::view('/terms', 'visitors.utilities.terms')->name('terms');
Route::view('/thank-you', 'visitors.utilities.thank-you')->name('thank-you');
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




