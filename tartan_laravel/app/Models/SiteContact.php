<?php

namespace App\Models;

use App\Contracts\ContactInterface;
use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class SiteContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];

    public function mailMessage(): string
    {
        return'<strong>Name:</strong> ' . $this->name . '<br>'
            . '<strong>Email:</strong> ' . $this->email . '<br>'
            . '<strong>Phone:</strong> ' . $this->phone . '<br>'
            . '<strong>Message:</strong> ' . $this->message . '<br>';
    }

    public function mailSubject(): string
    {
        return config('app.name') . ' - Contact Request';
    }

    public function mailTo(): string
    {
        return 'info@marvelousemotion.com';
    }

    public function mailCC(): ?string
    {
        return $this->email;
    }
}
