<!DOCTYPE>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="C">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>@yield('title')</title> 
    
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-theme.css')!!}
    {!!Html::style('css/elegant-icons-style.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/style.css')!!}
    {!!Html::style('css/style-responsive.css')!!}
    {!!Html::style('css/jquery-ui-1.10.4.min.css')!!}
  </head>

  <body>
   @yield('content')


    {!!Html::script('js/jquery.js')!!}
    {!!Html::script('js/jquery-ui-1.10.4.min.js')!!}
    {!!Html::script('js/jquery-1.8.3.min.js')!!}
    {!!Html::script('text/javascript" src="js/jquery-ui-1.9.2.custom.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
   
    <!-- javascripts -->
    
  </body>
  </html>