<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//use Twilio\Rest\Client;
require_once FCPATH . 'vendor/twilio/sdk/src/Twilio/autoload.php'; // Ruta correcta al archivo autoload.php

class WhatsappController extends CI_Controller {

    public function enviarMensaje($numero, $mensaje) {
        // Credenciales de Twilio
        $sid    = "";
        $token  = "";
        $twilio = new Client($sid, $token);

        // Número y mensaje recibidos en la petición POST
       // $numero = $this->input->post('numero');
       // $mensaje = $this->input->post('mensaje');

        // Envío del mensaje por WhatsApp
        $message = $twilio->messages
            ->create("whatsapp:" . $numero,
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => $mensaje
                )
            );

        // Devolver el SID del mensaje (opcional)
        echo $message->sid;
    }
}
