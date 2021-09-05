<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Api Creator Admin Login</title>
</head>

<body>
    @if(Session::has('errors'))
    <h3>{{Session::get('errors')}}</h3>
    @endif

    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <div>
            <label>E-mail</label>
            <input type="email" name="email" id="email"/>
        </div>
        <br/>
        <div>
            <label>Password</label>
            <input type="password" name="password" id="password"/>
        </div>
        <br/>
        <input type="submit" value="Giriş" name="send"/>
    </form>
</body>

</html>

