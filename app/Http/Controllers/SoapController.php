<?php

// app/Http/Controllers/SoapController.php
namespace App\Http\Controllers;

use App\Services\SoapService;
use Laminas\Soap\AutoDiscover;
use Laminas\Soap\Server;

class SoapController extends Controller
{
    public function wsdl()
    {
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass(SoapService::class)
            ->setUri(route('soap.server'))
            ->setServiceName('SoapService');

        $wsdl = $autodiscover->generate();
        $wsdl->dump(public_path('wsdl/SoapService.wsdl'));

        return response()->file(public_path('wsdl/SoapService.wsdl'));
    }

    public function server()
    {

        $optionsSOAP = array(
            'uri' => route('soap.wsdl'),
            'actor' => route('soap.server'),
            'stream_context' => stream_context_create(array(
                'ssl' => array(
                    'verify_peer' => false,
                )
            )),
        );

        

        $soapServer = new Server(null,$optionsSOAP);
        $soapServer->setClass(SoapService::class);
        $soapServer->handle();
    }
    
}
