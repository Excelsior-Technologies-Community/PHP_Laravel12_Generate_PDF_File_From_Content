<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>

    <style>
        @page {
            margin: 100px 50px 50px 50px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        header {
            position: fixed;
            top: -80px;
            left: 0;
            right: 0;
            height: 100px;
            border-bottom: 2px solid #2ecc71;
        }

        .logo {
            float: left;
            font-size: 26px;
            font-weight: bold;
            color: #2c3e50;
            margin-top: 30px;
        }

        .qr-code {
            float: right;
            margin-top: 5px;
        }

        .watermark {
            position: fixed;
            top: 35%;
            left: 15%;
            opacity: 0.1;
            font-size: 80px;
            font-weight: bold;
            transform: rotate(-45deg);
            color: #e74c3c;
            z-index: -1;
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }

        .pagenum:before {
            content: counter(page); 
        }

        .content {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #bdc3c7;
            padding: 10px;
            font-size: 13px;
            text-align: center;
        }

        th {
            background: #34495e;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
    </style>
</head>

<body>

    <div class="watermark">CONFIDENTIAL</div>

    <header>
        <div class="logo">🚀 Excelsior PDF System</div>
        <div class="qr-code">
            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code">
        </div>
    </header>

    <footer>
        Generated Securely by Laravel 12 | Page <span class="pagenum"></span>
    </footer>

    <div class="content">
        <h2 style="text-align: center;">{{ $title }}</h2>
        <p><strong>Date:</strong> {{ $date }}</p>
        <p><strong>Total Users:</strong> {{ $total }}</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-M-Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>