<?php


namespace App\Services\Notification\Providers;


use App\Models\User;
use App\Services\Notification\abstracts\ProviderInterface;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class EmailProvider implements ProviderInterface
{

    private $user;
    private $mailable;
    public function __construct(string $user, Mailable $mailable)
    {
        $this->user = $user;
        $this->mailable = $mailable;
    }

    public function send ()

    {
        //return Mail::to($user)->send(new $mailable);
        //return Mail :: to ('ali.shokouh.maghami@gmail.com') -> send (new $mailable);
        return Mail::to($this->user)->send($this->mailable);
    }

}
