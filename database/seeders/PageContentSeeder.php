<?php

namespace Database\Seeders;

use App\Models\AboutSetting;
use App\Models\ContactSetting;
use App\Models\Product;
use App\Models\ServiceSetting;
use App\Models\SparepartsSetting;
use App\Models\TruckSeries;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ABOUT SETTING
        $about = AboutSetting::first() ?? new AboutSetting;
        $about->hero_image = 'about/about-shacman-fleet-bg.png';
        $about->profile_image = 'about/about-truck.png';
        $about->branches_map_image = 'about/about-branch-map.jpg';
        $about->commitment_image = 'about/cta-mining-bg.jpg';
        $about->save();

        // 2. SERVICE SETTING
        $service = ServiceSetting::first() ?? new ServiceSetting;
        $service->banner_image = 'services/pro_detail08_1.jpg';
        $service->save();

        // 3. SPAREPARTS SETTING
        $spareparts = SparepartsSetting::first() ?? new SparepartsSetting;
        $spareparts->warehouse_image = 'spareparts/service-banner-parts.jpg';
        $spareparts->hero_badge = 'SPAREPARTS SUPPORT';
        $spareparts->save();

        // 4. CONTACT SETTING
        if (! ContactSetting::first()) {
            ContactSetting::create(ContactSetting::current()->toArray());
        }

        // 5. PRODUCTS
        Product::all()->each(function ($product) {
            if ($product->image && str_starts_with($product->image, 'images/products/')) {
                $product->update([
                    'image' => str_replace('images/products/', 'products/', $product->image),
                ]);
            }
        });

        // 6. TRUCK SERIES
        TruckSeries::all()->each(function ($series) {
            if ($series->image && str_starts_with($series->image, 'images/products/')) {
                $series->update([
                    'image' => str_replace('images/products/', 'products/', $series->image),
                ]);
            }
        });
    }
}
