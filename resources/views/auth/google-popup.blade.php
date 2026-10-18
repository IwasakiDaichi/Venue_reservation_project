
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sign-In</title>
</head>
<body>
    <p id="message">Completing sign-in...</p>

    <script>
        const success = @json($success);
        const message = @json($message);

        if (success) {
            document.getElementById('message').textContent =
                'Sign-in successful. Returning to the application...';

            if (window.opener && !window.opener.closed) {
                window.opener.postMessage(
                    { type: 'google-login-success' },
                    window.location.origin
                );
                window.close();
            } else {
                window.location.replace('/dashboard');
            }
        } else {
            document.getElementById('message').textContent =
                message || 'Google sign-in failed. Please try again.';

            if (window.opener && !window.opener.closed) {
                window.opener.postMessage(
                    {
                        type: 'google-login-error',
                        message: message || 'Google sign-in failed.'
                    },
                    window.location.origin
                );
            }
        }
    </script>
</body>
</html>
