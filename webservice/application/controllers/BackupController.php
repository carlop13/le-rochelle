<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackupController extends CI_Controller {
    
    public function backupDatabase()
    {
        $host = "localhost";
        $usuario = "id20946744_calis";
        $password = "Carlish#1234";
        $nombre = "id20946744_lerochelle";

        // Nombre del archivo de respaldo
        $backupFileName = 'lerochelle_' . date('Y-m-d_H-i-s') . '.sql';

        // Ruta completa para guardar el archivo de respaldo
        $backupFilePath = FCPATH . 'backups/' . $backupFileName;

        // Comando para realizar el respaldo utilizando el comando mysqldump
        $command = "mysqldump -h$host -u$usuario -p$password $nombre > $backupFilePath";

        // Ejecutar el comando
        exec($command);

        // Verificar si el archivo de respaldo se creó correctamente
        if (file_exists($backupFilePath)) {
            // Descargar el archivo de respaldo
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $backupFileName);
            header('Content-Length: ' . filesize($backupFilePath));
            readfile($backupFilePath);
            exit;
        } else {
            // Mostrar un mensaje de error en caso de que el respaldo no se haya creado correctamente
            echo 'Error al crear el respaldo de la base de datos.';
            echo $backupFilePath;
        }
    }
}
?>
