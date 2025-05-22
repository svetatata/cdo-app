<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\StudyField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProgramController extends Controller
{
    public function index(Request $request)
{
    Log::debug('parameters:', $request->all());
    $query = Program::with(['institution', 'studyField'])
        ->where('is_active', true);

    if ($request->filled('query')) {
        $searchQuery = $request->input('query');
        $query->where(function($q) use ($searchQuery) {
            $q->where('title', 'like', "%{$searchQuery}%")
              ->orWhere('description', 'like', "%{$searchQuery}%")
              ->orWhereHas('institution', function($q) use ($searchQuery) {
                  $q->where('name', 'like', "%{$searchQuery}%");
              })
              ->orWhereHas('studyField', function($q) use ($searchQuery) {
                  $q->where('name', 'like', "%{$searchQuery}%");
              });
        });
    }

    if ($request->filled('degree')) {
        $query->where('degree', $request->degree);
    }

    if ($request->filled('study_form')) {
        $query->where('study_form', $request->study_form);
    }

    if ($request->filled('study_field')) {
        $query->where('study_field_id', $request->study_field);
    }

    if ($request->filled('price')) {
        $priceRange = explode('-', $request->price);
        if (count($priceRange) === 2) {
            $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        } elseif ($request->price === '200000+') {
            $query->where('price', '>=', 200000);
        }
    }

    $programs = $query->paginate(9);
    $studyFields = StudyField::where('is_active', true)->get();

    return view('pages.programs', compact('programs', 'studyFields'));
}

    public function show($slug)
    {
        $program = Program::with(['institution', 'studyField', 'subjects'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.degree', compact('program'));
    }
}
