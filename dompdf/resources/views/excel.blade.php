<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

  <title>DOM PDF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style> 
button {
    margin: 10px;
}
</style>
</head>
    <body>
        <div class="flex-center position-ref full-height">
          
            <div class="content">  
               
<div class="container">
   <form action="{{BASE_URL}}get-data" method="POST" enctype="multipart/form-data" >
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   <input type="file" name="file">
   <button type="submit" >Get Data</button>
   </form>
</div>
 

            </div>
        </div>
       
    </body>
</html>
