<?php


namespace App\Http\Controllers;




use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use PHPMailer\PHPMailer\PHPMailer;
use Twilio\Rest\Client;
use Twilio\Http\CurlClient;



require_once __DIR__ . '/../../../vendor/autoload.php';


class insertarUsuarioController extends Controller
{

    function insertarusuario(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        
        $correoExiste = UsuarioModel::where('email', $request->input('email'))->get();
        if ($correoExiste->count() > 0) {
            return redirect()->route('registro')->with('failed', 'El correo que proporcionaste ya se encuentra en uso');
        } else {
            $usernameExiste = UsuarioModel::where('username',$request->input('username'))->get();
            if ($usernameExiste->count() > 0) {
                return redirect()->route('registro')->with('failed', 'El username que proporcionaste ya se encuentra en uso');
            } else {
                $numeroExiste = UsuarioModel::where('telefono', $request->input('telefono'))->get();
                if ($numeroExiste->count() > 0) {
                    return redirect()->route('registro')->with('failed', 'El telefono que proporcionaste ya se encuentra en uso');
                } else {
                    //codigo para insertar usuario

                    //crear los codigos de verificacion
                    $codTelefono = rand(1000, 9999);
                    $coddEmail = rand(1000, 9999);
                    $apm = $request->input('apm');
                    if(!isset($apm)){
                        $apm = '';
                    }
                    //crear el arreglo usuario
                    $user = [
                        'username' => $request->input('username'),
                        'apellido_paterno' => $request->input('app'),
                        'apellido_materno' => $apm,
                        'nombre' => $request->input('nombre'),
                        'email' => $request->input('email'),
                        'telefono' => $request->input('telefono'),
                        'password' => $request->input('password'),
                        'numeroTelefono' => $codTelefono,
                        'numeroEmail' => $coddEmail,
                        'estadoTelefono' => false,
                        'estadoEmail' => false,
                        'fechaCreacion' => now(),
                        'direccion' => [[
                            'calle' => '',
                            'numeroExterior' => '',
                            'numeroInterior' => '',
                            'colonia' => '',
                            'municipio' => '',
                            'codigoPostal' =>null,
                            'estado' => '',
                        ]
                        ],
                        'tarjeta' => []

                    ];

                    // //Creamos un registro y se asigna a la variable el id del registro creado

                    $id = UsuarioModel::insertGetId($user)->__toString();
                    // creamos una variable de sesion para almacenar el id
                    if (session('id') !== null) {
                        session()->forget('id');
                    }

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
                        $mail->addAddress($request->input('email'), $request->input('nombre'));
                        $mail->Subject = utf8_decode('Código de verificación de correo electrónico');
                        $mail->Body = utf8_decode('El código para verificar su correo es ' . $coddEmail);

                        // Envía el correo electrónico
                        $mail->send();


                        //Enviar mensaje de texto
                        $sid = config('TWILIO_ACCOUNT_SID');
                        $token = config('TWILIO_AUTH_TOKEN');
                        $twilioNumber = '+18656859083';


                        $client = new Client($sid, $token);

                        $message = $client->messages->create(
                            $request->input('telefono'), // Número de teléfono del destinatario
                            array(
                                'from' => $twilioNumber,
                                'body' => "\n \n Para verificar tu número telefónico ingresa el siguiente código en la App de Nizi: \n \n " . $codTelefono
                            )
                        );

                        /* VARIABLES DE SESION */   
                        $request->session()->put(['id' => $id]);
                        //establecer variable de sesion para el estado del correo
                        $request->session()->put(['estadoCorreo' => false]);

                        echo 'El correo electrónico ha sido enviado exitosamente.';
                        return redirect()->route('registro')->with('success', 'Cuenta creada con éxito');
                    } catch (Exception $e) {
                        echo "Ocurrió un error al enviar el correo electrónico: {$mail->ErrorInfo}";
                    }
                }
            }
        }
    }
}
