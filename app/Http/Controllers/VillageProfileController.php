<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;

class VillageProfileController extends Controller
{
    /**
     * Display halaman profil desa
     */
    public function index()
    {
        // Intro/Header desa
        $intro = VillageProfile::active()
            ->section('intro')
            ->first();

        // Sejarah desa
        $history = VillageProfile::active()
            ->section('history')
            ->first();

        // Visi & Misi
        $visionMission = VillageProfile::active()
            ->section('vision_mission')
            ->first();

        // Struktur perangkat desa
        $structure = VillageProfile::active()
            ->section('structure')
            ->first();

        // Data statistik
        $statistics = VillageProfile::active()
            ->section('statistics')
            ->first();

        return view('village-profile.index', compact(
            'intro',
            'history',
            'visionMission',
            'structure',
            'statistics'
        ));
    }
}
