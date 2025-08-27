<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo extends CI_Controller {

   public function enviarCorreo() {
       if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $this->load->library('email');

        $id_info = $this->input->post('id_info');
        $numero = $this->input->post('numero');
        $estado = $this->input->post('estado');
        $mensaje = $this->input->post('mensajee');
        $fec = $this->db->select("now() as fecha")->get()->result_array();
        $fecha = $fec["0"]["fecha"];

        if($estado=="Alquiler"){

            $id_cliente = $this->input->post('id_cliente');

            $data = array(
                "id" => null,
                "id_cli" => $id_cliente,
                "id_prop" => $id_info,
                "mensaje" => $mensaje,
                "fecha" => $fecha
            );

            $this->db->insert("solicitud",$data);

        }

        $nombre = $this->input->post('nombre');
        $tel = $this->input->post('telefono');
        $destinatario = $this->input->post('propietario_correo');
        $asunto = "¡Hola! me llamo ".$nombre." y Me interesa tu propiedad";
        $remitente_nombre = "Le Rochelle Real State"; 
        $correo_re = $this->input->post('email');
        $mensaje .= "\n";
        $mensaje .= "\n";
        $mensaje .= "Mi nombre es: ".$nombre;

        if($estado=="Alquiler"){
            $mensaje .= "\n";
            $mensaje .= "Mi teléfono es: ".$tel;
            $mensaje .= "\n";
            $mensaje .= "Mi correo es: ".$correo_re;
            $mensaje .= "\n";
            $mensaje .= "\n";
            $mensaje .= "Ingresa a Rent House para que veas la solicitud";
            $mensaje .= "\n";
            $mensaje .= "Link para iniciar sesión en Rent House: ".base_url()."../app/frontend/insesion/";
        }

        $this->email->from('csuarez@lerochellerealstate.com', $remitente_nombre);
        $this->email->to($destinatario);
        $this->email->subject($asunto);
        $this->email->message($mensaje);
        $this->email->reply_to($correo_re);

        if ($this->email->send()) {
        $nom = $this->input->post('propietario_nombre');
        $ap = $this->input->post('propietario_ap');
/*
        $asunto2 = $nombre.", ya le enviamos tu consulta a ".$nom." ".$ap;
        $mensaje2 = "Ya le enviamos el mensaje a ".$nom." ".$ap." por la propiedad que te interesa";
      */  

         $asunto2 = $nombre.", ya le enviamos tu consulta al propietario";
        $mensaje2 = "Ya le enviamos el mensaje al dueño de la propiedad que te interesa";

        $linkk = base_url()."../app/frontend/informacion/$id_info/$numero";
        $mensaje2 .= "\n";
        $mensaje2 .= "\n";
        $mensaje2 .= "Link de la propiedad: ".$linkk;
        

        $this->email->from('csuarez@lerochellerealstate.com', $remitente_nombre);
        $this->email->to($correo_re);
        $this->email->subject($asunto2);
        $this->email->message($mensaje2);
        $this->email->reply_to($destinatario);

         if ($this->email->send()) {
          redirect(base_url()."../app/frontend/informacion/$id_info/$numero");
            } else {
                redirect(base_url()."../app/frontend/informacion/$id_info/$numero");
            }

            } else {
               redirect(base_url()."../app/frontend/informacion/$id_info/$numero");
            }
       }
    }

}
