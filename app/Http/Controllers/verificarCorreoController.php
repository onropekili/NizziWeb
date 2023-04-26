<?php

namespace App\Http\Controllers;

use App\Models\NotificacionModel;
use App\Models\UsuarioModel;
use DateTime;
use Error;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;
use Carbon\Carbon;

require_once __DIR__ . '/../../../vendor/autoload.php';

class verificarCorreoController extends Controller
{

    //
    public function verificarCorreo(Request $request)
    {
        $CodCorreo = $request->input('n1') . $request->input('n2') . $request->input('n3') . $request->input('n4');
        $CodCorreo = (int)$CodCorreo;
        // echo $request->session()->get('id').'    '. $CodCorreo;
        $codigoVerificado = UsuarioModel::where('numeroEmail', $CodCorreo)->where('_id', $request->session()->get('id'))->get();


        if ($codigoVerificado->count() > 0) {
            $codigoVerificado = UsuarioModel::find($request->session()->get('id'))->update(['estadoEmail' => true]);


            $notificacionCorreo = new NotificacionModel();
            $notificacionCorreo->idUsuario = session()->get('id');
            $notificacionCorreo->titulo = 'Correo verificado';
            $notificacionCorreo->contenido = 'Tu correo electrónico ha sido verificado.';
            $notificacionCorreo->fecha = now();


            $notificacionCorreo->save();

            


            $request->session()->put(['estadoTelefono' => false]);

            return redirect()->route('verificar')->with('success', 'Has verificado con éxito');
        } else {
            return redirect()->route('verificar')->with('failed', 'Parece que el código que ingresaste no es correcto');
        }
    }



    public function verificarTelefono(Request $request)
    {
        $CodTelefono = $request->input('n1') . $request->input('n2') . $request->input('n3') . $request->input('n4');
        $CodTelefono = (int)$CodTelefono;
        // echo $request->session()->get('id').'    '. $CodCorreo;
        $codigoVerificado = UsuarioModel::where('numeroTelefono', $CodTelefono)->where('_id', $request->session()->get('id'))->get();


        if ($codigoVerificado->count() > 0) {
            $codigoVerificado = UsuarioModel::find($request->session()->get('id'))->update(['estadoTelefono' => true]);


            $notificacionTelefono = new NotificacionModel();
            $notificacionTelefono->idUsuario = session()->get('id');
            $notificacionTelefono->titulo = 'Teléfono verificado';
            $notificacionTelefono->contenido = 'Tu número telefónico ha sido verificado.';
            $notificacionTelefono->fecha = now();



            $notificacionTelefono->save();
            
            $notificacionTarjeta = new NotificacionModel();
            $notificacionTarjeta->idUsuario = session()->get('id');
            $notificacionTarjeta->titulo = 'Solicita una tarjeta';
            $notificacionTarjeta->contenido = 'No olvides que para sacarle el máximo potencial a Nizi debes contar con una tarjeta, no lo pienses más y solicita una cuanto antes.';
            $notificacionTarjeta->fecha = now();

            $notificacionTarjeta->save();

            $notificacionBienvenido = new NotificacionModel();
            $notificacionBienvenido->idUsuario = session()->get('id');
            $notificacionBienvenido->titulo = 'Bienvenido a Nizi';
            $notificacionBienvenido->contenido = 'Te damos la más cordial bienvenida a la familia Nizi.';
            $notificacionBienvenido->fecha = now();

            $notificacionBienvenido->save();

            return redirect()->route('verificarTel')->with('success', 'Has verificado con éxito');
        } else {
            return redirect()->route('verificarTel')->with('failed', 'Parece que el código que ingresaste no es correcto');
        }
    }



    public function reenviarCodigo()
    {
        $codigo = UsuarioModel::where('_id', session('id'))->get(['numeroEmail', 'email', 'nombre'])->toArray();

        $email = $codigo[0]['email'];
        $nombre = $codigo[0]['nombre'];
        $codigo = $codigo[0]['numeroEmail'];


        $mail = new PHPMailer(true);

        try {
            // Configura el servidor SMTP
            $mail->SMTPDebug = 0;                      // Activa el debug del SMTP (0 para desactivarlo)
            $mail->isSMTP();                                            // Usa SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Configura el servidor SMTP
            $mail->SMTPAuth   = true;                                   // Activa la autenticación SMTP
            $mail->Username   = 'nizi.corporation@gmail.com';                 // Correo electrónico del remitente
            $mail->Password   = 'qalrplkhhbauibpq';                               // Contraseña del remitente
            $mail->SMTPSecure = PHPMailer::ENCODING_BINARY;         // Habilita la encriptación TLS; `PHPMailer::ENCRYPTION_SMTPS` también es aceptable
            $mail->Port       = 587;                                    // Puerto TCP para conectarse

            // Configura el correo electrónico
            $mail->setFrom('nizi.corporation@gmail.com', 'Nizi');
            $mail->addAddress($email, $nombre);
            $mail->Subject = utf8_decode('Código de verificación de correo electrónico');
            $mail->Body = utf8_decode('El código para verificar su correo es ' . $codigo);

            // Envía el correo electrónico
            $mail->send();
            return redirect()->route('verificar')->with('success', 'El código ha sido reenviado');
        } catch (Exception $e) {
            echo "Ocurrió un error al enviar el correo electrónico: {$mail->ErrorInfo}";
        }
    }



    public function reenviarCodigoTel()
    {
        $codigo = UsuarioModel::where('_id', session('id'))->get(['numeroTelefono', 'telefono', 'nombre'])->toArray();

        $telefono = $codigo[0]['telefono'];
        $nombre = $codigo[0]['nombre'];
        $numeroTelefono = $codigo[0]['numeroTelefono'];


        //Enviar mensaje de texto
        $sid = config('TWILIO_ACCOUNT_SID');
        $token = config('TWILIO_AUTH_TOKEN');
        $twilioNumber = '+18656859083';


        $client = new Client($sid, $token);

        $message = $client->messages->create(
            $telefono, // Número de teléfono del destinatario
            array(
                'from' => $twilioNumber,
                'body' => "\n \n Para verificar tu número telefónico ingresa el siguiente código en la App de Nizi: \n \n " . $numeroTelefono
            )
        );
        return redirect()->route('verificarTel')->with('success', 'El código ha sido reenviado');
    }
}
