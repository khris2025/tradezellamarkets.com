<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trade Closed Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px;">
        <h2 style="color: #333;">Trade Closed</h2>

        <p>Hello {{ $user->fullname }},</p>

        <p>We would like to inform you that your trade has been closed. Please find the details below:</p>

        <div style="display: flex; border-left: 5px solid {{ $trade->profit >= 0 ? '#28a745' : '#dc3545' }}; padding-left: 15px; margin-top: 20px;">
            <ul style="line-height: 1.8; margin: 0; padding: 0; list-style: none;">
                <li><strong>Order Type:</strong> {{ $trade->order }}</li>
                <li><strong>Trade Type:</strong> 
                    <span style="color: {{ strtolower($trade->type) === 'buy' ? '#28a745' : '#dc3545' }}">
                        {{ ucfirst($trade->type) }}
                    </span>
                </li>
                <li><strong>Symbol:</strong> {{ $trade->symbol }}</li>
                <li><strong>Volume:</strong> {{ $trade->volume }}</li>
                <li><strong>Stop Loss (SL):</strong> {{ $trade->sl }}</li>
                <li><strong>Take Profit (TP):</strong> {{ $trade->tp }}</li>
                <li><strong>Transaction ID:</strong> {{ $trade->transaction_id }}</li>
                <li><strong>Status:</strong> Closed</li>
                <li><strong>Final Profit:</strong> 
                    <span style="color: {{ $total >= 0 ? '#28a745' : '#dc3545' }}">
                        {{ number_format($total, 2) }}
                    </span>
                </li>
            </ul>
        </div>

        <p style="margin-top: 20px;">Thank you for trading with us. You can view all your trades from your account dashboard.</p>

        <p style="margin-top: 30px;">Best regards,<br> <strong>TRADEZELLA Markets</strong></p>
    </div>
</body>
</html>
