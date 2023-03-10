<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .custom_login{
            height: 800px;
        }
        .custom_product{
            height: auto;
        }
        .carousel_image{
            height: 500px;    
        }
        .carousel-caption{
            background-color: #35443585;
        }
        .tranding_product{
            margin-top: 25px;
        }
        .tranding_image{
            height: 100px;
            margin: 10px
            
        }
        .tranding_image_div{
            float: left;
        }
        .tranding_product_name{
            padding-left: 10px;
            padding-right: 25px;
            margin: 20px;
        }
        .detail_page{
            padding-top: 25px;
            padding-bottom: 25px;
        }
        .detail_page_image{
            height: 150px;
        }
        .card_list_devider{
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    
    @include('header')
    @yield('content')
    @include('footer')


   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>