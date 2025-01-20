<?php

namespace Webvelopers\Auth\Helpers;

use Illuminate\Support\Facades\Storage;

class CaptchaHelper
{
    public static function generarCaptchaImagen()
    {
        $rutaImagenes = public_path('vendor/webvelopers/auth/images/webp/captcha/');

        // Obtener una lista de todos los archivos de imagen en el directorio
        $imagenes = Storage::files($rutaImagenes);

        // Generar un código numérico aleatorio de 4 dígitos
        $codigo = rand(1000, 9999);

        // Convertir el código a un array de dígitos
        $digitos = str_split($codigo);

        // Array para almacenar las rutas de las imágenes seleccionadas
        $imagenesCaptcha = [];

        // Seleccionar aleatoriamente una imagen para cada dígito
        foreach ($digitos as $digito) {
            // Filtrar las imágenes que corresponden al dígito actual
            $imagenesDigito = array_filter($imagenes, function ($imagen) use ($digito, $rutaImagenes) {
                return str_contains($imagen, $rutaImagenes . $digito . '_');
            });

            // Seleccionar una imagen aleatoria del array filtrado
            $imagenAleatoria = $imagenesDigito[array_rand($imagenesDigito)];

            // Agregar la ruta de la imagen al array
            $imagenesCaptcha[] = $imagenAleatoria;
        }

        // Retornar el código y las rutas de las imágenes
        return [
            'codigo' => $codigo,
            'imagenes' => $imagenesCaptcha,
        ];
    }
}
