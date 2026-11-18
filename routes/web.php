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
    $products = Product::with('truckSeries')->where('is_active', true)->orderBy('order_column')->get();
    $seriesIdsWithProducts = $products->pluck('truck_series_id')->filter()->unique();
    $truckSeries = TruckSeries::where('is_active', true)
        ->whereIn('id', $seriesIdsWithProducts)
        ->orderBy('order_column')
        ->get();
    $site = SiteSetting::first() ?? new SiteSetting;

    return view('pages.produk', compact('truckSeries', 'products', 'site'));
})->name('produk');

Route::get('/produk/unit/{slug}', function (string $slug) {
    $product = Product::with('truckSeries')
        ->where('slug', $slug)
        ->where('is_active', true)
        ->firstOrFail();

    $seriesKey = strtolower($product->truckSeries?->key ?? $product->truckSeries?->name ?? '');
    if (empty($seriesKey) || ! in_array($seriesKey, ['h3000s', 'x5000', 'x3000', 'h3000', 'f3000'])) {
        $nameLower = strtolower($product->name);
        if (str_contains($nameLower, 'h3000s')) {
            $seriesKey = 'h3000s';
        } elseif (str_contains($nameLower, 'x5000')) {
            $seriesKey = 'x5000';
        } elseif (str_contains($nameLower, 'h3000')) {
            $seriesKey = 'h3000';
        } elseif (str_contains($nameLower, 'f3000')) {
            $seriesKey = 'f3000';
        } else {
            $seriesKey = 'x3000';
        }
    }

    $seriesDataKey = match ($seriesKey) {
        'h3000s' => 'h3000',
        'x5000' => 'x3000',
        default => $seriesKey,
    };

    $seriesData = config("series_data.{$seriesDataKey}", []);
    $productSpecs = config("product_specs.{$seriesKey}") ?? config('product_specs.h3000s');

    $gallery = $product->gallery_urls;
    if (count($gallery) <= 1) {
        $candidatePaths = array_filter([
            $seriesData['truck_render'] ?? null,
            $seriesData['hero_image'] ?? null,
            $seriesData['closer_look_image'] ?? null,
            $seriesData['section3']['cards'][0]['image'] ?? null,
            $seriesData['section3']['cards'][1]['image'] ?? null,
        ]);
        foreach ($candidatePaths as $relPath) {
            if (file_exists(public_path($relPath))) {
                $url = asset($relPath);
                if (! in_array($url, $gallery, true)) {
                    $gallery[] = $url;
                }
            }
            if (count($gallery) >= 5) {
                break;
            }
        }
    }

    if (! empty($product->specifications) && is_array($product->specifications)) {
        $specRows = $product->specifications;
    } else {
        $typeLower = strtolower($product->type ?? '');
        $isTractorHead = str_contains($typeLower, 'tractor') || str_contains($typeLower, 'head');
        $isMixer = str_contains($typeLower, 'tmc') || str_contains($typeLower, 'mixer');
        $isWaterTank = str_contains($typeLower, 'water tank') || str_contains($typeLower, 'tank');
        $isLowbed = str_contains($typeLower, 'lowbed');

        $specRows = collect($productSpecs['specs'] ?? [])
            ->map(function (array $row) use ($product, $isTractorHead, $isMixer, $isWaterTank, $isLowbed): array {
                if ($row['item'] === 'Drive Type' && ! empty($product->drive)) {
                    $row['value'] = $product->drive;
                } elseif ($row['item'] === 'Engine Model' && ! empty($product->engine)) {
                    $row['value'] = $product->engine;
                } elseif ($row['item'] === 'Dump Body Size') {
                    if ($isLowbed) {
                        $row = ['item' => 'Trailer / Deck Type', 'value' => 'Heavy-Duty Lowbed Semi-Trailer Hauler'];
                    } elseif ($isTractorHead) {
                        $row = ['item' => 'Coupling / Fifth Wheel', 'value' => 'JOST 50# / 90# Heavy-Duty Fifth Wheel'];
                    } elseif ($isMixer) {
                        $row = ['item' => 'Mixer Drum Volume', 'value' => '10 m³ – 12 m³ Heavy-Duty Mixing Drum (PTO)'];
                    } elseif ($isWaterTank) {
                        $row = ['item' => 'Tank Capacity', 'value' => '15.000L – 20.000L Carbon Steel + Sprinkler System'];
                    }
                }

                return $row;
            })
            ->values()
            ->all();
    }

    $relatedProducts = Product::with('truckSeries')
        ->where('is_active', true)
        ->where('id', '!=', $product->id)
        ->orderBy('order_column')
        ->limit(3)
        ->get();

    $site = SiteSetting::first() ?? new SiteSetting;

    return view('pages.product-detail', compact(
        'product',
        'seriesKey',
        'seriesData',
        'productSpecs',
        'specRows',
        'gallery',
        'relatedProducts',
        'site'
    ));
})->name('produk.detail');

Route::get('/produk/{seriesKey}', function (string $seriesKey) {
    $seriesKeyLower = strtolower($seriesKey);
    $seriesDataKey = match ($seriesKeyLower) {
        'h3000s' => 'h3000',
        'x5000' => 'x3000',
        default => $seriesKeyLower,
    };
    $seriesData = config("series_data.{$seriesDataKey}");

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
    $relatedPosts = Post::where('is_published', true)
        ->where('id', '!=', $post->id)
        ->orderByDesc('published_at')
        ->limit(4)
        ->get();
    $site = SiteSetting::first() ?? new SiteSetting;

    return view('pages.blog-detail', compact('post', 'relatedPosts', 'site'));
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
