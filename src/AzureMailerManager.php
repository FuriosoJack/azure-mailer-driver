<?php

namespace Hafael\Mailer\Azure;

use Illuminate\Mail\MailManager;
use Symfony\Component\Mailer\Bridge\Azure\Transport\AzureApiTransport;

class AzureMailerManager extends MailManager
{
    protected function createAzureTransport()
    {
        $config = $this->app['config']->get('mail.mailers.azure', []);
        
        return new AzureApiTransport(
            $config['access_key'],
            $config['resource_name'],
            boolval($config['disable_user_tracking']),
            $config['api_version'],
        );
    }
}