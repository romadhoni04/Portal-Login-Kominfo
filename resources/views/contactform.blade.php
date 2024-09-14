<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <p><strong>From:</strong> {{ $name }} ({{ $email }})</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $message }}</p>
</body>

</html>