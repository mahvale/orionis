<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\User;

class NomDuMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ebinivale@gmail.com
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
    $user = User::find(session('reservation')->studentId);
    $host = $request->root();
    $pdfPath = $host.'/pdf/'.$user->name.'.pdf';
 return $this->view('email')
                    ->with([
                        'name' => $user->name,
                        'email' => $user->email,
                        'path' => $pdfPath,
                    ]);
    }
}
