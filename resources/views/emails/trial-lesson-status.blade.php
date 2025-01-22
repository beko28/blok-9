<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update over je proefles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin: auto;
            text-align: center;
        }
        .header {
            background-color: #4A90E2;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            color: white;
            font-size: 22px;
            font-weight: bold;
        }
        .status {
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .status-approved {
            background-color: #28a745;
            color: white;
        }
        .status-rejected {
            background-color: #dc3545;
            color: white;
        }
        .content {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }
        .cta-button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #4A90E2;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
        .cta-button:hover {
            background-color: #357ABD;
        }
        .footer {
            font-size: 14px;
            color: #777;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="header">📢 Update over je proefles</div>

        <div class="content">
            <p>Beste <strong>{{ $trialLesson->student->firstname }} {{ $trialLesson->student->surname }}</strong>,</p>
            <p>Je proeflesaanvraag bij <strong>{{ $trialLesson->teacher->firstname }} {{ $trialLesson->teacher->surname }}</strong> is:</p>

            <p class="status 
                @if($trialLesson->status == 'Goedgekeurd') status-approved 
                @elseif($trialLesson->status == 'Afgewezen') status-rejected 
                @endif">
                {{ ucfirst($trialLesson->status) }}
            </p>

            @if($trialLesson->status == 'approved')
                <p>🎉 Gefeliciteerd! De leraar zal binnenkort contact met je opnemen om een datum af te spreken.</p>
                <a href="{{ route('student.trial-lessons') }}" class="cta-button">Bekijk jouw proeflessen</a>
            @else
                <p>Helaas is de aanvraag geweigerd. Je kunt een andere leraar kiezen en een nieuwe proefles aanvragen.</p>
                <a href="{{ route('teachers.index') }}" class="cta-button">Bekijk andere leraren</a>
            @endif
        </div>

        <div class="footer">
            <p>Bedankt voor je interesse in muzieklessen!</p>
            <p>Met vriendelijke groet,<br><strong>Het Team van MuziekMeesters</strong></p>
        </div>
    </div>

</body>
</html>
