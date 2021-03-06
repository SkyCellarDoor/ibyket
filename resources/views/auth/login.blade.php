<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Static top for Semantic-UI</title>
    <meta name="description" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <link href="{{ asset("semantic/") }}/css/semantic.css" rel="stylesheet" type="text/css"/>

    <!-- endbower -->
    <!-- endbuild -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,vietnamese' rel='stylesheet'
          type='text/css'>
</head>
<body style="padding: 10px; background: #e5e5e5;">


<script src="https://code.jquery.com/jquery-3.2.1.js" type="text/javascript"></script>
<script src="{{ asset("/semantic/") }}/js/semantic.js" type="text/javascript"></script>


<div class="ui middle aligned center aligned grid">
    <div class="column" style="max-width: 450px; margin-top: 100px;">
        <h2 class="ui teal image header">
            {{--<img src="1" class="image">--}}
            <div class="content">
                SkyApp
            </div>
        </h2>
        <form class="ui large form" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input id="email" class="form-control" name="username" value="{{ old('username') }}"
                               placeholder="Логин" required autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input id="password" type="password" name="password" placeholder="Пароль">
                    </div>
                </div>
                <input type="submit" class="ui fluid large teal submit button" value="Войти">
            </div>
        </form>
    </div>
</div>

</body>
</html>

