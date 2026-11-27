<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $guarded = [];

    public static function defaultAttributes(): array
    {
        return [
            'hero_badge' => 'KONTAK KAMI',
            'hero_title' => 'HUBUNGI KAMI',
            'hero_subtitle' => 'Konsultasi pengadaan unit, suku cadang asli, atau dukungan teknisi langsung di lokasi proyek Anda.',

            'office_title' => 'KANTOR PUSAT',
            'office_address' => 'Town House Cordoba No. 59, RT.6/RW.2, Kamal Muara, Penjaringan, Jakarta Utara, DKI Jakarta 14470',
            'office_phone' => '0821-2888-9556',
            'office_email' => 'sales@shindo.id',
            'office_hours' => 'Senin - Jumat, 09:00 - 17:00 WIB',
            'mechanic_hours' => 'Tim teknisi kami siap meluncur langsung ke site proyek Anda.',

            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0988078345155!2d106.7397087!3d-6.1107176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d0049700fdb%3A0xe4077963238b9056!2sPT%20Shindo%20Tractors%20Adiperkasa!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
            'map_link_url' => 'https://maps.app.goo.gl/jUThKPX3Arf6VNVW8',

            'form_title' => 'HUBUNGI KAMI',
            'form_subtitle' => 'Konsultasikan kebutuhan armada truk dan spesifikasi unit bersama tim kami.',
            'submit_button_text' => 'Hubungi Kami',
            'submit_notice_text' => 'Data Anda otomatis tersimpan & terhubung langsung ke WhatsApp tim kami.',
        ];
    }

    public static function current(): self
    {
        $setting = static::first();
        $defaults = static::defaultAttributes();

        if (! $setting) {
            return static::create($defaults);
        }

        $needsSave = false;
        foreach ($defaults as $key => $value) {
            if (empty($setting->{$key})) {
                $setting->{$key} = $value;
                $needsSave = true;
            }
        }

        if ($needsSave) {
            $setting->save();
        }

        return $setting;
    }
}
