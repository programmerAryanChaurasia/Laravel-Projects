<html>
    <head>
        <title>Form</title>
    </head>
    <body>
        <form action="{{ url('/') }}" method="post" enctype="multipart/form-data">
            @csrf           
            Name :<input type="text" name="name"><br><br>
            Image: <input type="file" name="image"><br><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>