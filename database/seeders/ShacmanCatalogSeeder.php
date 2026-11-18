<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\TruckSeries;
use Illuminate\Database\Seeder;

class ShacmanCatalogSeeder extends Seeder
{
    /**
     * Seed the SHACMAN catalog:
     * - F3000 Series (2 units): 6x4 & 8x4 Off-Road Dump Truck for mining & cut-and-fill.
     * - H3000 Series (4 units): On-the-Road Euro 5 with FAST transmission (Dump Truck, Head Tractor, Cargo Truck, Concrete Mixer).
     */
    public function run(): void
    {
        TruckSeries::whereNotIn('key', ['X3000', 'F3000', 'H3000'])->update(['is_active' => false]);

        TruckSeries::updateOrCreate(
            ['key' => 'X3000'],
            [
                'name' => 'X3000',
                'badge' => 'FLAGSHIP HEAVY-DUTY',
                'title' => 'Truk Heavy Duty Seri X3000',
                'image' => 'homepage/shacman-x3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">X3000</strong> adalah lini <strong class="font-bold text-neutral-950">kendaraan berat (heavy-duty truck) premium</strong> yang dirancang untuk kebutuhan <strong class="font-bold text-neutral-950">transportasi logistik, pertambangan, dan konstruksi skala besar</strong>. Truk ini mengombinasikan kekuatan mesin kelas atas, efisiensi operasional yang ketat, serta kenyamanan berkendara yang optimal untuk medan ekstrem.',
                'detail_url' => '/produk/x3000',
                'order_column' => 1,
                'is_active' => true,
            ]
        );

        $f3000 = TruckSeries::updateOrCreate(
            ['key' => 'F3000'],
            [
                'name' => 'F3000',
                'badge' => 'OFF-ROAD MINING',
                'title' => 'Truk Heavy Duty Seri F3000',
                'image' => 'homepage/shacman-f3000.png',
                'description' => 'Seri <strong class="font-bold text-neutral-950">SHACMAN F3000</strong> dirancang khusus untuk medan <strong class="font-bold text-neutral-950">off-road pertambangan (mining) dan proyek cut and fill</strong> dengan konfigurasi Dump Truck 6x4 dan 8x4 bertenaga besar serta chassis double-layer.',
                'detail_url' => '/produk/f3000',
                'order_column' => 2,
                'is_active' => true,
            ]
        );

        $h3000 = TruckSeries::updateOrCreate(
            ['key' => 'H3000'],
            [
                'name' => 'H3000',
                'badge' => 'ON-THE-ROAD EURO 5',
                'title' => 'Truk Heavy Duty Seri H3000',
                'image' => 'homepage/shacman-h3000.png',
                'description' => 'Seri <strong class="font-bold text-neutral-950">SHACMAN H3000 / H3000S</strong> dikhususkan untuk operasional <strong class="font-bold text-neutral-950">on-the-road berstandar Euro 5</strong> dengan transmisi FAST, tersedia dalam varian Dump Truck, Head Tractor, Cargo Truck, dan Concrete Mixer 6x4.',
                'detail_url' => '/produk/h3000',
                'order_column' => 3,
                'is_active' => true,
            ]
        );

        $units = [
            // F3000 Series (Off-Road Mining & Cut-and-Fill)
            [
                'slug' => 'f3000-dump-truck-6x4',
                'truck_series_id' => $f3000->id,
                'name' => 'SHACMAN F3000 Dump Truck 6x4 (Off-Road)',
                'type' => 'Dump Truck',
                'badge' => 'Off-Road Mining 6x4',
                'drive' => '6x4 Off-Road',
                'engine' => 'Weichai WP12 (380–430 HP)',
                'capacity' => '30 - 38 Ton',
                'image' => 'images/products/f3000-dump-truck-6x4.webp',
                'gallery_images' => [
                    'images/products/gallery/f3000-dump-6x4-1.webp',
                    'images/products/gallery/f3000-dump-6x4-2.webp',
                    'images/products/gallery/f3000-dump-6x4-3.webp',
                    'images/products/gallery/f3000-dump-6x4-4.webp',
                ],
                'description' => 'Dump truck 6x4 khusus off-road untuk tambang (mining) dan proyek cut and fill dengan chassis double-layer serta gardan double-reduction.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN F3000 (Off-Road)'],
                    ['item' => 'Application', 'value' => 'Mining & Cut and Fill Industry'],
                    ['item' => 'Drive Type', 'value' => '6x4 Off-Road'],
                    ['item' => 'Engine Power', 'value' => '380 – 430 HP (Weichai WP12)'],
                    ['item' => 'Transmission', 'value' => 'FAST 12-Speed Heavy-Duty Manual'],
                    ['item' => 'Dump Body Size', 'value' => '5.600 – 5.800 × 2.300 × 1.500 mm (Mining Spec)'],
                    ['item' => 'Chassis Frame', 'value' => '850 × 300 mm (8 + 7 mm Double-Layer)'],
                    ['item' => 'Front Axle', 'value' => 'MAN 9.5T Reinforced Front Axle'],
                    ['item' => 'Rear Axle', 'value' => 'MAN 16T Double-Reduction Mining Axle'],
                    ['item' => 'GVM (Gross Vehicle Weight)', 'value' => '25.000 kg (Off-Road up to 38 Ton)'],
                    ['item' => 'Tire Size', 'value' => '12.00R20 / 12.00R24 Heavy Mining Tires'],
                ],
                'order_column' => 1,
                'is_featured' => true,
            ],
            [
                'slug' => 'f3000-dump-truck-8x4',
                'truck_series_id' => $f3000->id,
                'name' => 'SHACMAN F3000 Dump Truck 8x4 (Off-Road)',
                'type' => 'Dump Truck',
                'badge' => 'Off-Road Mining 8x4',
                'drive' => '8x4 Off-Road',
                'engine' => 'Weichai WP12 (430 HP)',
                'capacity' => '40 - 50 Ton',
                'image' => 'images/products/f3000-dump-truck-8x4.webp',
                'gallery_images' => [
                    'images/products/gallery/f3000-dump-8x4-1.webp',
                    'images/products/gallery/f3000-dump-8x4-2.webp',
                    'images/products/gallery/f3000-dump-8x4-3.webp',
                    'images/products/gallery/f3000-dump-8x4-4.webp',
                ],
                'description' => 'Dump truck trinton 8x4 khusus off-road dengan kapasitas angkut ekstra besar untuk hauling overburden tambang dan cut and fill skala besar.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN F3000 (Off-Road)'],
                    ['item' => 'Application', 'value' => 'Mining & Cut and Fill Industry'],
                    ['item' => 'Drive Type', 'value' => '8x4 Off-Road'],
                    ['item' => 'Engine Power', 'value' => '430 HP (Weichai WP12)'],
                    ['item' => 'Transmission', 'value' => 'FAST 12-Speed Heavy-Duty Manual'],
                    ['item' => 'Dump Body Size', 'value' => '6.800 – 7.200 × 2.300 × 1.500 mm (Mining Spec)'],
                    ['item' => 'Chassis Frame', 'value' => '850 × 300 mm (8 + 7 mm Double-Layer)'],
                    ['item' => 'Front Axle', 'value' => 'Dual MAN 9.5T Reinforced Front Axles'],
                    ['item' => 'Rear Axle', 'value' => 'Dual MAN 16T Double-Reduction Mining Axles'],
                    ['item' => 'GVM (Gross Vehicle Weight)', 'value' => '31.000 kg (Off-Road up to 50 Ton)'],
                    ['item' => 'Tire Size', 'value' => '12.00R20 / 12.00R24 Heavy Mining Tires'],
                ],
                'order_column' => 2,
                'is_featured' => true,
            ],

            // H3000 Series (On-The-Road, Euro 5, Transmission: FAST)
            [
                'slug' => 'h3000s-dump-truck-6x4',
                'truck_series_id' => $h3000->id,
                'name' => 'SHACMAN H3000S Dump Truck 6x4',
                'type' => 'Dump Truck',
                'badge' => 'On-The-Road Euro 5',
                'drive' => '6x4 On-The-Road',
                'engine' => '300 / 360 / 380 / 430 / 460 HP (Euro 5)',
                'capacity' => '25 Ton GVM',
                'image' => 'images/products/h3000s-dump-truck-6x4.webp',
                'gallery_images' => [
                    'images/products/gallery/h3000s-dump-6x4-1.webp',
                    'images/products/gallery/h3000s-dump-6x4-2.webp',
                    'images/products/gallery/h3000s-dump-6x4-3.webp',
                    'images/products/gallery/h3000s-dump-6x4-4.webp',
                ],
                'description' => 'Dump truck 6x4 seri H3000S berstandar emisi Euro 5 dengan transmisi FAST untuk angkutan material konstruksi dan proyek jalan raya.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN H3000 / H3000S (On-The-Road)'],
                    ['item' => 'Drive Type', 'value' => '6x4'],
                    ['item' => 'Emission Standard', 'value' => 'Euro 5'],
                    ['item' => 'Engine Model', 'value' => 'Weichai WP10 / WP12 Series (300 / 360 / 430 / 460 HP)'],
                    ['item' => 'Transmission', 'value' => 'FAST 10JSD180 / 12JS200T Manual'],
                    ['item' => 'Clutch', 'value' => 'Φ430 Diaphragm Spring Clutch'],
                    ['item' => 'Dump Body Size', 'value' => '5.400 – 5.800 × 2.300 × 1.500 mm (18 m³ Class)'],
                    ['item' => 'Wheelbase', 'value' => '3.175 + 1.400 mm / 3.775 + 1.400 mm'],
                    ['item' => 'Front Axle', 'value' => 'MAN 9.5T Heavy-Duty'],
                    ['item' => 'Rear Axle', 'value' => 'MAN / Hande 16T Double Reduction'],
                    ['item' => 'GVM (Gross Vehicle Weight)', 'value' => '25.000 kg'],
                    ['item' => 'Fuel Tank', 'value' => '400L Aluminum Alloy Tank'],
                    ['item' => 'Tire Size', 'value' => '12.00R20'],
                ],
                'order_column' => 3,
                'is_featured' => true,
            ],
            [
                'slug' => 'h3000s-head-tractor-6x4',
                'truck_series_id' => $h3000->id,
                'name' => 'SHACMAN H3000S Head Tractor 6x4',
                'type' => 'Head Tractor',
                'badge' => 'On-The-Road Euro 5',
                'drive' => '6x4 On-The-Road',
                'engine' => '300 / 360 / 380 / 430 / 460 HP (Euro 5)',
                'capacity' => '40 - 50 Ton GCW',
                'image' => 'images/products/h3000s-head-tractor-6x4.webp',
                'gallery_images' => [
                    'images/products/gallery/h3000s-tractor-6x4-1.webp',
                    'images/products/gallery/h3000s-tractor-6x4-2.webp',
                    'images/products/gallery/h3000s-tractor-6x4-3.webp',
                    'images/products/gallery/h3000s-tractor-6x4-4.webp',
                ],
                'description' => 'Head tractor 6x4 seri H3000S berstandar Euro 5 dengan transmisi FAST untuk penarikan trailer kontainer, flatbed, dan logistik antar kota.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN H3000 / H3000S (On-The-Road)'],
                    ['item' => 'Drive Type', 'value' => '6x4'],
                    ['item' => 'Emission Standard', 'value' => 'Euro 5'],
                    ['item' => 'Engine Model', 'value' => 'Weichai WP10 / WP12 / Cummins ISM (300 / 360 / 430 / 460 HP)'],
                    ['item' => 'Transmission', 'value' => 'FAST Manual Transmission'],
                    ['item' => 'Clutch', 'value' => 'Φ430 Diaphragm Spring Clutch'],
                    ['item' => 'Fifth Wheel', 'value' => '90# Heavy-Duty Fifth Wheel Coupling'],
                    ['item' => 'Wheelbase', 'value' => '3.200 + 1.400 mm'],
                    ['item' => 'Front Axle', 'value' => 'MAN 7.5T Heavy-Duty'],
                    ['item' => 'Rear Axle', 'value' => 'MAN / Hande 13T Double Reduction'],
                    ['item' => 'GVM / GCW', 'value' => '25.000 kg GVM / 40.000–50.000 kg GCW'],
                    ['item' => 'Fuel Tank', 'value' => '400L Aluminum Alloy Tank'],
                    ['item' => 'Tire Size', 'value' => '12R22.5 / 315/80R22.5'],
                ],
                'order_column' => 4,
                'is_featured' => false,
            ],
            [
                'slug' => 'h3000s-cargo-truck-6x4',
                'truck_series_id' => $h3000->id,
                'name' => 'SHACMAN H3000S Cargo Truck 6x4',
                'type' => 'Cargo Truck',
                'badge' => 'On-The-Road Euro 5',
                'drive' => '6x4 On-The-Road',
                'engine' => '300 / 360 / 380 / 430 / 460 HP (Euro 5)',
                'capacity' => '25 Ton GVM',
                'image' => 'images/products/h3000s-cargo-truck-6x4.jpg',
                'gallery_images' => [
                    'images/products/gallery/h3000s-cargo-6x4-1.webp',
                    'images/products/gallery/h3000s-cargo-6x4-2.webp',
                ],
                'description' => 'Cargo truck 6x4 seri H3000S berstandar Euro 5 dengan transmisi FAST untuk angkutan barang logistik, box, wingbox, dan karoseri kargo.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN H3000 / H3000S (On-The-Road)'],
                    ['item' => 'Drive Type', 'value' => '6x4'],
                    ['item' => 'Emission Standard', 'value' => 'Euro 5'],
                    ['item' => 'Horsepower Options', 'value' => '300 / 360 / 430 / 460 HP (Rata-rata 380 – 430 HP)'],
                    ['item' => 'Transmission', 'value' => 'FAST Manual Transmission'],
                    ['item' => 'Karoseri / Aplikasi', 'value' => 'Cargo Truck / Chassis Rigid'],
                    ['item' => 'GVM (Gross Vehicle Weight)', 'value' => '25.000 kg'],
                    ['item' => 'Rear Axle', 'value' => 'Hande 13T / 16T Heavy-Duty Axle'],
                    ['item' => 'Fuel Tank', 'value' => '400L Aluminum Alloy Tank'],
                    ['item' => 'Tire Size', 'value' => '11.00R20 / 12R22.5'],
                ],
                'order_column' => 5,
                'is_featured' => false,
            ],
            [
                'slug' => 'h3000s-concrete-mixer-6x4',
                'truck_series_id' => $h3000->id,
                'name' => 'SHACMAN H3000S Concrete Mixer 6x4',
                'type' => 'Concrete Mixer',
                'badge' => 'On-The-Road Euro 5',
                'drive' => '6x4 On-The-Road',
                'engine' => '300 / 360 / 380 / 430 / 460 HP (Euro 5)',
                'capacity' => '25 Ton GVM',
                'image' => 'images/products/h3000s-concrete-mixer-6x4.webp',
                'gallery_images' => [
                    'images/products/gallery/h3000s-mixer-6x4-1.webp',
                    'images/products/gallery/h3000s-mixer-6x4-2.webp',
                    'images/products/gallery/h3000s-mixer-6x4-3.webp',
                    'images/products/gallery/h3000s-mixer-6x4-4.webp',
                ],
                'description' => 'Truk molen / concrete mixer 6x4 seri H3000S berstandar Euro 5 dengan transmisi FAST untuk distribusi beton ready-mix di jalan raya dan proyek sipil.',
                'specifications' => [
                    ['item' => 'Series', 'value' => 'SHACMAN H3000 / H3000S (On-The-Road)'],
                    ['item' => 'Drive Type', 'value' => '6x4'],
                    ['item' => 'Emission Standard', 'value' => 'Euro 5'],
                    ['item' => 'Horsepower Options', 'value' => '300 / 360 / 430 / 460 HP (Rata-rata 380 – 430 HP)'],
                    ['item' => 'Transmission', 'value' => 'FAST Manual Transmission + PTO'],
                    ['item' => 'Karoseri / Aplikasi', 'value' => 'Concrete Mixer Drum'],
                    ['item' => 'GVM (Gross Vehicle Weight)', 'value' => '25.000 kg'],
                    ['item' => 'Rear Axle', 'value' => 'Hande 13T / 16T Heavy-Duty Axle'],
                    ['item' => 'Fuel Tank', 'value' => '400L Aluminum Alloy Tank'],
                    ['item' => 'Tire Size', 'value' => '11.00R20 / 12R22.5'],
                ],
                'order_column' => 6,
                'is_featured' => false,
            ],
        ];

        $activeSlugs = array_column($units, 'slug');
        Product::whereNotIn('slug', $activeSlugs)->delete();

        foreach ($units as $unit) {
            Product::updateOrCreate(
                ['slug' => $unit['slug']],
                array_merge($unit, [
                    'is_active' => true,
                ])
            );
        }
    }
}
