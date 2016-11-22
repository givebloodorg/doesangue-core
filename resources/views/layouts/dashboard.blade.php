<<<<<<< 4da80d6577e9a5832dd03c1d377b4f411d154433
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - @yield('pagina')</title>
  <!-- Foundation CSS -->
  <link rel="stylesheet" href="/assets/foundation6/css/foundation.min.css">

</head>
<body>


  @yield('content')


  <script src="public/assets/foundation6/vendor/foundation.min.js"></script>
  <script src="public/assets/foundation6/vendor/jquery.js"></script>
  <script src="public/assets/foundation6/app.js"></script>

</body>
</html>
||||||| merged common ancestors
=======
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - @yield('pagina')</title>
  <!-- Foundation CSS -->
  <link rel="stylesheet" href="/assets/foundation6/css/foundation.min.css">

</head>
<body>


  @yield('conteudo')


  <script src="public/assets/foundation6/vendor/foundation.min.js"></script>
  <script src="public/assets/foundation6/vendor/jquery.js"></script>
  <script src="public/assets/foundation6/app.js"></script>

</body>
</html>
>>>>>>> Adicionando FoundationCSS para o frontend
