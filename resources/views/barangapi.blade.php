<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
            background: #1a1a1a;
            color: #fff;
        }

        #barang-data {
            background: #2d2d2d;
            padding: 20px;
            border-radius: 5px;
            white-space: pre-wrap;
        }

        .error {
            color: #ff6b6b;
            padding: 10px;
            margin-top: 10px;
        }

        pre {
            margin: 0;
            color: #a9dc76;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div id="barang-data">Loading...</div>
    <script src="{{ asset('js/barangapi.js') }}"></script>
</body>

</html>