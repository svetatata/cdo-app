<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function submit(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:2|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|min:10|max:20',
                'degree' => 'required|string|in:college,bachelor,master,training',
                'program_id' => 'required|exists:programs,id',
                'message' => 'nullable|string|max:1000',
                'agree_terms' => 'required|accepted'
            ], [
                'name.required' => 'Пожалуйста, укажите ваше имя',
                'name.min' => 'Имя должно содержать минимум 2 символа',
                'email.required' => 'Пожалуйста, укажите ваш email',
                'email.email' => 'Пожалуйста, укажите корректный email',
                'phone.required' => 'Пожалуйста, укажите ваш телефон',
                'phone.min' => 'Телефон должен содержать минимум 10 символов',
                'degree.required' => 'Пожалуйста, выберите уровень образования',
                'program_id.required' => 'Пожалуйста, выберите программу обучения',
                'program_id.exists' => 'Выбранная программа не существует',
                'message.max' => 'Сообщение не должно превышать 1000 символов',
                'agree_terms.required' => 'Необходимо согласие с условиями обработки персональных данных'
            ]);

            $application = new Application();
            $application->name = $validated['name'];
            $application->email = $validated['email'];
            $application->phone = $validated['phone'];
            $application->degree = $validated['degree'];
            $application->program_id = $validated['program_id'];
            $application->message = $validated['message'] ?? null;
            $application->status = Application::STATUS_NEW;
            $application->agree_terms = true;
            $application->save();

            DB::commit();

            Log::info('Заявка на обучение сохранена', ['id' => $application->id]);

            return response()->json([
                'success' => true,
                'message' => 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ошибка сохранения заявки на обучение: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.'
            ], 500);
        }
    }

    public function getPrograms(Request $request)
    {
        $degree = $request->input('degree');
        
        $programs = Program::where('degree', $degree)
            ->where('is_active', true)
            ->select('id', 'title')
            ->get();
            
        return response()->json($programs);
    }
} 