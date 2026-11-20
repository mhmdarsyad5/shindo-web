<?php

namespace Database\Seeders;

use App\Models\IconAsset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class IconAssetSeeder extends Seeder
{
    public function run(): void
    {
        $iconsDir = storage_path('app/public/icons');
        if (! File::isDirectory($iconsDir)) {
            File::makeDirectory($iconsDir, 0755, true);
        }

        $icons = [
            // 1. FLEET & TRUCKS
            [
                'title' => 'Commercial Heavy Truck',
                'key' => 'truck',
                'category' => 'Fleet & Transport',
                'filename' => 'truck.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18.5" r="2.5"/><circle cx="7" cy="18.5" r="2.5"/></svg>',
            ],
            [
                'title' => 'Cabin Safety & Profile',
                'key' => 'truck-cab',
                'category' => 'Fleet & Transport',
                'filename' => 'truck-cab.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 3h14v13H1V3z"/><path d="M15 8h4l3 3.5V16h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="17.5" cy="18.5" r="2.5"/></svg>',
            ],

            // 2. OPERATIONS & PARTNERSHIP
            [
                'title' => 'Partnership & Dealership',
                'key' => 'handshake',
                'category' => 'Operations',
                'filename' => 'handshake.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m11 17 2 2a1 1 0 0 0 1.4 0l4.3-4.3a1 1 0 0 0 0-1.4l-3-3a1 1 0 0 0-1.4 0L13 11.6"/><path d="m13 13.6-2.3-2.3a1 1 0 0 0-1.4 0L6 14.6a1 1 0 0 0 0 1.4l2 2a1 1 0 0 0 1.4 0L11 16.4"/><path d="M18 11V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3"/></svg>',
            ],
            [
                'title' => 'Location & Nationwide Reach',
                'key' => 'map-pin',
                'category' => 'Operations',
                'filename' => 'map-pin.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>',
            ],
            [
                'title' => 'Warranty & Safety Shield',
                'key' => 'shield-check',
                'category' => 'Operations',
                'filename' => 'shield-check.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
            ],

            // 3. ENGINEERING & POWERTRAIN
            [
                'title' => 'High Torque & Weichai Engine',
                'key' => 'cpu',
                'category' => 'Engineering',
                'filename' => 'cpu.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/></svg>',
            ],
            [
                'title' => 'Fuel Efficiency & Pump',
                'key' => 'fuel',
                'category' => 'Engineering',
                'filename' => 'fuel.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v16a1 1 0 001 1h8a1 1 0 001-1V4a1 1 0 00-1-1H5a1 1 0 00-1 1z"/><path d="M7 6h4v4H7V6z"/><path d="M14 9h2a2 2 0 012 2v7a2 2 0 002 2 2 2 0 002-2V9.828a2 2 0 00-.586-1.414l-2.828-2.828"/></svg>',
            ],
            [
                'title' => 'FAST Gear & Transmission',
                'key' => 'cog',
                'category' => 'Engineering',
                'filename' => 'cog.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
            ],
            [
                'title' => 'Dual Gears & Spareparts',
                'key' => 'dual-gears',
                'category' => 'Engineering',
                'filename' => 'dual-gears.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="9" r="2.5"/><path d="M9 3.5v1.2M9 13.3v1.2M3.5 9h1.2M13.3 9h1.2M5.1 5.1l.9.9M12 12l.9.9M5.1 12.9l.9-.9M12 6l.9-.9"/><circle cx="9" cy="9" r="4.5"/><circle cx="16.5" cy="16.5" r="1.8"/><path d="M16.5 12.5v.8M16.5 19.7v.8M12.5 16.5h.8M19.7 16.5h.8M13.7 13.7l.6.6M18.7 18.7l.6.6M13.7 19.3l.6-.6M18.7 14.3l.6-.6"/><circle cx="16.5" cy="16.5" r="3.2"/></svg>',
            ],

            // 4. AFTERSALES & SERVICES
            [
                'title' => 'Unit Baru (New Truck Units)',
                'key' => 'unit',
                'category' => 'Services',
                'filename' => 'unit.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path d="M14 9h4l4 4v4c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/><path d="M9 18h6"/></svg>',
            ],
            [
                'title' => 'Kontrak Servis (Service Contract)',
                'key' => 'contract',
                'category' => 'Services',
                'filename' => 'contract.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
            ],
            [
                'title' => 'Garansi ATPM (OEM Warranty)',
                'key' => 'guarantee',
                'category' => 'Services',
                'filename' => 'guarantee.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
            ],
            [
                'title' => 'Suku Cadang Asli (Genuine Parts)',
                'key' => 'parts',
                'category' => 'Services',
                'filename' => 'parts.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
            ],
            [
                'title' => 'Servis & Perawatan (Maintenance)',
                'key' => 'service',
                'category' => 'Services',
                'filename' => 'service.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/><circle cx="6" cy="18" r="1" fill="#0067b1"/></svg>',
            ],
            [
                'title' => 'Dukungan 24/7 (24/7 Support)',
                'key' => 'support',
                'category' => 'Services',
                'filename' => 'support.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>',
            ],

            // 5. NAVIGATION & GENERAL
            [
                'title' => 'Beranda (Home)',
                'key' => 'home',
                'category' => 'Navigation',
                'filename' => 'home.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 10.5L12 2.5l9.5 8"/><path d="M19 8.5V4.5a.5.5 0 00-.5-.5h-2a.5.5 0 00-.5.5v1.8"/><path d="M4.5 10v10a1 1 0 001 1h13a1 1 0 001-1V10"/><path d="M9.5 21v-6a1.5 1.5 0 011.5-1.5h2a1.5 1.5 0 011.5 1.5v6"/></svg>',
            ],
            [
                'title' => 'Telepon & Hotline (Phone Call)',
                'key' => 'phone',
                'category' => 'Navigation',
                'filename' => 'phone.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
            ],
            [
                'title' => 'Menu Grid Drawer',
                'key' => 'menu-grid',
                'category' => 'Navigation',
                'filename' => 'menu-grid.svg',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0067b1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="3.5" width="6.5" height="6.5" rx="1.5"/><rect x="14" y="3.5" width="6.5" height="6.5" rx="1.5"/><rect x="3.5" y="14" width="6.5" height="6.5" rx="1.5"/><rect x="14" y="14" width="6.5" height="6.5" rx="1.5"/></svg>',
            ],
        ];

        foreach ($icons as $item) {
            $filePath = 'icons/'.$item['filename'];
            $fullPath = storage_path('app/public/'.$filePath);

            File::put($fullPath, $item['svg']);

            IconAsset::updateOrCreate(
                ['key' => $item['key']],
                [
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'file_path' => $filePath,
                ]
            );
        }

        // Also register key brand logos if they exist in storage
        $logos = [
            [
                'title' => 'Logo SHACMAN Indonesia',
                'key' => 'shacman-logo',
                'category' => 'Brand Logos',
                'source' => 'truck-series/shacman-logo.png',
                'target' => 'icons/shacman-logo.png',
            ],
            [
                'title' => 'Logo SHACMAN Shindo White (Navbar)',
                'key' => 'shacman-shindo-white',
                'category' => 'Brand Logos',
                'source' => 'site/shacman-shindo-white.png',
                'target' => 'icons/shacman-shindo-white.png',
            ],
            [
                'title' => 'Logo SHINDO Footer White',
                'key' => 'shindo-footer-logo',
                'category' => 'Brand Logos',
                'source' => 'site/shindo-footer-logo.png',
                'target' => 'icons/shindo-footer-logo.png',
            ],
        ];

        foreach ($logos as $logo) {
            $sourceFull = storage_path('app/public/'.$logo['source']);
            $targetFull = storage_path('app/public/'.$logo['target']);

            if (File::exists($sourceFull) && ! File::exists($targetFull)) {
                File::copy($sourceFull, $targetFull);
            }

            if (File::exists($targetFull)) {
                IconAsset::updateOrCreate(
                    ['key' => $logo['key']],
                    [
                        'title' => $logo['title'],
                        'category' => $logo['category'],
                        'file_path' => $logo['target'],
                    ]
                );
            }
        }
    }
}
