
<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
<div style="display: none; font-size: 1px; color: #fefefe; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    We're thrilled to have you here! Get ready to dive into your new account.
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#FF007F" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FF007F" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Arial, sans-serif; font-size: 48px; font-weight: 400;">
                        <h1>Welcome!</h1>
                        <img src="https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; font-family: Arial, sans-serif; font-size: 18px; color: #666;">
                        <p>We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 20px;">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#failModal">Verify Email</button>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Failed Verification Popup -->
<div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="failModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="failModalLabel">Verification Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sorry, your email verification failed. Please try again or contact support.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
