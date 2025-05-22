<?php

namespace App\Http\Controllers;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('pages.institutions', [
            'institutions' => $institutions
        ]);
    }

    public function show($slug)
    {
        $institution = Institution::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.institution', [
            'institution' => $institution
        ]);
    }
}
