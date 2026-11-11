<?php

use App\Http\Controllers\LeadController;
use App\Models\HomepageSetting;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TruckSeries;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    $settings = HomepageSetting::current();
    $site = SiteSetting::first() ?? new SiteSetting;
    $truckSeries = TruckSeries::where('is_active', true)->orderBy('order_column')->get();
    $products = Product::where('is_active', true)->where('is_featured', true)->orderBy('order_column')->get();
    $services = Service::where('is_active', true)->orderBy('order_column')->get();
    $posts = Post::where('is_published', true)->where('is_featured', true)->orderBy('published_at', 'desc')->get();

    return view('welcome', compact('settings', 'site', 'truckSeries', 'products', 'services', 'posts'));
})->name('home');

Route::get('/produk', function () {
    $truckSeries = TruckSeries::where('is_active', true)->orderBy('order_column')->get();
    $products = Product::with('truckSeries')->where('is_active', true)->orderBy('order_column')->get();
    $site = SiteSetting::first() ?? new SiteSetting;

    return view('pages.produk', compact('truckSeries', 'products', 'site'));
})->name('produk');

Route::get('/produk/{seriesKey}', function (string $seriesKey) {
    $seriesKeyLower = strtolower($seriesKey);
    $seriesData = config("series_data.{$seriesKeyLower}");

    $seriesModel = TruckSeries::where('key', strtoupper($seriesKey))
        ->orWhere('name', strtoupper($seriesKey))
        ->first();

    if (! $seriesData && ! $seriesModel) {
        abort(404);
    }

    $products = $seriesModel
        ? Product::where('truck_series_id', $seriesModel->id)->where('is_active', true)->orderBy('order_column')->get()
        : collect();

    $site = SiteSetting::first() ?? new SiteSetting;
    $allSeries = TruckSeries::where('is_active', true)->orderBy('order_column')->get();

    return view('pages.series-detail', compact('seriesKeyLower', 'seriesData', 'seriesModel', 'products', 'site', 'allSeries'));
})->name('produk.series');

Route::get('/spareparts', function () {
    $site = SiteSetting::first() ?? new SiteSetting;
    $settings = HomepageSetting::current();
    $sparepartsConfig = config('spareparts');

    return view('pages.spareparts', compact('site', 'settings', 'sparepartsConfig'));
})->name('spareparts');

Route::get('/layanan', function () {
    $services = Service::where('is_active', true)->orderBy('order_column')->get();
    $site = SiteSetting::first() ?? new SiteSetting;
    $settings = HomepageSetting::current();
    $truckSeries = TruckSeries::where('is_active', true)->orderBy('order_column')->get();

    return view('pages.layanan', compact('services', 'site', 'settings', 'truckSeries'));
})->name('layanan');

Route::get('/tentang-kami', function () {
    $site = SiteSetting::first() ?? new SiteSetting;
    $settings = HomepageSetting::current();

    return view('pages.tentang-kami', compact('site', 'settings'));
})->name('tentang-kami');

Route::get('/blog', function () {
    $posts = Post::where('is_published', true)->orderBy('published_at', 'desc')->get();
    $site = SiteSetting::first() ?? new SiteSetting;
    $settings = HomepageSetting::current();

    return view('pages.blog', compact('posts', 'site', 'settings'));
})->name('blog');

Route::get('/blog/{slug}', function (string $slug) {
    $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    $site = SiteSetting::first() ?? new SiteSetting;

    return view('pages.blog-detail', compact('post', 'site'));
})->name('blog.detail');

Route::get('/kontak', function () {
    $site = SiteSetting::first() ?? new SiteSetting;
    $settings = HomepageSetting::current();

    return view('pages.kontak', compact('site', 'settings'));
})->name('kontak');

Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:15,1')
    ->name('leads.store');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
