Project: PHP_Laravel12_Generate_PDF_File_From_Content
---
This project demonstrates how to generate PDF files using Laravel 12 from Blade HTML templates using the package:

barryvdh/laravel-dompdf


You will build:
---
 Laravel 12 project
 DomPDF integration
 Controller for PDF generation
 Route
 Blade template
 Dynamic PDF (with user list)
 PDF download / stream in browser

 Table of Contents
---
Project Overview

Requirements

Installation

Step-by-Step Guide

Full Code Files

Optional Enhancements

Project Structure

Troubleshooting

License

 Project Overview
---
This project shows how to:

Convert Blade HTML to PDF

Load dynamic data into the PDF

Download the PDF or show it inline

Use DomPDF features (paper size, orientation, fonts, tables, etc.)

 Requirements
---
PHP 8.1+

Composer

Laravel 12

MySQL (optional, if fetching user data)

 Installation
---
Step 1 — Create New Laravel 12 Project
```
composer create-project laravel/laravel PHP_Laravel12_Generate_PDF_File_From_Content "12.*"
```

This creates the Laravel 12 project folder. After that:
```

cd PHP_Laravel12_Generate_PDF_File_From_Content
```

Step 2 — Install DomPDF Package

DomPDF is a popular library to generate PDFs from HTML. Laravel has a wrapper package for ease. itsolutionstuff.com

Run this Composer command: 
```

composer require barryvdh/laravel-dompdf
```

This installs barryvdh/laravel-dompdf into your Laravel project. itsolutionstuff.com


Step 3 — Publish Config (Optional) If you want custom settings (like paper size), publish config: 
```

php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

This will create config/dompdf.php (optional step). codeshotcut.com


Step 4 —Create Controller

 We will make a controller to handle PDF generation.

 Run: 
 ```

      php artisan make:controller PDFController 
```

This creates: app/Http/Controllers/PDFController.php

 Now open that file and add this:
```

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
```

Explanation (Controller) 
 use Barryvdh\DomPDF\Facade\Pdf

 — Imports the PDF facade.

 GitHub  $users = User::get() 

— Gets all users from database (optional). 
itsolutionstuff.com 


 Pdf::loadView() 

— Loads the Blade view and binds data.

 GitHub  download()

 — Sends file to browser for download.


Step 5 — Add Route

Open:  routes/web.php 

Add this route:
```

use App\Http\Controllers\PDFController;
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
```

This defines a GET endpoint /generate-pdf. itsolutionstuff.com

Step 6 — Create Blade View (PDF Layout) 

Create view file: resources/views/pdf/myPDF.blade.php 

Add this HTML:

```

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>

    <style>
        /* ===============================
           Global PDF Page Styling
        ================================ */
        body {
            font-family: DejaVu Sans, sans-serif; /* Supports all Unicode text */
            margin: 50px;                         /* Clean page margin */
        }

        /* ===============================
           Header Title Styling
        ================================ */
        h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* ===============================
           Date Styling
        ================================ */
        .date {
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* ===============================
           Paragraph Styling
        ================================ */
        p {
            font-size: 14px;
            line-height: 22px;        /* Better readability */
            text-align: justify;       /* Makes paragraph look professional */
        }

        /* ===============================
           Dynamic Table Styling
        ================================ */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 35px;
        }

        th, td {
            border: 1px solid #333;
            padding: 10px;
            font-size: 14px;
        }

        th {
            background: #f0f0f0;        /* Light grey header for clean look */
        }
    </style>
</head>

<body>

    <!-- ===============================
         PDF Title
    ================================ -->
    <h1>{{ $title }}</h1>

    <!-- ===============================
         Current Date
    ================================ -->
    <div class="date">
        Date: {{ $date }}
    </div>

    <!-- ===============================
         Beautiful Paragraph
    ================================ -->
    <p>
        This PDF report is generated dynamically using Laravel and the DOMPDF package. 
        It demonstrates how we can convert HTML and Blade templates into a downloadable 
        PDF format. Using Blade makes it easy to add styling, tables, and dynamic content 
        directly from the database. This example shows clean formatting, structured layout, 
        and readable typography, making the PDF suitable for documentation, reports, or 
        any professional presentation requirement.
    </p>

    <!-- ===============================
         Dynamic Database Table
    ================================ -->


</body>
</html>

```

Explanation (View) 
 Blade variables ({{ }}) are passed from controller. 
 You can use HTML & CSS inside the view — DomPDF will convert it. laraveldaily.com


Step 7 — Run the App

Now start Laravel server: 
```

php artisan serve
```

 Visit in browser: 
```

http://127.0.0.1:8000/generate-pdf
```


This will generate and download generated_pdf.pdf. itsolutionstuff.com 

 Optional Enhancements 
 ---

 Show PDF in Browser Use

 return $pdf->stream('file.pdf'); instead of download(). 

 Custom Paper Orientation/Size 

$pdf->setPaper('a4', 'landscape'); 

 Send PDF as Email Attachment You can attach the PDF and send via mail (advanced).

 Laravel Blog 



Final Laravel Project Folder Structure for PDF Generation

```

PHP_Laravel12_Generate_PDF_File_From_Content/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── PDFController.php        ← Your PDF controller
│
├── resources/
│   └── views/
│       └── pdf/
│           └── myPDF.blade.php          ← PDF template file
│
├── routes/
│   └── web.php                          ← Route for generating PDF
│
├── vendor/                              ← Composer dependencies (auto-generated)
│
├── composer.json
├── package.json
├── vite.config.js
├── artisan
└── .env


