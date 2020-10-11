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
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="export_option" style="text-align: center;">
<a href="http://localhost/laravel-dompdf/dompdf/public/download_section"><button class="" data-val="1">Download PDF</button></a>
<button class="download_section" data-val="2">Save PDF</button>
<a href="http://localhost/laravel-dompdf/dompdf/public/download_excel"><button  >Download EXCEL</button></a>
<button class="download_section" data-val="4">Save EXCEL</button>
</div>

            </div>
        </div>
        <script>
        $(document).on("click",".download_section",function(){
            var value = $(this).attr("data-val");
            var url = "{{BASE_URL}}"+"download_section1?type="+value+""; 
            if(value == 1)
            {
                var url = "{{BASE_URL}}"+"download_section?type="+value+""; 
                $(this).html('Downloading...');
                window.location.assign(url);
            }
            if(value == 2)
            {
                var url = "{{BASE_URL}}"+"download_section1?type="+value+"";  
            }
            if(value == 3)
            {
                var url = "{{BASE_URL}}"+"download_excel?type="+value+"";  
                $(this).html('Downloading...');
                window.location.assign(url);
            }
            if(value == 4){
                var url = "{{BASE_URL}}"+"save_excel?type="+value+"";  
            }
            // $(this).html('Saving...');  
                $.ajax({
      type: 'GET',
      url: url,
    //   dataType: 'json',
      success: function (data) {
        // ajax success
         alert("Saved successfully");
        
      },
      error: function (data) {
        console.log('Error:', data);
      }
    }); 
           
         
        })
        </script>
    </body>
</html>
