<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  {{-- <title>@yield('title')</title> --}}
  <link rel="icon" type="image/svg+xml" href="{{asset('assets/images/Logo.svg')}}" />
  <title>InternFinder @stack('title')</title>
  {{-- <link rel="shortcut icon" href="/favicon.ico"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assetss/Font_Awesome/css/font-awesome.min.css')}}">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  {{--  --}}
  <!-- Start include Custom Style Css -->
  {{-- <link rel="stylesheet" href="{{asset('assets/css/modals.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('assets/style.css')}}">
  <style></style>
  <!-- End include Custom Style Css -->
  @yield('css')
</head>

<body style="background-color:#F3F5F8  ;font-family: poppins">
    <div class="app-section" >
        @yield('content')
    </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  @yield('scripts')

<script>
    $(document).ready(function() {
        $('#state').change(function() {
            var state = $(this).val();
            
            if (state) {
                $.ajax({
                    url: '/city',
                    type: 'get',
                    dataType: 'json',
                    data: {state: state},
                    success: function(response) {
                        
                       $('#municipal').empty();
                        $.each(response, function(key, value) {
                            $('#municipal').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#municipal').empty();
                $('#municipal').append('<option hidden >Select a municipality</option>');
            }
        });
    });
</script>
</body>
</html>