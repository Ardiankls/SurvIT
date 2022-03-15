<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Easy Survey For Your Business" />
    <link rel="icon" href="assets/assets/logo/surviticon.png" sizes="1080x1080" type="assets/surviticon.png">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <!-- bs5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/landingpage.css">
    <title>Survit - Untuk Kamu Para Mahasiswa Yang Butuh Data</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light feature-first ">
        <div class="container-fluid">
            <a class="navbar-brand" href="  "><img src="assets/assets/logo/webLogo.png" alt="" width="125vw" class="d-inline-block align-text-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#firstsec">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#secondsec">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#thirdsec">Kenapa Survit?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#forthsec">Bergabung</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="index.html">Customer</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#Footer">Kontak kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid feature-first" id="firstsec">
        <div class="row h-75 ">
            <div class="p-lg-5">
                <div class="row">
                    <div class="col-sm-5 p-5">
                        <div class="position-relative top-50 start-50 translate-middle w3-animate-left fs-5 " id="_1sit">
                            <h1>Platform Survey<br>Buat Kamu Para Mahasiswa</h1>
                            <p> Buat survey mu sekarang atau dapatkan uang cuman isi survey ✨</p>
                            <a href="{{ route('register') }}"><button type="button"  class="btn btn-primary">Daftar Sekarang</button></a>
                            <p class="fs-6 mt-3">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary text-decoration-none">Masuk</a></p>
                            <!-- <a href="#" class="button1">Learn More</a> -->
                        </div>
                    </div>
                    <div class="col-7 d-none d-sm-block">
                        <img src="assets/webart_1.png" width="95%" alt="" class="w3-animate-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="secondsec">
        <div class="row">
            <h1 class="text-center mt-4 fw-bold"> Fitur </h1>
        </div>
        <div class="row">
            <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <h2 class="text-center"></h2>
                            <div class="col-2"></div>
                            <div class="col-sm-4">
                                <div class="position-relative top-50 start-50 translate-middle text-center text-lg-end">
                                    <h1 class="fw-bolder mb-5"> Demographic User Mapping</h1>
                                    <p class="fs-3">Dikategorikan berdasarkan kelamin, pekerjaan, minat, kota, dan lain-lain</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <lottie-player src="assets/webart.json" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-sm-4">
                                <div class="position-relative top-50 start-50 translate-middle text-center text-lg-end">
                                    <h1 class="fw-bolder mb-5">Integrasi Dengan Google Form</h1>
                                    <p class="fs-3">Kami menggunakan google form<br>agar kamu lebih mudah membuat survey</p>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                                <lottie-player src="assets/googleform.json" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <!-- <div class="carousel-item">
                        <div class="row">
                            <h2 class="text-center"> Demographic Sorting</h2>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <h3> We Use Demographic Survey for more valid data</h3>
                                <p>We categorize by gender, occupation, interest, city, and etc</p>
                            </div>
                            <div class="col-4">
                                <img src="assets/register.svg" alt="Anti-spam" class="mx-auto shadow" style="border-radius: 15px; width: 20vw">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Kembali</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Lanjut</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5" id="thirdsec">
        <div class="row">
            <h1 class="text-center p-5">Mengapa Survit?</h1>
        </div>
        <div class="row">
            <div id="carousel2" class="carousel slide carousel-fade " data-bs-ride="carouse2">
                <div class=" position-relative top-0 start-50 text-center translate-middle ">
                    <div class="btn rounded-pill bg-primary text-white m-2" type="button" data-bs-toggle="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">Respondent</div>
                    <div class="btn rounded-pill bg-primary text-white m-2" type="button" data-bs-toggle="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2">Customer</div>
                    <!-- <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-sm-2 text-center ">
                                <img src="assets/register.svg" class="mx-auto shadow " style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Aman</h3>
                                    <p>Data kamu diri kamu pasti aman 👍</p>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-md-2 text-center">
                                <img src="assets/fillsurvey.svg" alt="Phishing Detect" class="mx-auto shadow" style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Preferensi</h3>
                                    <p>Kami menyiapkan survey-survey yang sesuai dengan demografi kamu 😄</p>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-md-2 text-center">
                                <img src="assets/money.svg" alt="Smart Scan" class="mx-auto shadow" style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Tukar menjadi uang</h3>
                                    <p>Kumpulkan poin-poin mu lalu tukarkan langsung jadi uang 🤑</p>
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-sm-2 text-center ">
                                <img src="assets/register.svg" alt="Anti-spam" class="mx-auto shadow" style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Daftar</h3>
                                    <p>Daftarkan akun anda di SUrvit.</p>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-md-2 text-center">
                                <img src="assets/choosesurvey.svg" alt="Phishing Detect" class="mx-auto shadow" style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Post</h3>
                                    <p>Hubungi kami lalu kirimkan survei anda</p>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-md-2 text-center">
                                <img src="assets/collect.svg" alt="Smart Scan" class="mx-auto shadow" style="border-radius: 15px;">
                                <div class="mt-3 fs-5">
                                    <h3 class="fw-bolder">Hasil</h3>
                                    <p>Kumpulkan dan lihat hasil survey</p>
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carousel2" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>


        </div>
    </div>
    <div class="container-fluid p-5" id="forthsec">
        <div class="row">
            <h1 class="text-center mb-4 fw-bolder"> Bergabung sekarang </h1>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-sm-4">
                <!-- <form class="bg-light p-5 rounded-3 shadow" id="add-users-form">
                    <div class="mb-3">
                        <div for="exampleInputEmail1" class="form-label text-dark text-center text-lg-left">Email address</div>
                        <input type="email" name="inputEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text text-Dark">Kita tidak akan membagikan email anda ke orang lain.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form> -->
                <div class="bg-light p-4 rounded-3 shadow">
                    <div class="px-3">
                        <h5 class="mb-5 text-dark">Buat akun mu dan dapatkan poin atau buat survey mu sekarang</h5>
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <div class="container mb-1" id="Footer">
        <div class="row mt-3">
            <h1 class="text-center mt-2">Know Us More</h1>
            <p class="text-center"> Kontak kami melalui</p>
        </div>
        <div class="row">
            <div class="col-12 text-center ">
                <a href="mailto:survitsurvey@gmail.com" target="_blank"><i class="far fa-envelope fa-5x p-2 p-lg-5 " id="socmed"></i></a>
                <a href="https://www.instagram.com/surv.it/"><i class="fab fa-instagram fa-5x p-2 p-lg-5 " id="socmed"></i></a>
                <a href="https://api.whatsapp.com/send?phone=6285158909371&text=Hey%20SurvIT%20Team!"><i class="fab fa-whatsapp fa-5x p-2 p-lg-5 " id="socmed"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 align-self-center text-center ">
                <p class="" style="font-size: 0.7em;">Copyright © 2021 SurvIT</p>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-analytics.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Initialize Firebase -->
    <!-- <script src="/__/firebase/init.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script> -->
</body>

</html>
