<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <title>Login</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset('assets/images/bg/bg1.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        /*------------ Login container ------------*/
        .box-area {
            width: 930px;
        }

        /*------------ Right box ------------*/
        .right-box {
            padding: 40px 30px 40px 40px;
        }

        /*------------ Custom Placeholder ------------*/
        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        /*------------ For small screens------------*/
        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .left-box {
                height: 100px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <p class="text-white text-center fs-4"
                    style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">SISTEM INFORMASI <br>
                    PENGUMPULAN DATA OPD</p>
                <div class="featured-image mb-3">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" class="img-fluid" style="width: 200px;">
                </div>
                <p class="text-white text-center fs-6"
                    style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">DINAS KOMUNIKASI
                    INFORMATIKA & PERSANDIAN <br> KOTA GORONTALO </p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Selalu Tanggap terhadap
                    Permasalahan</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Selamat Datang</h2>
                        <p>Silahkan Login</p>
                    </div>
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password">
                        </div>
                        
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</body>

</html>
