<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CallRequestController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:2|max:255',
                'phone' => 'required|string|min:10|max:20',
                'message' => 'nullable|string|max:1000'
            ], [
                'name.required' => 'Пожалуйста, укажите ваше имя',
                'name.min' => 'Имя должно содержать минимум 2 символа',
                'phone.required' => 'Пожалуйста, укажите ваш телефон',
                'phone.min' => 'Телефон должен содержать минимум 10 символов',
                'message.max' => 'Сообщение не должно превышать 1000 символов'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            $callRequest = new CallRequest();
            $callRequest->name = $request->name;
            $callRequest->phone = $request->phone;
            $callRequest->message = $request->message;
            $callRequest->status = CallRequest::STATUS_NEW;
            $callRequest->save();
            return response()->json([
                'success' => true,
                'message' => 'Спасибо! Мы свяжемся с вами в ближайшее время.'
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при сохранении заявки.'
            ], 500);
        }
    }
}
