<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $patient = [
            'name' => 'Laura Gómez',
            'age' => 29,
            'id' => 'PAC-2048',
            'doctor' => 'Dr. Daniel Ruiz',
            'clinic' => 'DentiSync Clinic',
            'nextAppointment' => 'Hoy · 17:30',
            'lastVisit' => '15 ago 2026',
            'insurance' => 'Sanitas Premium',
            'risk' => 'Bajo',
            'plan' => 'Ortodoncia invisible',
            'completion' => 78,
            'hygieneScore' => 9.2,
        ];

        $treatments = [
            ['name' => 'Limpieza profesional', 'date' => '7 sep · 09:30', 'status' => 'Programado'],
            ['name' => 'Control de ortodoncia', 'date' => '14 sep · 11:15', 'status' => 'Pendiente'],
            ['name' => 'Radiografía 3D', 'date' => '22 sep · 16:00', 'status' => 'Confirmado'],
        ];

        return view('dashboard', compact('patient', 'treatments'));
    }

    public function profile(): View
    {
        $profile = [
            'name' => 'Laura Gómez',
            'email' => 'laura.gomez@dentisync.com',
            'phone' => '+34 612 345 678',
            'city' => 'Madrid',
            'dob' => '14/03/1997',
            'insurance' => 'Sanitas Premium',
            'affiliate' => 'AF-2048-77',
            'bloodType' => 'A+',
            'medicalNotes' => 'Sin alergias conocidas. Seguimiento de tratamiento con ortodoncia invisible.',
            'preferences' => [
                'Recordatorio por SMS',
                'Confirmación por WhatsApp',
                'Idioma: Español',
            ],
        ];

        return view('profile', compact('profile'));
    }
}
