<?php

namespace App\Http\Controllers;

use Digikraaft\PaystackWebhooks\Http\Controllers\WebhooksController as PaystackWebhooksController;

class WebhookController extends PaystackWebhooksController
{
    /**
     * Handle charge success.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleChargeSuccess($payload)
    {
        dd($payload);
        // Handle The Event
    }
}
