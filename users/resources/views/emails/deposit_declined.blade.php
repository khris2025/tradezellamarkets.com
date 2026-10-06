<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deposit Failed</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f6f7fb;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            color: #111827;
        }

        .wrapper {
            padding: 40px 16px;
        }

        .container {
            max-width: 620px;
            margin: auto;
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            display: flex;
        }

        .accent {
            width: 6px;
            background: #6937B6;
        }

        .content {
            padding: 32px;
            width: 100%;
        }

        .logo {
            max-width: 110px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0 0 10px;
            font-size: 22px;
            color: #111827;
        }

        p {
            font-size: 15px;
            line-height: 1.7;
            color: #4b5563;
            margin: 10px 0;
        }

        .card {
            margin: 24px 0;
            background: #fef2f2;
            border: 1px solid rgba(220, 38, 38, 0.2);
            border-radius: 12px;
            padding: 18px;
            text-align: center;
        }

        .amount {
            font-size: 22px;
            font-weight: 700;
            color: #dc2626;
        }

        .note {
            font-size: 13px;
            color: #6b7280;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #9ca3af;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
            }

            .accent {
                width: 100%;
                height: 6px;
            }

            .content {
                padding: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">

            <!-- SIDE LINE -->
            <div class="accent"></div>

            <!-- CONTENT -->
            <div class="content">

                <!-- LOGO -->
                <img class="logo" src="https://users.tradezellamarkets.com/public/assets/images/logo2.png" alt="Company Logo">

                <h2>Deposit Not Successful</h2>

                <p>Hello {{ $user->name }},</p>

                <p>
                    We regret to inform you that your deposit attempt was not successful.
                </p>

                <div class="card">
                    <div class="amount">${{ number_format($deposit_amount) }}</div>
                    <p class="note" style="margin-top: 8px;">
                        This amount was not credited to your account
                    </p>
                </div>

                <p>
                    Your account balance remains unchanged.
                </p>

                <p>
                    If you believe this is an error, please contact our support team for assistance.
                </p>

                <p>
                    Sincerely,<br>
                    <strong>TRADEZELLA Markets</strong>
                </p>

                <div class="footer">
                    © {{ date('Y') }} TRADEZELLA MARKETSAll rights reserved.
                </div>

            </div>
        </div>
    </div>
</body>

</html>