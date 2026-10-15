<?php
// Script para generar login.blade.php desde Stitch HTML
$source = __DIR__ . "/storage/stitch-export/login-dentisync.html";
$html = file_get_contents($source);

// Agregar directivas Blade al inicio
$blade = "@extends('layouts.app')\n\n";
$blade .= "@section('title', 'Iniciar Sesión - DentiSync')\n\n";
$blade .= "@section('content')\n";

// Quitar <!DOCTYPE html>, <html>, <head>, <body> y </body></html>
$html = preg_replace('/^<!DOCTYPE html>\s*<html[^>]*>\s*<head>.*?<\/head>\s*<body[^>]*>/si', '', $html);
$html = preg_replace('/<\/body>\s*<\/html>\s*$/si', '', $html);

// Agregar el contenido
$blade .= $html;

// Cerrar section y agregar scripts
$blade .= "@endsection\n\n";
$blade .= "@section('scripts')\n";
$blade .= "<script>\n";
$blade .= "    function togglePasswordVisibility() {\n";
$blade .= "        const pwd = document.getElementById('password');\n";
$blade .= "        const icon = document.getElementById('eyeIcon');\n";
$blade .= "        if (pwd.type === 'password') {\n";
$blade .= "            pwd.type = 'text'; icon.innerText = 'visibility_off';\n";
$blade .= "        } else { pwd.type = 'password'; icon.innerText = 'visibility'; }\n";
$blade .= "    }\n";
$blade .= "    function simulateBiometric() { alert('Biométrico simulado'); }\n";
$blade .= "    function submitLogin() { alert('Login simulado'); }\n";
$blade .= "</script>\n";
$blade .= "@endsection\n";

// Guardar
$dest = __DIR__ . "/resources/views/login.blade.php";
file_put_contents($dest, $blade);
echo "login.blade.php creado: " . filesize($dest) . " bytes\n";