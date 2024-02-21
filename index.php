<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPREC KEMAKOM</title>
    <!-- Boostrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="64x64" href="assets/logo.png">

</head>

<body>

    <!-- <div class="container"> -->
    <!-- Section Navigasi Hastag -->
    <nav class="navbar">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <img src="assets/Header.png" alt="Bootstrap" width="240" class="mt-5">
            </a>
        </div>
    </nav>

    <!-- Section Utama -->
    <section class="main m-5 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <!-- Judul -->
            <h1 class="fw-bolder text-white header-orange">Pengumuman Kelulusan</h1>
            <h2 class="text-white fw-bold">Calon Pengurus</h2>
            <p class="text-white fw-bold header-yellow">BEM KEMAKOM FPMIPA UPI 2024</p>
            <p class="fw-2 fs-5 text-white">Yuk cek pengumuman kelulusan dengan memasukkan
                <strong>NIM</strong> kamu di bawah ini!
            </p>
            <!-- Form Pengecekkan -->
            <form id="submissionForm">
                <!-- Input NIM -->
                <div class="d-grid col-md-8 mx-auto mb-3 bg-green rounded-1">
                    <input type="nim" class="form-control border-0" id="nim" name="nim" placeholder="Masukkan NIM...">
                </div>
                <!-- Button Submit -->
                <div class="d-grid col-md-8 mx-auto">
                    <button type="button" class="btn btn-primary btn-orange border-0 rounded-1" data-bs-toggle="modal"
                        data-bs-target="#myModal" id="submissionFormButton">Cek
                        Di sini!</button>
                </div>
            </form>


        </div>
    </section>

    <!-- Modal Pengumuman -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="identitas" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content text-center">
                <!-- Menghapus kelas modal-kemakom -->
                <div class="modal-header mx-auto">
                    <p class="modal-title mx-auto" id="identitas"></p>
                </div>
                <div class="modal-body">
                    <p id="pesan-no-nim"> </p>
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-4">
                                <div class="animasi img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <img src="./img/Group 935.png" width="130" /> -->

                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p id="motivasi"></p>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- </div> -->

    <!-- Boostrap JavaScript Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- JAVASCRIPT -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
    <script src="js/data.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script2.js"> </script>
</body>

</html>