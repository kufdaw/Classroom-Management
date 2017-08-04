<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome {{ $user->name }}!</h1>
        <p>
            Your account has been created. There is one more thing: you need to set your password to enjoy our community! <br />
            Just click <a href="{{ route('profile.setPassword', $user->registration_token) }}">here</a> :)
        </p>
    </body>
</html>
