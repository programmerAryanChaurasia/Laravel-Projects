<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.csslink')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">

    @include('admin.navbar')

    <div class="main-panel">

        <div class="content-wrapper">
            {{-- Body --}}   

            <h1>Aryan Chaurasia</h1>

        </div>         
    </div>
    </div>

    @include('admin.jslink')

  </body>
</html>