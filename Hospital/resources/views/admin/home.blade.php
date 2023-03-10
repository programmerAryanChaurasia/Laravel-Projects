<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
      <div class="container-scroller">
            
        @include('admin.sidebar')
          
        @include('admin.navbar')
            
        @include('admin.body')
    </div>    

    @include('admin.script')
  </body>
</html>