<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $query = User::query();

        // FILTER (Search by name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $query->get();

        $data = [
            'title' => 'Laravel 12 User Report',
            'date' => now()->format('d M Y'),
            'users' => $users,
            'total' => $users->count()
        ];

        $pdf = Pdf::loadView('pdf.myPDF', $data);

        // Dynamic File Name
        $fileName = 'user_report';

        if ($request->filled('search')) {
            $fileName .= '_' . str_replace(' ', '_', $request->search);
        }

        $fileName .= '.pdf';

        // 👁 Preview OR Download
        if ($request->type == 'view') {
            return $pdf->stream($fileName); // preview in browser
        }

        return $pdf->download($fileName); // download
    }
}