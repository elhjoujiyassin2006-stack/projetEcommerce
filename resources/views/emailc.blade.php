<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de PrimeShop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #B87333 0%, #22d3ee 100%);
            padding: 40px 20px;
            text-align: center;
        }
        .email-header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.8;
        }
        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #B87333;
            margin-bottom: 20px;
        }
        .message-content {
            background-color: #f9f9f9;
            padding: 25px;
            border-left: 4px solid #B87333;
            border-radius: 8px;
            margin: 20px 0;
            font-size: 16px;
        }
        .email-footer {
            background-color: #1e293b;
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .email-footer p {
            margin: 5px 0;
            font-size: 14px;
        }
        .divider {
            height: 2px;
            background: linear-gradient(to right, transparent, #B87333, transparent);
            margin: 30px 0;
        }
        .icon {
            display: inline-block;
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-bottom: 15px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="icon">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h1>✨ PrimeShop ✨</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p class="greeting">👋 Bonjour,</p>
            
            <p>Vous avez reçu un nouveau message via le formulaire de contact de <strong>PrimeShop</strong>.</p>
            
            <div class="divider"></div>
            
            <div class="message-content">
                <p style="margin: 0;">{{$msg}}</p>
            </div>
            
            <div class="divider"></div>
            
            <p style="margin-top: 30px; color: #666;">
                Cordialement,<br>
                <strong style="color: #B87333;">L'équipe PrimeShop</strong>
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p><strong>PrimeShop</strong></p>
            <p>E-Commerce Premium | Qualité & Excellence</p>
            <p style="font-size: 12px; color: #94a3b8; margin-top: 15px;">
                Cet email a été envoyé automatiquement, merci de ne pas y répondre.
            </p>
        </div>
    </div>
</body>
</html>
