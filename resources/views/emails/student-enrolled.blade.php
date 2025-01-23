<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inschrijving Bevestigd</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">🎉 Je bent ingeschreven!</h2>
        <p>Beste {{ $student->firstname }} {{ $student->surname }},</p>
        <p>Gefeliciteerd! Je bent ingeschreven voor de cursus <strong>{{ $course->name }}</strong>.</p>
        <p><strong>Startdatum:</strong> {{ $course->startday }}</p>
        <p><strong>Instrument:</strong> {{ $course->type }}</p>
        <p>Veel succes en plezier met je lessen!</p>
        <p style="margin-top: 20px;">Met vriendelijke groet,<br><strong>Het Team van MuziekMeesters</strong></p>
    </div>
</body>
</html>
