<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{app('tenant')->name}}</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;0,800;1,200;1,400&display=swap" rel="stylesheet">
    @livewireStyles
  
  </head>
  <body>
  <div class="bg-gray-100">
      
        @yield('content')


  </div>
    @livewireScripts
  </body>
</html>
