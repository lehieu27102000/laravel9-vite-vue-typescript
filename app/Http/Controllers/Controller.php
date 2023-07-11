<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendRespondSuccess($data = [], $message = 'success')
    {
        return response()->json([
            'code' => 0,
            'message' => $message,
            'result'    => $data
        ], 200, [
            'Content-type' => 'application/json; charset=utf-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Send Respond Error to Client.
     *
     * @param object $data
     * @param string $message
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendRespondError($data = [], $message = 'error', $code = 404)
    {
        return response()->json([
            'code' => 0,
            'message' => $message,
            'result'    => $data
        ], $code);
    }

    protected function sendUnvalidated($errors)
    {
        $code = 422;
        return response()->json([
            'message' => 'The given data was invalid',
            'errors' => $errors
        ], $code);
    }

    public function sendForbidden()
    {
        return $this->sendRespondError(
            null,
            'Forbidden!',
            403
        );
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'code' => 0,
            'message' => 'Login success!',
            'result' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
            ]
        ]);
    }

    public function log($message)
    {
        Log::debug($message);
    }
}
