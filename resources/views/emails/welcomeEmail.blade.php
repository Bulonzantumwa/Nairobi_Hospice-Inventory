<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
</head>
<body>
<h1>Welcome to Our Application</h1>
<p>Hello {{ $user->name }},</p>
<p>Your account has been created successfully. Please find your login details below:</p>

<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>

<p>We recommend that you change your password immediately after logging in for security reasons. Also Note: you will be required to verify your email address, click on Resend Verification email if you don't receive the verification email.</p>

<p>Thank you for joining Nairobi Hospice Inventory!</p>

<p>Best regards,</p>
<p>The Application Team</p>
</body>
</html>
