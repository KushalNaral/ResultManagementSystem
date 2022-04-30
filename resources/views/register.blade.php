<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>REGISTER PAGE</h1>

<form method="post" action="{{ route('register.api')}}">
    <h1>Please fill out the following information</h1>
    <div>
        <label>Enter your name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Enter your email address</label>
        <input type="email" name="email">
    </div>

    <div>
        <label>Enter your phone number</label>
        <input type="phone_number" name="phone_number">
    </div>

    <div>
        <label>Enter your address</label>
        <input type="text" name="address">
    </div>

    <div>
        <label>Enter your password</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Reenter your password</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
    <div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </div>

</form>





</body>
</html>
