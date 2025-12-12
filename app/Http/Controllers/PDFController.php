<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;     // Only if you want dynamic data
use Barryvdh\DomPDF\Facade\Pdf; // PDF facade

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Dummy dynamic data example
        $users = User::get(); // fetch user data

        $data = [
            'title' => 'Laravel 12 PDF Example',
            'date' => now()->format('d M Y'),
            'users' => $users
        ];

        // loadView — load a Blade view into PDF
        $pdf = Pdf::loadView('pdf.myPDF', $data);

        // Download the generated PDF
        return $pdf->download('generated_pdf.pdf');
    }
}
