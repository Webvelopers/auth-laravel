<?php

namespace Webvelopers\Auth\Services;

class CaptchaService
{
    const MIN = 100000;

    const MAX = 999999;

    public static function generateCaptcha(bool $darkMode = true, bool $error = false): array
    {
        $numbers = self::setNumbers($darkMode, $error);
        $code = rand(self::MIN, self::MAX);

        return [
            'code' => $code,
            'images' => array_map(fn ($digit) => $numbers[$digit], str_split($code)),
        ];
    }

    private static function setNumbers(bool $darkMode = true, bool $error = false): array
    {
        if ($error === false) {
            // https://placehold.co/48x48/1F2937/FFFFFF?text=0
            return $darkMode ? [
                '0' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M30.36 23.995q0 2.27-.49 3.95-.48 1.67-1.34 2.76t-2.03 1.63q-1.17.53-2.52.53-1.36 0-2.52-.53-1.16-.54-2.01-1.63t-1.33-2.76q-.48-1.68-.48-3.95 0-2.28.48-3.94.48-1.67 1.33-2.76.85-1.1 2.01-1.63t2.52-.53q1.35 0 2.52.53t2.03 1.63q.86 1.09 1.34 2.76.49 1.66.49 3.94m-3.06 0q0-1.88-.28-3.12-.27-1.23-.73-1.96-.47-.74-1.07-1.03t-1.24-.29-1.23.29q-.6.29-1.05 1.03-.46.73-.73 1.96-.27 1.24-.27 3.12 0 1.89.27 3.12.27 1.24.73 1.97.45.73 1.05 1.03.59.29 1.23.29t1.24-.29q.6-.3 1.07-1.03.46-.73.73-1.97.28-1.23.28-3.12"/></svg>',
                '1' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M26.305 30.47h3.12v2.22h-9.6v-2.22h3.52V20.35q0-.6.03-1.23l-2.49 2.09q-.22.16-.43.21-.21.04-.4 0-.18-.03-.33-.12-.14-.09-.21-.2l-.94-1.29 5.29-4.5h2.44z"/></svg>',
                '2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M24.455 30.01h4.45q.48 0 .76.27.29.27.29.71v1.78h-11.91v-.98q0-.3.13-.63.12-.33.4-.6l5.27-5.28q.66-.67 1.18-1.28t.87-1.21.53-1.22q.19-.62.19-1.3 0-.63-.18-1.1-.18-.48-.51-.8t-.79-.49q-.46-.16-1.04-.16-.53 0-.98.15t-.8.42q-.34.27-.58.63t-.36.79q-.21.56-.53.74-.33.18-.94.08l-1.56-.28q.18-1.24.7-2.19.51-.94 1.29-1.57.77-.63 1.77-.95 1.01-.31 2.16-.31 1.2 0 2.19.35 1 .35 1.71 1t1.1 1.56q.4.91.4 2.03 0 .96-.28 1.78-.29.81-.76 1.56-.47.74-1.11 1.44-.64.69-1.33 1.41l-3.91 4q.56-.17 1.12-.26t1.06-.09"/></svg>',
                '3' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="m20.07 20.435-1.56-.28q.18-1.24.69-2.19.52-.94 1.29-1.57.78-.63 1.78-.95 1-.31 2.15-.31 1.2 0 2.17.34.96.34 1.65.95.68.6 1.05 1.42.36.81.36 1.76 0 .83-.18 1.46-.19.63-.54 1.1-.34.47-.86.79t-1.16.54q1.56.49 2.32 1.5.77 1.01.77 2.53 0 1.3-.48 2.29-.48 1-1.29 1.68-.82.68-1.89 1.02-1.08.35-2.28.35-1.31 0-2.28-.3t-1.69-.89q-.72-.58-1.22-1.44-.51-.85-.87-1.96l1.31-.54q.52-.22.97-.12t.65.49q.22.42.47.83.26.4.62.72t.85.52q.48.2 1.16.2.75 0 1.32-.25.56-.25.94-.64.38-.4.56-.88.19-.49.19-.98 0-.63-.13-1.14-.14-.51-.56-.87t-1.2-.56q-.79-.2-2.11-.2v-2.12q1.09-.01 1.81-.2t1.15-.53q.43-.35.59-.83.17-.48.17-1.05 0-1.23-.68-1.86-.69-.64-1.83-.64-.52 0-.97.15-.44.15-.8.42-.35.27-.59.63t-.36.79q-.2.56-.53.74t-.93.08"/></svg>',
                '4' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M20.555 26.14h5.28v-5.68q0-.8.11-1.77zm7.86 0h2.19v1.72q0 .24-.16.41-.15.17-.44.17h-1.59v4.24h-2.58v-4.24h-7.32q-.3 0-.52-.18-.23-.19-.29-.46l-.31-1.5 8.22-10.98h2.8z"/></svg>',
                '5' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="m22.665 17.92-.61 3.61q.58-.12 1.11-.18.52-.05 1.02-.05 1.36 0 2.41.41 1.04.41 1.75 1.13t1.07 1.68q.36.97.36 2.08 0 1.38-.49 2.52-.48 1.14-1.35 1.95-.86.81-2.04 1.26-1.19.44-2.58.44-.81 0-1.55-.17-.73-.16-1.37-.45-.64-.28-1.19-.64-.54-.37-.98-.78l.92-1.26q.28-.41.75-.41.3 0 .61.2.32.19.72.42.4.22.95.42.54.19 1.31.19.82 0 1.44-.27.62-.26 1.04-.73.41-.48.62-1.13.21-.66.21-1.42 0-1.42-.82-2.22t-2.43-.8q-1.24 0-2.53.46l-1.85-.53 1.44-8.42h8.57v1.26q0 .63-.4 1.03-.39.4-1.34.4z"/></svg>',
                '6' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="m28.34 15.23-5.15 6.3-.6.74q.51-.25 1.09-.39t1.25-.14q.99 0 1.92.33.93.32 1.64.98.7.65 1.14 1.62.43.97.43 2.27 0 1.21-.45 2.27-.44 1.07-1.24 1.86-.81.79-1.94 1.25-1.14.45-2.5.45-1.4 0-2.5-.44-1.1-.45-1.88-1.24-.78-.8-1.2-1.92-.41-1.13-.41-2.49 0-1.23.5-2.52.49-1.29 1.54-2.68l4.14-5.56q.21-.28.63-.49.41-.2.95-.2zm-4.47 15.12q.7 0 1.3-.24.59-.24 1.02-.67.42-.44.66-1.02t.24-1.26q0-.75-.22-1.34-.23-.6-.65-1.01t-1.01-.63-1.3-.22q-.7 0-1.28.24t-.98.67q-.41.43-.64 1.01t-.23 1.25q0 .72.2 1.32.2.59.59 1.01t.96.65q.58.24 1.34.24"/></svg>',
                '7' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M18.01 15.325h11.98v1.28q0 .58-.12.93-.12.36-.24.6l-6.57 13.53q-.21.42-.58.72-.37.29-.99.29h-2.15l6.71-13.26q.22-.41.45-.75.22-.34.49-.65h-8.3q-.28 0-.48-.21-.2-.2-.2-.48z"/></svg>',
                '8' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M24 30.555q.73 0 1.28-.21.56-.21.93-.59.38-.37.57-.88.2-.52.2-1.12 0-1.43-.8-2.16-.79-.73-2.18-.73t-2.18.73q-.8.73-.8 2.16 0 .6.2 1.12.19.51.57.88.37.38.93.59.55.21 1.28.21m0-13.19q-.66 0-1.14.2-.48.21-.8.55t-.47.78q-.15.45-.15.94 0 .52.13 1 .13.49.43.87.3.37.79.6t1.21.23 1.21-.23.79-.6q.3-.38.43-.87.13-.48.13-1 0-.49-.16-.94-.16-.44-.47-.78t-.79-.55q-.48-.2-1.14-.2m2.93 6.26q1.58.52 2.34 1.58.75 1.06.75 2.6 0 1.15-.43 2.09-.44.93-1.23 1.59-.8.66-1.91 1.02t-2.45.36-2.45-.36-1.91-1.02q-.79-.66-1.23-1.59-.43-.94-.43-2.09 0-1.54.75-2.6.76-1.06 2.34-1.58-1.26-.53-1.89-1.5t-.63-2.34q0-.98.4-1.83.41-.86 1.13-1.49t1.72-.98 2.2-.35 2.2.35 1.72.98 1.13 1.49q.4.85.4 1.83 0 1.37-.63 2.34t-1.89 1.5"/></svg>',
                '9' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#FFFFFF" d="M21.12 20.63q0 1.45.75 2.21t2.13.76q.72 0 1.28-.23.57-.22.95-.62.39-.4.58-.94.2-.54.2-1.16 0-.71-.21-1.27-.22-.55-.62-.94-.39-.38-.94-.59-.54-.2-1.19-.2-.67 0-1.21.22t-.93.62q-.38.4-.59.94-.2.55-.2 1.2m-1.45 12.14 5.39-6.73q.2-.25.38-.49t.35-.48q-.6.38-1.32.58t-1.51.2q-.9 0-1.77-.32-.86-.31-1.53-.94-.68-.63-1.09-1.56t-.41-2.18q0-1.16.43-2.18t1.21-1.79 1.87-1.21 2.41-.44q1.34 0 2.4.42t1.81 1.17q.75.76 1.15 1.81.4 1.06.4 2.32 0 .8-.13 1.52-.14.72-.39 1.39-.26.67-.62 1.3-.36.64-.8 1.26l-3.97 5.67q-.21.28-.61.48-.41.2-.93.2z"/></svg>',
            ] :
                // https://placehold.co/48x48/FFFFFF/808080?text=0
                [
                    '0' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M30.36 23.995q0 2.27-.49 3.95-.48 1.67-1.34 2.76t-2.03 1.63q-1.17.53-2.52.53-1.36 0-2.52-.53-1.16-.54-2.01-1.63t-1.33-2.76q-.48-1.68-.48-3.95 0-2.28.48-3.94.48-1.67 1.33-2.76.85-1.1 2.01-1.63t2.52-.53q1.35 0 2.52.53t2.03 1.63q.86 1.09 1.34 2.76.49 1.66.49 3.94m-3.06 0q0-1.88-.28-3.12-.27-1.23-.73-1.96-.47-.74-1.07-1.03t-1.24-.29-1.23.29q-.6.29-1.05 1.03-.46.73-.73 1.96-.27 1.24-.27 3.12 0 1.89.27 3.12.27 1.24.73 1.97.45.73 1.05 1.03.59.29 1.23.29t1.24-.29q.6-.3 1.07-1.03.46-.73.73-1.97.28-1.23.28-3.12"/></svg>',
                    '1' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M26.305 30.47h3.12v2.22h-9.6v-2.22h3.52V20.35q0-.6.03-1.23l-2.49 2.09q-.22.16-.43.21-.21.04-.4 0-.18-.03-.33-.12-.14-.09-.21-.2l-.94-1.29 5.29-4.5h2.44z"/></svg>',
                    '2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M24.455 30.01h4.45q.48 0 .76.27.29.27.29.71v1.78h-11.91v-.98q0-.3.13-.63.12-.33.4-.6l5.27-5.28q.66-.67 1.18-1.28t.87-1.21.53-1.22q.19-.62.19-1.3 0-.63-.18-1.1-.18-.48-.51-.8t-.79-.49q-.46-.16-1.04-.16-.53 0-.98.15t-.8.42q-.34.27-.58.63t-.36.79q-.21.56-.53.74-.33.18-.94.08l-1.56-.28q.18-1.24.7-2.19.51-.94 1.29-1.57.77-.63 1.77-.95 1.01-.31 2.16-.31 1.2 0 2.19.35 1 .35 1.71 1t1.1 1.56q.4.91.4 2.03 0 .96-.28 1.78-.29.81-.76 1.56-.47.74-1.11 1.44-.64.69-1.33 1.41l-3.91 4q.56-.17 1.12-.26t1.06-.09"/></svg>',
                    '3' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="m20.07 20.435-1.56-.28q.18-1.24.69-2.19.52-.94 1.29-1.57.78-.63 1.78-.95 1-.31 2.15-.31 1.2 0 2.17.34.96.34 1.65.95.68.6 1.05 1.42.36.81.36 1.76 0 .83-.18 1.46-.19.63-.54 1.1-.34.47-.86.79t-1.16.54q1.56.49 2.32 1.5.77 1.01.77 2.53 0 1.3-.48 2.29-.48 1-1.29 1.68-.82.68-1.89 1.02-1.08.35-2.28.35-1.31 0-2.28-.3t-1.69-.89q-.72-.58-1.22-1.44-.51-.85-.87-1.96l1.31-.54q.52-.22.97-.12t.65.49q.22.42.47.83.26.4.62.72t.85.52q.48.2 1.16.2.75 0 1.32-.25.56-.25.94-.64.38-.4.56-.88.19-.49.19-.98 0-.63-.13-1.14-.14-.51-.56-.87t-1.2-.56q-.79-.2-2.11-.2v-2.12q1.09-.01 1.81-.2t1.15-.53q.43-.35.59-.83.17-.48.17-1.05 0-1.23-.68-1.86-.69-.64-1.83-.64-.52 0-.97.15-.44.15-.8.42-.35.27-.59.63t-.36.79q-.2.56-.53.74t-.93.08"/></svg>',
                    '4' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M20.555 26.14h5.28v-5.68q0-.8.11-1.77zm7.86 0h2.19v1.72q0 .24-.16.41-.15.17-.44.17h-1.59v4.24h-2.58v-4.24h-7.32q-.3 0-.52-.18-.23-.19-.29-.46l-.31-1.5 8.22-10.98h2.8z"/></svg>',
                    '5' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="m22.665 17.92-.61 3.61q.58-.12 1.11-.18.52-.05 1.02-.05 1.36 0 2.41.41 1.04.41 1.75 1.13t1.07 1.68q.36.97.36 2.08 0 1.38-.49 2.52-.48 1.14-1.35 1.95-.86.81-2.04 1.26-1.19.44-2.58.44-.81 0-1.55-.17-.73-.16-1.37-.45-.64-.28-1.19-.64-.54-.37-.98-.78l.92-1.26q.28-.41.75-.41.3 0 .61.2.32.19.72.42.4.22.95.42.54.19 1.31.19.82 0 1.44-.27.62-.26 1.04-.73.41-.48.62-1.13.21-.66.21-1.42 0-1.42-.82-2.22t-2.43-.8q-1.24 0-2.53.46l-1.85-.53 1.44-8.42h8.57v1.26q0 .63-.4 1.03-.39.4-1.34.4z"/></svg>',
                    '6' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="m28.34 15.23-5.15 6.3-.6.74q.51-.25 1.09-.39t1.25-.14q.99 0 1.92.33.93.32 1.64.98.7.65 1.14 1.62.43.97.43 2.27 0 1.21-.45 2.27-.44 1.07-1.24 1.86-.81.79-1.94 1.25-1.14.45-2.5.45-1.4 0-2.5-.44-1.1-.45-1.88-1.24-.78-.8-1.2-1.92-.41-1.13-.41-2.49 0-1.23.5-2.52.49-1.29 1.54-2.68l4.14-5.56q.21-.28.63-.49.41-.2.95-.2zm-4.47 15.12q.7 0 1.3-.24.59-.24 1.02-.67.42-.44.66-1.02t.24-1.26q0-.75-.22-1.34-.23-.6-.65-1.01t-1.01-.63-1.3-.22q-.7 0-1.28.24t-.98.67q-.41.43-.64 1.01t-.23 1.25q0 .72.2 1.32.2.59.59 1.01t.96.65q.58.24 1.34.24"/></svg>',
                    '7' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M18.01 15.325h11.98v1.28q0 .58-.12.93-.12.36-.24.6l-6.57 13.53q-.21.42-.58.72-.37.29-.99.29h-2.15l6.71-13.26q.22-.41.45-.75.22-.34.49-.65h-8.3q-.28 0-.48-.21-.2-.2-.2-.48z"/></svg>',
                    '8' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M24 30.555q.73 0 1.28-.21.56-.21.93-.59.38-.37.57-.88.2-.52.2-1.12 0-1.43-.8-2.16-.79-.73-2.18-.73t-2.18.73q-.8.73-.8 2.16 0 .6.2 1.12.19.51.57.88.37.38.93.59.55.21 1.28.21m0-13.19q-.66 0-1.14.2-.48.21-.8.55t-.47.78q-.15.45-.15.94 0 .52.13 1 .13.49.43.87.3.37.79.6t1.21.23 1.21-.23.79-.6q.3-.38.43-.87.13-.48.13-1 0-.49-.16-.94-.16-.44-.47-.78t-.79-.55q-.48-.2-1.14-.2m2.93 6.26q1.58.52 2.34 1.58.75 1.06.75 2.6 0 1.15-.43 2.09-.44.93-1.23 1.59-.8.66-1.91 1.02t-2.45.36-2.45-.36-1.91-1.02q-.79-.66-1.23-1.59-.43-.94-.43-2.09 0-1.54.75-2.6.76-1.06 2.34-1.58-1.26-.53-1.89-1.5t-.63-2.34q0-.98.4-1.83.41-.86 1.13-1.49t1.72-.98 2.2-.35 2.2.35 1.72.98 1.13 1.49q.4.85.4 1.83 0 1.37-.63 2.34t-1.89 1.5"/></svg>',
                    '9' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#808080" d="M21.12 20.63q0 1.45.75 2.21t2.13.76q.72 0 1.28-.23.57-.22.95-.62.39-.4.58-.94.2-.54.2-1.16 0-.71-.21-1.27-.22-.55-.62-.94-.39-.38-.94-.59-.54-.2-1.19-.2-.67 0-1.21.22t-.93.62q-.38.4-.59.94-.2.55-.2 1.2m-1.45 12.14 5.39-6.73q.2-.25.38-.49t.35-.48q-.6.38-1.32.58t-1.51.2q-.9 0-1.77-.32-.86-.31-1.53-.94-.68-.63-1.09-1.56t-.41-2.18q0-1.16.43-2.18t1.21-1.79 1.87-1.21 2.41-.44q1.34 0 2.4.42t1.81 1.17q.75.76 1.15 1.81.4 1.06.4 2.32 0 .8-.13 1.52-.14.72-.39 1.39-.26.67-.62 1.3-.36.64-.8 1.26l-3.97 5.67q-.21.28-.61.48-.41.2-.93.2z"/></svg>',
                ];
        }

        // https://placehold.co/48x48/1F2937/F05252?text=0
        return $darkMode ? [
            '0' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M30.36 23.995q0 2.27-.49 3.95-.48 1.67-1.34 2.76t-2.03 1.63q-1.17.53-2.52.53-1.36 0-2.52-.53-1.16-.54-2.01-1.63t-1.33-2.76q-.48-1.68-.48-3.95 0-2.28.48-3.94.48-1.67 1.33-2.76.85-1.1 2.01-1.63t2.52-.53q1.35 0 2.52.53t2.03 1.63q.86 1.09 1.34 2.76.49 1.66.49 3.94m-3.06 0q0-1.88-.28-3.12-.27-1.23-.73-1.96-.47-.74-1.07-1.03t-1.24-.29-1.23.29q-.6.29-1.05 1.03-.46.73-.73 1.96-.27 1.24-.27 3.12 0 1.89.27 3.12.27 1.24.73 1.97.45.73 1.05 1.03.59.29 1.23.29t1.24-.29q.6-.3 1.07-1.03.46-.73.73-1.97.28-1.23.28-3.12"/></svg>',
            '1' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M26.305 30.47h3.12v2.22h-9.6v-2.22h3.52V20.35q0-.6.03-1.23l-2.49 2.09q-.22.16-.43.21-.21.04-.4 0-.18-.03-.33-.12-.14-.09-.21-.2l-.94-1.29 5.29-4.5h2.44z"/></svg>',
            '2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M24.455 30.01h4.45q.48 0 .76.27.29.27.29.71v1.78h-11.91v-.98q0-.3.13-.63.12-.33.4-.6l5.27-5.28q.66-.67 1.18-1.28t.87-1.21.53-1.22q.19-.62.19-1.3 0-.63-.18-1.1-.18-.48-.51-.8t-.79-.49q-.46-.16-1.04-.16-.53 0-.98.15t-.8.42q-.34.27-.58.63t-.36.79q-.21.56-.53.74-.33.18-.94.08l-1.56-.28q.18-1.24.7-2.19.51-.94 1.29-1.57.77-.63 1.77-.95 1.01-.31 2.16-.31 1.2 0 2.19.35 1 .35 1.71 1t1.1 1.56q.4.91.4 2.03 0 .96-.28 1.78-.29.81-.76 1.56-.47.74-1.11 1.44-.64.69-1.33 1.41l-3.91 4q.56-.17 1.12-.26t1.06-.09"/></svg>',
            '3' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="m20.07 20.435-1.56-.28q.18-1.24.69-2.19.52-.94 1.29-1.57.78-.63 1.78-.95 1-.31 2.15-.31 1.2 0 2.17.34.96.34 1.65.95.68.6 1.05 1.42.36.81.36 1.76 0 .83-.18 1.46-.19.63-.54 1.1-.34.47-.86.79t-1.16.54q1.56.49 2.32 1.5.77 1.01.77 2.53 0 1.3-.48 2.29-.48 1-1.29 1.68-.82.68-1.89 1.02-1.08.35-2.28.35-1.31 0-2.28-.3t-1.69-.89q-.72-.58-1.22-1.44-.51-.85-.87-1.96l1.31-.54q.52-.22.97-.12t.65.49q.22.42.47.83.26.4.62.72t.85.52q.48.2 1.16.2.75 0 1.32-.25.56-.25.94-.64.38-.4.56-.88.19-.49.19-.98 0-.63-.13-1.14-.14-.51-.56-.87t-1.2-.56q-.79-.2-2.11-.2v-2.12q1.09-.01 1.81-.2t1.15-.53q.43-.35.59-.83.17-.48.17-1.05 0-1.23-.68-1.86-.69-.64-1.83-.64-.52 0-.97.15-.44.15-.8.42-.35.27-.59.63t-.36.79q-.2.56-.53.74t-.93.08"/></svg>',
            '4' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M20.555 26.14h5.28v-5.68q0-.8.11-1.77zm7.86 0h2.19v1.72q0 .24-.16.41-.15.17-.44.17h-1.59v4.24h-2.58v-4.24h-7.32q-.3 0-.52-.18-.23-.19-.29-.46l-.31-1.5 8.22-10.98h2.8z"/></svg>',
            '5' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="m22.665 17.92-.61 3.61q.58-.12 1.11-.18.52-.05 1.02-.05 1.36 0 2.41.41 1.04.41 1.75 1.13t1.07 1.68q.36.97.36 2.08 0 1.38-.49 2.52-.48 1.14-1.35 1.95-.86.81-2.04 1.26-1.19.44-2.58.44-.81 0-1.55-.17-.73-.16-1.37-.45-.64-.28-1.19-.64-.54-.37-.98-.78l.92-1.26q.28-.41.75-.41.3 0 .61.2.32.19.72.42.4.22.95.42.54.19 1.31.19.82 0 1.44-.27.62-.26 1.04-.73.41-.48.62-1.13.21-.66.21-1.42 0-1.42-.82-2.22t-2.43-.8q-1.24 0-2.53.46l-1.85-.53 1.44-8.42h8.57v1.26q0 .63-.4 1.03-.39.4-1.34.4z"/></svg>',
            '6' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="m28.34 15.23-5.15 6.3-.6.74q.51-.25 1.09-.39t1.25-.14q.99 0 1.92.33.93.32 1.64.98.7.65 1.14 1.62.43.97.43 2.27 0 1.21-.45 2.27-.44 1.07-1.24 1.86-.81.79-1.94 1.25-1.14.45-2.5.45-1.4 0-2.5-.44-1.1-.45-1.88-1.24-.78-.8-1.2-1.92-.41-1.13-.41-2.49 0-1.23.5-2.52.49-1.29 1.54-2.68l4.14-5.56q.21-.28.63-.49.41-.2.95-.2zm-4.47 15.12q.7 0 1.3-.24.59-.24 1.02-.67.42-.44.66-1.02t.24-1.26q0-.75-.22-1.34-.23-.6-.65-1.01t-1.01-.63-1.3-.22q-.7 0-1.28.24t-.98.67q-.41.43-.64 1.01t-.23 1.25q0 .72.2 1.32.2.59.59 1.01t.96.65q.58.24 1.34.24"/></svg>',
            '7' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M18.01 15.325h11.98v1.28q0 .58-.12.93-.12.36-.24.6l-6.57 13.53q-.21.42-.58.72-.37.29-.99.29h-2.15l6.71-13.26q.22-.41.45-.75.22-.34.49-.65h-8.3q-.28 0-.48-.21-.2-.2-.2-.48z"/></svg>',
            '8' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M24 30.555q.73 0 1.28-.21.56-.21.93-.59.38-.37.57-.88.2-.52.2-1.12 0-1.43-.8-2.16-.79-.73-2.18-.73t-2.18.73q-.8.73-.8 2.16 0 .6.2 1.12.19.51.57.88.37.38.93.59.55.21 1.28.21m0-13.19q-.66 0-1.14.2-.48.21-.8.55t-.47.78q-.15.45-.15.94 0 .52.13 1 .13.49.43.87.3.37.79.6t1.21.23 1.21-.23.79-.6q.3-.38.43-.87.13-.48.13-1 0-.49-.16-.94-.16-.44-.47-.78t-.79-.55q-.48-.2-1.14-.2m2.93 6.26q1.58.52 2.34 1.58.75 1.06.75 2.6 0 1.15-.43 2.09-.44.93-1.23 1.59-.8.66-1.91 1.02t-2.45.36-2.45-.36-1.91-1.02q-.79-.66-1.23-1.59-.43-.94-.43-2.09 0-1.54.75-2.6.76-1.06 2.34-1.58-1.26-.53-1.89-1.5t-.63-2.34q0-.98.4-1.83.41-.86 1.13-1.49t1.72-.98 2.2-.35 2.2.35 1.72.98 1.13 1.49q.4.85.4 1.83 0 1.37-.63 2.34t-1.89 1.5"/></svg>',
            '9' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#1F2937"/><path fill="#F05252" d="M21.12 20.63q0 1.45.75 2.21t2.13.76q.72 0 1.28-.23.57-.22.95-.62.39-.4.58-.94.2-.54.2-1.16 0-.71-.21-1.27-.22-.55-.62-.94-.39-.38-.94-.59-.54-.2-1.19-.2-.67 0-1.21.22t-.93.62q-.38.4-.59.94-.2.55-.2 1.2m-1.45 12.14 5.39-6.73q.2-.25.38-.49t.35-.48q-.6.38-1.32.58t-1.51.2q-.9 0-1.77-.32-.86-.31-1.53-.94-.68-.63-1.09-1.56t-.41-2.18q0-1.16.43-2.18t1.21-1.79 1.87-1.21 2.41-.44q1.34 0 2.4.42t1.81 1.17q.75.76 1.15 1.81.4 1.06.4 2.32 0 .8-.13 1.52-.14.72-.39 1.39-.26.67-.62 1.3-.36.64-.8 1.26l-3.97 5.67q-.21.28-.61.48-.41.2-.93.2z"/></svg>',
        ] : [
            // https://placehold.co/48x48/FFFFFF/F05252?text=0
            '0' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M30.36 23.995q0 2.27-.49 3.95-.48 1.67-1.34 2.76t-2.03 1.63q-1.17.53-2.52.53-1.36 0-2.52-.53-1.16-.54-2.01-1.63t-1.33-2.76q-.48-1.68-.48-3.95 0-2.28.48-3.94.48-1.67 1.33-2.76.85-1.1 2.01-1.63t2.52-.53q1.35 0 2.52.53t2.03 1.63q.86 1.09 1.34 2.76.49 1.66.49 3.94m-3.06 0q0-1.88-.28-3.12-.27-1.23-.73-1.96-.47-.74-1.07-1.03t-1.24-.29-1.23.29q-.6.29-1.05 1.03-.46.73-.73 1.96-.27 1.24-.27 3.12 0 1.89.27 3.12.27 1.24.73 1.97.45.73 1.05 1.03.59.29 1.23.29t1.24-.29q.6-.3 1.07-1.03.46-.73.73-1.97.28-1.23.28-3.12"/></svg>',
            '1' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M26.305 30.47h3.12v2.22h-9.6v-2.22h3.52V20.35q0-.6.03-1.23l-2.49 2.09q-.22.16-.43.21-.21.04-.4 0-.18-.03-.33-.12-.14-.09-.21-.2l-.94-1.29 5.29-4.5h2.44z"/></svg>',
            '2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M24.455 30.01h4.45q.48 0 .76.27.29.27.29.71v1.78h-11.91v-.98q0-.3.13-.63.12-.33.4-.6l5.27-5.28q.66-.67 1.18-1.28t.87-1.21.53-1.22q.19-.62.19-1.3 0-.63-.18-1.1-.18-.48-.51-.8t-.79-.49q-.46-.16-1.04-.16-.53 0-.98.15t-.8.42q-.34.27-.58.63t-.36.79q-.21.56-.53.74-.33.18-.94.08l-1.56-.28q.18-1.24.7-2.19.51-.94 1.29-1.57.77-.63 1.77-.95 1.01-.31 2.16-.31 1.2 0 2.19.35 1 .35 1.71 1t1.1 1.56q.4.91.4 2.03 0 .96-.28 1.78-.29.81-.76 1.56-.47.74-1.11 1.44-.64.69-1.33 1.41l-3.91 4q.56-.17 1.12-.26t1.06-.09"/></svg>',
            '3' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="m20.07 20.435-1.56-.28q.18-1.24.69-2.19.52-.94 1.29-1.57.78-.63 1.78-.95 1-.31 2.15-.31 1.2 0 2.17.34.96.34 1.65.95.68.6 1.05 1.42.36.81.36 1.76 0 .83-.18 1.46-.19.63-.54 1.1-.34.47-.86.79t-1.16.54q1.56.49 2.32 1.5.77 1.01.77 2.53 0 1.3-.48 2.29-.48 1-1.29 1.68-.82.68-1.89 1.02-1.08.35-2.28.35-1.31 0-2.28-.3t-1.69-.89q-.72-.58-1.22-1.44-.51-.85-.87-1.96l1.31-.54q.52-.22.97-.12t.65.49q.22.42.47.83.26.4.62.72t.85.52q.48.2 1.16.2.75 0 1.32-.25.56-.25.94-.64.38-.4.56-.88.19-.49.19-.98 0-.63-.13-1.14-.14-.51-.56-.87t-1.2-.56q-.79-.2-2.11-.2v-2.12q1.09-.01 1.81-.2t1.15-.53q.43-.35.59-.83.17-.48.17-1.05 0-1.23-.68-1.86-.69-.64-1.83-.64-.52 0-.97.15-.44.15-.8.42-.35.27-.59.63t-.36.79q-.2.56-.53.74t-.93.08"/></svg>',
            '4' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M20.555 26.14h5.28v-5.68q0-.8.11-1.77zm7.86 0h2.19v1.72q0 .24-.16.41-.15.17-.44.17h-1.59v4.24h-2.58v-4.24h-7.32q-.3 0-.52-.18-.23-.19-.29-.46l-.31-1.5 8.22-10.98h2.8z"/></svg>',
            '5' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="m22.665 17.92-.61 3.61q.58-.12 1.11-.18.52-.05 1.02-.05 1.36 0 2.41.41 1.04.41 1.75 1.13t1.07 1.68q.36.97.36 2.08 0 1.38-.49 2.52-.48 1.14-1.35 1.95-.86.81-2.04 1.26-1.19.44-2.58.44-.81 0-1.55-.17-.73-.16-1.37-.45-.64-.28-1.19-.64-.54-.37-.98-.78l.92-1.26q.28-.41.75-.41.3 0 .61.2.32.19.72.42.4.22.95.42.54.19 1.31.19.82 0 1.44-.27.62-.26 1.04-.73.41-.48.62-1.13.21-.66.21-1.42 0-1.42-.82-2.22t-2.43-.8q-1.24 0-2.53.46l-1.85-.53 1.44-8.42h8.57v1.26q0 .63-.4 1.03-.39.4-1.34.4z"/></svg>',
            '6' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="m28.34 15.23-5.15 6.3-.6.74q.51-.25 1.09-.39t1.25-.14q.99 0 1.92.33.93.32 1.64.98.7.65 1.14 1.62.43.97.43 2.27 0 1.21-.45 2.27-.44 1.07-1.24 1.86-.81.79-1.94 1.25-1.14.45-2.5.45-1.4 0-2.5-.44-1.1-.45-1.88-1.24-.78-.8-1.2-1.92-.41-1.13-.41-2.49 0-1.23.5-2.52.49-1.29 1.54-2.68l4.14-5.56q.21-.28.63-.49.41-.2.95-.2zm-4.47 15.12q.7 0 1.3-.24.59-.24 1.02-.67.42-.44.66-1.02t.24-1.26q0-.75-.22-1.34-.23-.6-.65-1.01t-1.01-.63-1.3-.22q-.7 0-1.28.24t-.98.67q-.41.43-.64 1.01t-.23 1.25q0 .72.2 1.32.2.59.59 1.01t.96.65q.58.24 1.34.24"/></svg>',
            '7' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M18.01 15.325h11.98v1.28q0 .58-.12.93-.12.36-.24.6l-6.57 13.53q-.21.42-.58.72-.37.29-.99.29h-2.15l6.71-13.26q.22-.41.45-.75.22-.34.49-.65h-8.3q-.28 0-.48-.21-.2-.2-.2-.48z"/></svg>',
            '8' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M24 30.555q.73 0 1.28-.21.56-.21.93-.59.38-.37.57-.88.2-.52.2-1.12 0-1.43-.8-2.16-.79-.73-2.18-.73t-2.18.73q-.8.73-.8 2.16 0 .6.2 1.12.19.51.57.88.37.38.93.59.55.21 1.28.21m0-13.19q-.66 0-1.14.2-.48.21-.8.55t-.47.78q-.15.45-.15.94 0 .52.13 1 .13.49.43.87.3.37.79.6t1.21.23 1.21-.23.79-.6q.3-.38.43-.87.13-.48.13-1 0-.49-.16-.94-.16-.44-.47-.78t-.79-.55q-.48-.2-1.14-.2m2.93 6.26q1.58.52 2.34 1.58.75 1.06.75 2.6 0 1.15-.43 2.09-.44.93-1.23 1.59-.8.66-1.91 1.02t-2.45.36-2.45-.36-1.91-1.02q-.79-.66-1.23-1.59-.43-.94-.43-2.09 0-1.54.75-2.6.76-1.06 2.34-1.58-1.26-.53-1.89-1.5t-.63-2.34q0-.98.4-1.83.41-.86 1.13-1.49t1.72-.98 2.2-.35 2.2.35 1.72.98 1.13 1.49q.4.85.4 1.83 0 1.37-.63 2.34t-1.89 1.5"/></svg>',
            '9' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><rect width="100%" height="100%" fill="#FFFFFF"/><path fill="#F05252" d="M21.12 20.63q0 1.45.75 2.21t2.13.76q.72 0 1.28-.23.57-.22.95-.62.39-.4.58-.94.2-.54.2-1.16 0-.71-.21-1.27-.22-.55-.62-.94-.39-.38-.94-.59-.54-.2-1.19-.2-.67 0-1.21.22t-.93.62q-.38.4-.59.94-.2.55-.2 1.2m-1.45 12.14 5.39-6.73q.2-.25.38-.49t.35-.48q-.6.38-1.32.58t-1.51.2q-.9 0-1.77-.32-.86-.31-1.53-.94-.68-.63-1.09-1.56t-.41-2.18q0-1.16.43-2.18t1.21-1.79 1.87-1.21 2.41-.44q1.34 0 2.4.42t1.81 1.17q.75.76 1.15 1.81.4 1.06.4 2.32 0 .8-.13 1.52-.14.72-.39 1.39-.26.67-.62 1.3-.36.64-.8 1.26l-3.97 5.67q-.21.28-.61.48-.41.2-.93.2z"/></svg>',
        ];
    }
}
