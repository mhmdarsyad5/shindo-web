<?php

declare(strict_types=1);

return [
    'categories' => [
        'cabin' => [
            'label' => 'Cabin Parts',
            'badge' => 'CABIN',
            'description' => 'Komponen eksterior, interior, kaca depan, hingga instrumen kelistrikan kabin SHACMAN.',
        ],
        'electrical' => [
            'label' => 'Electrical Parts',
            'badge' => 'ELECTRICAL',
            'description' => 'Sensor, relay, motor starter, solenoid valve, dan komponen kelistrikan presisi.',
        ],
        'engine' => [
            'label' => 'Engine Parts',
            'badge' => 'ENGINE',
            'description' => 'Komponen mesin utama, sistem bahan bakar, pendinginan, turbocharger, dan transmisi.',
        ],
        'chassis' => [
            'label' => 'Chassis Parts',
            'badge' => 'CHASSIS',
            'description' => 'Sistem suspensi heavy-duty, gardan, propeller shaft, hingga sistem pengereman truk.',
        ],
        'others' => [
            'label' => 'Others Parts',
            'badge' => 'OTHERS',
            'description' => 'Komponen pendukung kemudi, pneumatic brake chamber, air dryer, hingga cooling fan.',
        ],
    ],

    'items' => [
        // Cabin Parts (10)
        ['name' => 'Headlamp Assembly', 'category' => 'cabin', 'image' => 'images/spareparts/headlamp-assembly.jpg'],
        ['name' => 'Accelerator Pedal', 'category' => 'cabin', 'image' => 'images/spareparts/accelerator-pedal.jpg'],
        ['name' => 'Windshield', 'category' => 'cabin', 'image' => 'images/spareparts/windshield.jpg'],
        ['name' => 'Handle Door', 'category' => 'cabin', 'image' => 'images/spareparts/handle-door.jpg'],
        ['name' => 'Gearbox Splicer Switch', 'category' => 'cabin', 'image' => 'images/spareparts/gearbox-splicer-switch.jpg'],
        ['name' => 'Side Mirror', 'category' => 'cabin', 'image' => 'images/spareparts/side-mirror.jpg'],
        ['name' => 'Seatbelt', 'category' => 'cabin', 'image' => 'images/spareparts/seatbelt.jpg'],
        ['name' => 'Air Filter', 'category' => 'cabin', 'image' => 'images/spareparts/air-filter.jpg'],
        ['name' => 'Speedometer', 'category' => 'cabin', 'image' => 'images/spareparts/speedometer.jpg'],
        ['name' => 'Wiring Harness', 'category' => 'cabin', 'image' => 'images/spareparts/wiring-harness.jpg'],

        // Electrical Parts (10)
        ['name' => 'Relay', 'category' => 'electrical', 'image' => 'images/spareparts/relay.jpg'],
        ['name' => 'Solenoid Valve', 'keywords' => 'selenoid valve', 'category' => 'electrical', 'image' => 'images/spareparts/solenoid-valve.jpg'],
        ['name' => 'Solenoid Heating Water Valve', 'keywords' => 'selenoid heating weater valve', 'category' => 'electrical', 'image' => 'images/spareparts/solenoid-heating-water-valve.jpg'],
        ['name' => 'Starter Motor', 'category' => 'electrical', 'image' => 'images/spareparts/starter-motor.jpg'],
        ['name' => 'Wiper Motor', 'category' => 'electrical', 'image' => 'images/spareparts/wiper-motor.jpg'],
        ['name' => 'AC Compressor', 'category' => 'electrical', 'image' => 'images/spareparts/ac-compressor.jpg'],
        ['name' => 'Expansion Valve', 'category' => 'electrical', 'image' => 'images/spareparts/expansion-valve.jpg'],
        ['name' => 'Blower Motor', 'category' => 'electrical', 'image' => 'images/spareparts/blower-motor.jpg'],
        ['name' => 'Air Pressure Switch', 'category' => 'electrical', 'image' => 'images/spareparts/air-pressure-switch.jpg'],
        ['name' => 'Speed Odometer Sensor', 'category' => 'electrical', 'image' => 'images/spareparts/speed-odometer-sensor.jpg'],

        // Engine Parts (20)
        ['name' => 'Engine Assy', 'category' => 'engine', 'image' => 'images/spareparts/engine-assy.jpg'],
        ['name' => 'Water Pump', 'category' => 'engine', 'image' => 'images/spareparts/water-pump.jpg'],
        ['name' => 'Alternator', 'category' => 'engine', 'image' => 'images/spareparts/alternator.jpg'],
        ['name' => 'Oil Pressure Sensor', 'category' => 'engine', 'image' => 'images/spareparts/oil-pressure-sensor.jpg'],
        ['name' => 'Fuel Pump Assy', 'category' => 'engine', 'image' => 'images/spareparts/fuel-pump-assy.jpg'],
        ['name' => 'Injector Assy', 'category' => 'engine', 'image' => 'images/spareparts/injector-assy.jpg'],
        ['name' => 'Piston', 'category' => 'engine', 'image' => 'images/spareparts/piston.jpg'],
        ['name' => 'Filter', 'category' => 'engine', 'image' => 'images/spareparts/filter.jpg'],
        ['name' => 'Belt', 'category' => 'engine', 'image' => 'images/spareparts/belt.jpg'],
        ['name' => 'Bolt', 'category' => 'engine', 'image' => 'images/spareparts/bolt.jpg'],
        ['name' => 'Radiator', 'category' => 'engine', 'image' => 'images/spareparts/radiator.jpg'],
        ['name' => 'Evaporator', 'category' => 'engine', 'image' => 'images/spareparts/evaporator.jpg'],
        ['name' => 'Condenser', 'category' => 'engine', 'image' => 'images/spareparts/condenser.jpg'],
        ['name' => 'Turbocharger', 'category' => 'engine', 'image' => 'images/spareparts/turbocharger.jpg'],
        ['name' => 'Valve', 'category' => 'engine', 'image' => 'images/spareparts/valve.jpg'],
        ['name' => 'Clutch Disc Assembly', 'keywords' => 'clucth disc assembly', 'category' => 'engine', 'image' => 'images/spareparts/clutch-disc-assembly.jpg'],
        ['name' => 'Transmission', 'category' => 'engine', 'image' => 'images/spareparts/transmission.jpg'],
        ['name' => 'Crankshaft', 'category' => 'engine', 'image' => 'images/spareparts/crankshaft.jpg'],
        ['name' => 'Cylinder Block', 'category' => 'engine', 'image' => 'images/spareparts/cylinder-block.jpg'],
        ['name' => 'Cylinder Head', 'category' => 'engine', 'image' => 'images/spareparts/cylinder-head.jpg'],

        // Chassis Parts (20)
        ['name' => 'Rear Spring', 'category' => 'chassis', 'image' => 'images/spareparts/rear-spring.jpg'],
        ['name' => 'Front Spring', 'category' => 'chassis', 'image' => 'images/spareparts/front-spring.jpg'],
        ['name' => 'U-Bolt', 'category' => 'chassis', 'image' => 'images/spareparts/u-bolt.jpg'],
        ['name' => 'Differential Assembly', 'category' => 'chassis', 'image' => 'images/spareparts/differential-assembly.jpg'],
        ['name' => 'Rear Axle', 'category' => 'chassis', 'image' => 'images/spareparts/rear-axle.jpg'],
        ['name' => 'Propeller Shaft', 'category' => 'chassis', 'image' => 'images/spareparts/propeller-shaft.jpg'],
        ['name' => 'Center Bearing', 'category' => 'chassis', 'image' => 'images/spareparts/center-bearing.jpg'],
        ['name' => 'Spider Joint', 'category' => 'chassis', 'image' => 'images/spareparts/spider-joint.jpg'],
        ['name' => 'V-Stay', 'category' => 'chassis', 'image' => 'images/spareparts/v-stay.jpg'],
        ['name' => 'Torque Rod', 'category' => 'chassis', 'image' => 'images/spareparts/torque-rod.jpg'],
        ['name' => 'Brake Drum', 'category' => 'chassis', 'image' => 'images/spareparts/brake-drum.jpg'],
        ['name' => 'Differential Assy', 'category' => 'chassis', 'image' => 'images/spareparts/differential-assy.jpg'],
        ['name' => 'Relay Valve', 'category' => 'chassis', 'image' => 'images/spareparts/relay-valve.jpg'],
        ['name' => 'Brake Shoe', 'category' => 'chassis', 'image' => 'images/spareparts/brake-shoe.jpg'],
        ['name' => 'Brake Plate', 'category' => 'chassis', 'image' => 'images/spareparts/brake-plate.jpg'],
        ['name' => 'Wheel Bolt', 'category' => 'chassis', 'image' => 'images/spareparts/wheel-bolt.jpg'],
        ['name' => 'Bearing', 'category' => 'chassis', 'image' => 'images/spareparts/bearing.jpg'],
        ['name' => 'Camshaft', 'category' => 'chassis', 'image' => 'images/spareparts/camshaft.jpg'],
        ['name' => 'Door Lock', 'category' => 'chassis', 'image' => 'images/spareparts/door-lock.jpg'],
        ['name' => 'Handbrake Valve', 'category' => 'chassis', 'image' => 'images/spareparts/handbrake-valve.jpg'],

        // Others Parts (10)
        ['name' => 'Brake Chamber', 'category' => 'others', 'image' => 'images/spareparts/brake-chamber.jpg'],
        ['name' => 'Booster Clutch', 'category' => 'others', 'image' => 'images/spareparts/booster-clutch.jpg'],
        ['name' => 'Steering Pump', 'category' => 'others', 'image' => 'images/spareparts/steering-pump.jpg'],
        ['name' => 'Ball Joint', 'category' => 'others', 'image' => 'images/spareparts/ball-joint.jpg'],
        ['name' => 'Tail Lamp', 'category' => 'others', 'image' => 'images/spareparts/tail-lamp.jpg'],
        ['name' => 'Air Dryer', 'category' => 'others', 'image' => 'images/spareparts/air-dryer.jpg'],
        ['name' => 'Brake Lining', 'category' => 'others', 'image' => 'images/spareparts/brake-lining.jpg'],
        ['name' => 'Steering Horizontal', 'category' => 'others', 'image' => 'images/spareparts/steering-horizontal.jpg'],
        ['name' => 'Hose AC', 'category' => 'others', 'image' => 'images/spareparts/hose-ac.jpg'],
        ['name' => 'Fan', 'category' => 'others', 'image' => 'images/spareparts/fan.jpg'],
    ],

    'mechanics' => [
        ['image' => 'images/spareparts/mechanic-1.jpg', 'caption' => 'Inspeksi Sistem Kelistrikan & Kabin'],
        ['image' => 'images/spareparts/mechanic-2.jpg', 'caption' => 'Overhaul Gardan & Final Drive'],
        ['image' => 'images/spareparts/mechanic-3.jpg', 'caption' => 'Troubleshooting Ruang Mesin Site'],
        ['image' => 'images/spareparts/mechanic-4.jpg', 'caption' => 'Perawatan Kaki-Kaki & Dump Body'],
        ['image' => 'images/spareparts/mechanic-5.jpg', 'caption' => 'Servis Berkala Unit Heavy Duty'],
        ['image' => 'images/spareparts/mechanic-6.jpg', 'caption' => 'Pengecekan Saluran Pneumatic & Valve'],
        ['image' => 'images/spareparts/mechanic-7.jpg', 'caption' => 'Tim Mekanik Kolaborasi di Lapangan'],
        ['image' => 'images/spareparts/mechanic-8.jpg', 'caption' => 'Penggantian Hub & Sistem Pengereman'],
        ['image' => 'images/spareparts/mechanic-9.jpg', 'caption' => 'Perbaikan Komponen Transmisi & Chassis'],
    ],
];
