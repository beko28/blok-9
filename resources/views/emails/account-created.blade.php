<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom bij MuziekMeesters!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">🎵 Welkom bij MuziekMeesters!</h2>
        <p>Beste {{ $user->firstname }} {{ $user->surname }},</p>
        <p>Je account is succesvol aangemaakt bij <strong>MuziekMeesters</strong>!</p>
        <p>Je kunt nu inloggen en beginnen met het ontdekken van onze muzieklessen.</p>

        <p><strong>Jouw gegevens:</strong></p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <p><a href="{{ url('/login') }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px;">Log in op je account</a></p>

        <p>Veel succes en plezier met je lessen!</p>
        <p style="margin-top: 20px;">Met vriendelijke groet,<br><strong>Het Team van MuziekMeesters</strong></p>
    </div>
</body>
</html>
