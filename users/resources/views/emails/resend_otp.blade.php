<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Request</title>

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

        .otp-box {
            margin: 24px 0;
            background: #f4f0ff;
            border: 1px solid rgba(105, 55, 182, 0.2);
            border-radius: 12px;
            padding: 18px;
            text-align: center;
        }

        .otp {
            font-size: 28px;
            letter-spacing: 6px;
            font-weight: 700;
            color: #6937B6;
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

                <h2>OTP Verification</h2>

                <p>Hello {{ $user->fullname }},</p>

                <p>
                    You requested a new One-Time Password (OTP) to verify your account.
                </p>

                <div class="otp-box">
                    <div class="otp">{{ $otp }}</div>
                </div>

                <p class="note">
                    This OTP is valid for 10 minutes. If you did not request this, please ignore this email or contact
                    support immediately.
                </p>

                <p>
                    Thank you,<br>
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