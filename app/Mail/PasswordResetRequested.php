<?php

namespace App\Mail;

use App\Models\Employee;
use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetRequested extends Mailable
{
    use Queueable, SerializesModels;

	protected $name;
	protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, PasswordReset $passwordReset)
    {
		$this->name  = $employee->name();
		$this->token = $passwordReset->token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Password Reset Requested - Renova")
                    ->view("mail.reset-password")
                    ->with([
						"name" => $this->name,
						"link" => route("login.reset_password", ["token" => $this->token])
                    ]);
    }
}
