<!DOCTYPE html>
<html>
<head>
    <title>PDF Generator</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f6fa;
            text-align: center;
            padding: 50px;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .preview {
            background: #3498db;
            color: white;
        }

        .download {
            background: #2ecc71;
            color: white;
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>📄 Generate PDF Report</h2>

        <form method="GET" action="/generate-pdf">
            
            <input type="text" name="search" placeholder="Enter name or email (optional)">

            <input type="password" name="pdf_password" placeholder="Set PDF Password (Default: 123456)">

            <br>

            <button type="submit" name="type" value="view" class="preview">
                Preview PDF
            </button>

            <button type="submit" class="download">
                Download PDF
            </button>

        </form>
    </div>

</body>
</html>