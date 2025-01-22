<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update over je proefles</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">📢 Update over je proefles</h2>
        <p>Beste {{ $trialLesson->student->name }},</p>
        <p>Je proeflesaanvraag bij <strong>{{ $trialLesson->teacher->name }}</strong> is <strong style="color: 
            @if($trialLesson->status == 'approved') green 
            @elseif($trialLesson->status == 'rejected') red 
            @endif;">
            {{ ucfirst($trialLesson->status) }}
        </strong>.
        </p>

        @if($trialLesson->status == 'approved')
            <p>Gefeliciteerd! De leraar zal binnenkort contact met je opnemen om een datum af te spreken.</p>
        @else
            <p>Helaas heeft de leraar de aanvraag geweigerd. Je kunt een andere leraar kiezen om een nieuwe proefles aan te vragen.</p>
        @endif

        <p>Bedankt voor je interesse in muzieklessen!</p>

        <p style="margin-top: 20px;">Met vriendelijke groet,<br>Het Team van Jouw Muziekschool</p>
    </div>
</body>
</html>
