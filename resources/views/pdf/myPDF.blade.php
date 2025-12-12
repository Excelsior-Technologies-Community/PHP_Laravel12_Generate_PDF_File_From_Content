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
