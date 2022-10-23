<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 150px;">
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h4 class="mt-3 text-center">E-Voting <br>OSIS</h4>
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                            @endif
                            <form action="" class="mt-4" method="post">
                            @csrf
                                <div class="mb-3">
                                    <label for="nis" class="form-label">Masukan NIS</label>
                                    <input type="number" class="form-control" name="nis" id="nis">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Masukan Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
