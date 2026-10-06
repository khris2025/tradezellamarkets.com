{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trade Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px;">
        <h2 style="color: #333;">Trade Confirmation</h2>
        <p>Hello {{ $user->fullname }},</p>

        <p>Your trade has been successfully placed. Here are the details:</p>

        <ul style="line-height: 1.6;">
            <li><strong>Order Type:</strong> {{ $trade->order }}</li>
            <li><strong>Trade Type:</strong> {{ $trade->type }}</li>
            <li><strong>Symbol:</strong> {{ $trade->symbol }}</li>
            <li><strong>Volume:</strong> {{ $trade->volume }}</li>
            <li><strong>Stop Loss (SL):</strong> {{ $trade->sl }}</li>
            <li><strong>Take Profit (TP):</strong> {{ $trade->tp }}</li>
            <li><strong>Transaction ID:</strong> {{ $trade->transaction_id }}</li>
            <li><strong>Status:</strong> {{ $trade->status }}</li>
        </ul>

        <p>If you did not initiate this trade, please contact support immediately.</p>

        <p>Thank you for trading with us!</p>
        <p style="margin-top: 20px;">Best regards,<br><strong>Your Company Name</strong></p>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trade Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px;">

        <h2 style="color: #333;">Trade Confirmation</h2>
        <p>Hello {{ $user->fullname }},</p>

        <p>Your trade has been successfully placed. Here are the details:</p>

        <div style="display: flex; border-left: 5px solid {{ strtolower($trade->type) === 'buy' ? '#28a745' : '#dc3545' }}; padding-left: 15px; margin-top: 20px;">
            <ul style="line-height: 1.8; margin: 0; padding: 0; list-style: none;">
                <li><strong>Order Type:</strong> {{ $trade->order }}</li>
                <li><strong>Trade Type:</strong> 
                    <span style="color: {{ strtolower($trade->type) === 'buy' ? '#28a745' : '#dc3545' }};">
                        {{ ucfirst($trade->type) }}
                    </span>
                </li>
                <li><strong>Symbol:</strong> {{ $trade->symbol }}</li>
                <li><strong>Volume:</strong> {{ $trade->volume }}</li>
                <li><strong>Stop Loss (SL):</strong> {{ $trade->sl }}</li>
                <li><strong>Take Profit (TP):</strong> {{ $trade->tp }}</li>
                <li><strong>Transaction ID:</strong> {{ $trade->transaction_id }}</li>
                <li><strong>Status:</strong> {{ $trade->status }}</li>
            </ul>
        </div>

        <p style="margin-top: 20px;">If you did not initiate this trade, please contact support immediately.</p>

        <p>Thank you for trading with us!</p>
        <p style="margin-top: 30px;">Best regards,<br> <strong>TRADEZELLA Markets</strong></p>
    </div>
</body>
</html>
