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
        return back()->with('status', trans($response));
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
        return back()->withErrors(['email' => trans($response)]);
    }
}
