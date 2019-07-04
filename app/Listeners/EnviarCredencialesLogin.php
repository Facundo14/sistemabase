<?php

namespace App\Listeners;

use App\Events\UsuarioFueCreado;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredencialesLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarCredencialesLogin
{
    /**
     * Handle the event.
     *
     * @param  UsuarioFueCreado  $event
     * @return void
     */
    public function handle(UsuarioFueCreado $event)
    {
        Mail::to($event->user)->queue(
            new CredencialesLogin($event->user, $event->password)
        );
    }
}
