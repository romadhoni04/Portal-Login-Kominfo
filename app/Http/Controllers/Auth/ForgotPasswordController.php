<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Handle a request to send a password reset link to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi email dari request
        $this->validateEmail($request);

        // Ambil email dari request
        $email = $request->input('email');

        // Log email untuk debugging
        Log::info('Email received: ' . $email);

        // Jika email tidak valid, kembalikan respon gagal
        if (!$email) {
            return $this->sendResetLinkFailedResponse($request, 'Invalid email');
        }

        // Kirim link reset password ke email
        $broker = $this->broker();
        $response = $broker->sendResetLink(['email' => $email]);

        // Log jenis dan konten $response untuk debugging
        Log::info('Response type: ' . gettype($response));
        Log::info('Response content: ', ['response' => $response]);

        // Periksa apakah $response valid sebelum digunakan
        if (!is_string($response)) {
            return $this->sendResetLinkFailedResponse($request, 'Response from broker is invalid');
        }

        // Kembalikan respon berdasarkan hasil pengiriman
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Validate the email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        // Validasi bahwa email diperlukan dan harus berupa format email yang valid
        $request->validate([
            'email' => 'required|email',
        ]);
    }

    /**
     * Get the password broker instance.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    protected function broker()
    {
        return Password::broker();
    }

    /**
     * Handle a successful password reset link response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        // Pastikan $response adalah string atau pesan yang valid
        if (is_string($response)) {
            return response()->json(['status' => trans($response)]);
        }

        return response()->json(['status' => 'Failed to send reset link'], 500);
    }

    /**
     * Handle a failed password reset link response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        // Pastikan $response adalah string atau pesan yang valid
        if (is_string($response)) {
            return response()->json(['email' => trans($response)], 422);
        }

        return response()->json(['email' => 'Failed to send reset link'], 500);
    }
}
