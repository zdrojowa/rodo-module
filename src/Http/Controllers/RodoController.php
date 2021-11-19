<?php

namespace Selene\Modules\RodoModule\Http\Controllers;

use Selene\Modules\RodoModule\Mail\PopupMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Selene\Modules\RodoModule\Services\RodoService;

class RodoController extends Controller
{
    public function sendPhone(Request $request, RodoService $rodo): JsonResponse
    {
        $response = [
            'message' => 'Ok'
        ];
        $status = JsonResponse::HTTP_OK;

        try {
            $name  = $request->get('name');
            $phone = $request->get('phone');

            $popup = new PopupMail($name, $phone, null, null, $request->get('hours'));
            Mail::to(config('selene.rodo')['email'])->send($popup);

            $rodo->add(null, $phone, App::getLocale(), $name, config('selene.rodo')['consents']['phone']);
        } catch (\Exception $e) {
            $status = JsonResponse::HTTP_BAD_REQUEST;

            $response['message'] = $e->getMessage();
        }

        return response()->json($response, $status);
    }

    public function sendEmail(Request $request, RodoService $rodo): JsonResponse
    {
        $response = [
            'message' => 'Ok'
        ];
        $status = JsonResponse::HTTP_OK;

        try {
            $name  = $request->get('name');
            $email = $request->get('email');

            $popup = new PopupMail($name, null, $email, $request->get('message'));
            Mail::to(config('selene.rodo')['email'])->send($popup);

            $rodo->add($email, null, App::getLocale(), $name, config('selene.rodo')['consents']['email']);
        } catch (\Exception $e) {
            $status = JsonResponse::HTTP_BAD_REQUEST;

            $response['message'] = $e->getMessage();
        }

        return response()->json($response, $status);
    }
}

