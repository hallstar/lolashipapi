<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lolaship</title>
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
      <div class="navbar container mx-auto flex justify-between p-5">
        <div class="flex items-center justify-center">
         <a href="/"><img src="./assets/images/logo.svg" class="h-10" alt=""></a>
        </div>
        <div>
          <a href="/#features" class="font-bold text-gray-700 mr-3">Features</a>
          <a href="/#pricing" class="font-bold text-gray-700 mr-3">Pricing</a>
          <a href="{{env("DEMOURL")}}" class="btn btn-primary-border mr-3">See Example</a>
          <a href="/signup" class="btn btn-primary">Get Started</a>
        </div>
      </div>
    @yield('content');

    <div class="bg-blue-900 p-6">
      <div class="container mx-auto text-white">
        <div class="flex justify-center">
          <p class="text-center text-gray-100">© Lolaship</p>
          <a href="" class="underline font-bold mx-1">Privacy Policy</a>
          <p> and </p>
          <a href="" class="underline font-bold mx-1">Terms of Service</a>
          <p> and </p>
          <a href="" class="underline font-bold mx-1">Support</a>
        </div>
      </div>
    </div>
    </div>
    @livewireScripts
  </body>
</html>
