<?php


namespace App\Services\Notification;


use App\Models\User;
use App\Services\Notification\abstracts\ProviderInterface;
use App\Services\Notification\Providers\EmailProvider;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    /* Old and Regular way
    public function sendEmail (string $user, Mailable $mailable)

    {
        //return Mail::to($user)->send(new $mailable);
        //return Mail :: to ('ali.shokouh.maghami@gmail.com') -> send (new $mailable);
        //return Mail::to($user)->send($mailable);
        //return (new EmailProvider())->sendEmail();
    }

    public function sendSms(){}
    */


    public function __call($method, $parameter)
    {
        //dd($method, $parameter);

        $providerName = substr($method, 4) . 'Provider';
        $providerPath = __NAMESPACE__ . '\Providers\\' . $providerName;

        //dd($providerPath, class_exists($providerPath));

        if( ! class_exists($providerPath))
        {
            new \Exception('Class not exist');
        }
        //dd(... $parameter);

        $providerInstance = new $providerPath(... $parameter);

        if( ! is_subclass_of($providerInstance, ProviderInterface::class) ){
            return new \Exception('Class does not instance of ' . $providerPath);
        }

        $providerInstance->send();

    }
}
