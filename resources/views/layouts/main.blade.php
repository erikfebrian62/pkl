<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Voting SMK Pertiwi Kuningan</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/pilihkandidat.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Signika+Negative&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <style>
        body {
            font-family: 'Signika Negative', sans-serif;
        }

        a .judul {
            font-family: 'Viga', sans-serif;
        }

      .footer {
        background-color: #00102e;
        height: 85px;
      }
      .text {
        padding-top: 35px;
        text-align: center;
        color: white;
      }

      .logo {
        height: 65px;
        width: 65px;
        margin-right: 10px;
      }
      .judul{
        padding-top: 9px;
      }

      .wait {
        width: 550px;
      }
      
      .gambar img{
        width: 100%;
        max-width: 850px;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      
    </style>

    <title>Project PKL</title>
</head>
<body class="">

    @include('partials.navbar')


    <div class="kandidat">
        @yield('content')
    </div>

    @include('partials.footer')


    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

     {{-- Sweet-alert2 --}}

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!-- Jquery -->
     <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

     {{-- svg di page nunggu --}}
     <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    @stack('script')
</body>
</html>
