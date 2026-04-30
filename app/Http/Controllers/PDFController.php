<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $users = $query->get();

        $qrData = 'Report generated on: ' . now()->format('d M Y') . ' | Total Users: ' . $users->count();
        $qrCode = base64_encode(QrCode::format('svg')->margin(1)->size(100)->generate($qrData));

        $data = [
            'title' => 'Secure User Report',
            'date' => now()->format('d M Y'),
            'users' => $users,
            'total' => $users->count(),
            'qrCode' => $qrCode
        ];

        $pdf = Pdf::loadView('pdf.myPDF', $data);

        $password = $request->filled('pdf_password') ? $request->pdf_password : '123456';
        $pdf->setEncryption($password);

        $fileName = 'Secure_Report';
        
        if ($request->filled('search')) {
            $cleanSearch = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->search);
            $fileName .= '_' . $cleanSearch;
        }

        $fileName .= '_' . now()->format('d_M_Y') . '.pdf';

        if ($request->type == 'view') {
            return $pdf->stream($fileName);
        }

        return $pdf->download($fileName);
    }
}