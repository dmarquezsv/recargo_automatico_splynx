<?php
include_once 'validate_login.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//PHP library phpmailer
require 'library/phpmailer/Exception.php';
require 'library/phpmailer/PHPMailer.php';
require 'library/phpmailer/SMTP.php';

//Queries Splynx
include_once 'splynx_queries.php';

class Email
{


    public static function send_email($customer, $date, $amount, $email)
    {

        try {

            //instance library phpmailer
            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = 0;                   // Enable verbose debug output
            $mail->isSMTP();                        // Send using SMTP
            $mail->Host     = 'smtp.gmail.com';       // Set the SMTP server to send through
            $mail->SMTPAuth = true;                 // Enable SMTP authentication
            $mail->Username   = 'kayal.autosinnovadores@gmail.com';  // SMTP username
            $mail->Password   = 'khefzcriahqnbfxz';       // SMTP password
            $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('desarrollo@dmarquez.ga', 'Backend Developer');
            $mail->addAddress($email);              // Add a recipient
            $mail->isHTML(true);                    // Content
            $mail->Subject = 'Comprobante de pago empresa El Salvador';
            //template
            $mail->Body =
                '<!DOCTYPE html>
                            <html lang="es">
                        <head>
                        <meta charset="UTF-8" />
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        <style type="text/css">
                        a[x-apple-data-detectors] {
                            color: inherit !important;
                        }
                        </style>
                        <title>empresa El Salvador</title>
                    </head>
                    <body style="margin: 0; padding: 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 20px 0 30px 0;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                                        <tr>
                                            <td align="center" style="padding: 40px 0 30px 0;">
                                            <img src="#" alt="Empresa El Salvador" width="200" height="50" style="display: block;" />
                                            <hr style="margin-left: 25px;margin-right: 25px;">
                                        </td>
                                    </tr>
                                <tr>
                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif;">
                                                    <h1 style="font-size: 24px; margin: 0; text-align: center;">Transacción exitosa</h1>
                                            </td>
                                        </tr>
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                                    <p style="margin: 0; text-align: justify;">
                                                            Hola ' . $customer . ' , Su recargo automático mensual ha sido procesada exitosamente. El día de ahora se ha aplicado correctamente a su estado cuenta. Si tiene dudas o preguntas sobre algún detalle de su factura, Llámenos al teléfono +503 #### #### o inicie un chat.<br><br>
                                                        <p>Fecha recargo automático: <b>' . $date . '</b><br>Monto: $ <b>' . $amount . '</b> </p>
                                                    </p>
                                                    <br>
                                                <p style="text-align: center;">
                                                    <a href="#" target="_blank" style="display:inline-block; min-width:250px; font-family:Tahoma,Arial,sans-serif; font-size:18px; font-weight:bold; color:white; line-height:50px; text-align:center; text-decoration:none; background-color:#FF6D00; border-radius:50px; padding:16px 24px; line-height:1">Ver portal de pago</a>
                                            </p>
                                            <br>
                                                <p>Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo.</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <tr>
                        <td bgcolor="#FF6D00" style="padding: 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
                                        <p style="margin: 0;">&reg; Empresa El Salvador<br />
                                            <p> Copyright © Todos los derechos reservados </p>
                                            </td>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Hubo un error para enivar correo: {$mail->ErrorInfo}";
            Queries::log('Hubo un error para enivar correo: ',  $mail->ErrorInfo);
        }
    }
}
