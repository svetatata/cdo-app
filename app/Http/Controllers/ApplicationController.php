<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'program' => 'required|string|in:college,bachelor,master,retraining',
            'direction' => 'required|string|in:it,business,education,psychology',
            'message' => 'nullable|string|max:1000',
            'agree_terms' => 'required|accepted'
        ]);

        try {
            $application = Application::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Заявка успешно отправлена'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при отправке заявки'
            ], 500);
        }
    }
} 