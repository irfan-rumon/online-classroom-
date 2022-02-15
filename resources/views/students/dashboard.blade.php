<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <h1>Students  dashboard</h1>

                <p>Welecome Mr. {{ Auth::user()->name  }}</p>
                <ul>
                    <li>
                    
                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a style="margin-left: 25px;" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                            </form>
                    </li>   
                </ul>
</body>
</html>