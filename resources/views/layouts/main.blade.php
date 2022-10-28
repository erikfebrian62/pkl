<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/pilihkandidat.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Project PKL</title>
</head>
<body class="font-monoscope">

    @include('partials.navbar')


    <div class="kandidat">
        @yield('content')
    </div>

    @include('partials.footer')

    <div class="modal fade" id="popup1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body" >
              <div class="row justify-content-center">
                <div class="col-start-center">
                  <h3 class="text-center">Apakah anda yakin akan memilih kandidat ini ?</h3>
                </div>
              </div>
              <br>
              <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <form action="">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">YA saya yakin</button>
                  </form>
                </div>
              </div><br>
              <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
              </div>
              <br>
              <br>
            </div>
            </div>


          </div>
        </div>
      </div>
      <div class="modal fade" id="popup2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body" class="container-text-center">
              <div class="row float-end">
                <div class="col">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="row justify-content-center align-items-center text-center" style="margin-top:60px ">
                <div class="col">
                  <svg xmlns="http://www.w3.org/2000/svg" color="green" width="100" height="100" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                  </svg>
                </div>
                </div><br>
                <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <h2>Voting Berhasil</h2>
                </div>
            </div><br>
            <div class="row justify-content-center align-items-center text-center">
              <div class="col">
                <p>Terimakasih atas partisipan anda  dalam voting pemilihan ketua osis</p>
              </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>
