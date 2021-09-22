<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!-- Head -->
  @include('layout.head')
    
  <body>
    @include('frontend.header')    

    @include('frontend.banner.index')
        
    @include('layout.bottomhead')
    @include('frontend.footer')
  </body>
</html>    
