<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Solicitud Rechazada – Patitas Felices</title>
</head>
<body style="margin:0; padding:0; background-color:#FDF8F3; font-family:'Nunito', Arial, sans-serif;">

  <!-- Contenedor exterior -->
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#FDF8F3; padding:40px 0;">
    <tr>
      <td align="center">

        <!-- Tarjeta del correo -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; background-color:#FFFFFF; border-radius:24px; overflow:hidden; border:1.5px solid #EAE0D0; box-shadow:0 4px 20px rgba(192,84,106,0.12);">

          <!-- Header beige (tono más suave que el de aprobación) -->
          <tr>
            <td align="center" style="background:linear-gradient(135deg, #F5EFE6, #FDF8F3); padding:36px 30px 28px;">
              <div style="font-size:42px; line-height:1; margin-bottom:10px;">🐾</div>
              <p style="margin:0; font-family:Georgia, 'Playfair Display', serif; font-size:14px; font-weight:700; letter-spacing:0.05em; text-transform:uppercase; color:#C0546A;">
                Patitas Felices
              </p>
            </td>
          </tr>

          <!-- Cuerpo -->
          <tr>
            <td style="padding:36px 36px 8px;">
              <h1 style="margin:0 0 18px; font-family:Georgia, 'Playfair Display', serif; font-size:24px; color:#3D2B1F; text-align:center; line-height:1.3;">
                Hola, {{ $usuario->nombre }}
              </h1>

              <p style="margin:0 0 16px; font-size:15px; color:#6B4C38; line-height:1.7; text-align:center;">
                Gracias por tu interés en adoptar a
                <strong style="color:#C0546A;">{{ $mascota->nombre }}</strong>.
              </p>

              <!-- Bloque destacado -->
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin:24px 0; background-color:#FDF8F3; border:1.5px solid #EAE0D0; border-radius:16px;">
                <tr>
                  <td style="padding:20px 24px; text-align:center;">
                    <div style="font-size:32px; margin-bottom:8px;">🐾</div>
                    <p style="margin:0; font-size:14px; color:#6B4C38; line-height:1.65;">
                      Después de revisar tu solicitud, en esta ocasión no ha sido aprobada.
                    </p>
                  </td>
                </tr>
              </table>

              <p style="margin:0 0 16px; font-size:14px; color:#6B4C38; line-height:1.7; text-align:center;">
                Esto no significa que no puedas adoptar en el futuro. Te invitamos a seguir visitando nuestra plataforma y conocer otras mascotas que buscan un hogar.
              </p>

              <p style="margin:0 0 28px; font-size:14px; color:#A07860; line-height:1.65; text-align:center;">
                Gracias por apoyar la adopción responsable.
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:24px 36px 32px; border-top:1.5px solid #EAE0D0; text-align:center;">
              <p style="margin:0 0 4px; font-family:Georgia, 'Playfair Display', serif; font-size:15px; color:#C0546A; font-weight:700;">
                🐾 Equipo Patitas Felices
              </p>
              <p style="margin:0; font-size:12px; color:#A07860;">
                Hecho con ❤️ para cada patita que merece un hogar.
              </p>
            </td>
          </tr>

        </table>
        <!-- /Tarjeta -->

      </td>
    </tr>
  </table>

</body>
</html>