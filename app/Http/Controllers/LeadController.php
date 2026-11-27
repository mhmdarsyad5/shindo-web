<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Store a newly created lead from web forms and generate WhatsApp URL.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'truck_series' => ['nullable', 'string', 'max:255'],
            'quantity' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'source' => ['nullable', 'string', 'max:50'],
        ]);

        $lead = Lead::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'company' => $validated['company'] ?? null,
            'truck_series' => $validated['truck_series'] ?? null,
            'quantity' => $validated['quantity'] ?? null,
            'location' => $validated['location'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'source' => $validated['source'] ?? 'homepage',
            'status' => 'new',
        ]);

        $site = SiteSetting::current();
        $cleanPhone = $site->whatsapp;

        $isContactPage = ($lead->source === 'contact_page');
        $header = $isContactPage
            ? '*Pesan Kontak / Konsultasi - Website PT SHINDO*'
            : '*Permintaan Penawaran Resmi - Website PT SHINDO*';

        $lines = [
            $header,
            '',
            "*Nama:* {$lead->name}",
            "*No. WhatsApp / HP:* {$lead->phone}",
        ];

        if ($lead->email) {
            $lines[] = "*Email:* {$lead->email}";
        }
        if ($lead->company) {
            $lines[] = "*Perusahaan / Proyek:* {$lead->company}";
        }
        if ($lead->truck_series) {
            $lines[] = "*Kebutuhan / Seri Truk:* {$lead->truck_series}";
        }
        if ($lead->quantity) {
            $lines[] = "*Estimasi Jumlah:* {$lead->quantity}";
        }
        if ($lead->location) {
            $lines[] = "*Lokasi / Wilayah Kerja:* {$lead->location}";
        }
        if ($lead->notes) {
            $lines[] = "*Catatan / Pesan:*\n{$lead->notes}";
        }

        $message = implode("\n", $lines);
        $whatsappUrl = "https://wa.me/{$cleanPhone}?text=".urlencode($message);

        return response()->json([
            'success' => true,
            'message' => 'Data Anda telah berhasil disimpan. Menghubungkan ke WhatsApp...',
            'whatsapp_url' => $whatsappUrl,
            'lead_id' => $lead->id,
        ]);
    }
}
