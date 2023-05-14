<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>YukNulis-Tulis Cerita</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="D:\Project\web\bootstrap\bootstrap.css">
    <link rel="stylesheet" href="D:\Project\web\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="D:\Project\web\bootstrap\_bootswatch.scss">
    <link rel="stylesheet" href="D:\Project\web\bootstrap\_variables.scss">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts --->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23019901-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23019901-1');
    </script>
    <script id="_carbonads_projs" type="text/javascript" src="https://srv.carbonads.net/ads/CKYIE23N.json?segment=placement:bootswatchcom&amp;callback=_carbonads_go"></script>
</head>
<body>  
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="tambahcerita"><i class="bi bi-chevron-left"></i></a>
            </li>
          </ul>
          <ul class="navbar-nav ms-md-auto">
            <li class="nav-item">
              <a href="tambahcerita"><button class="btn btn-secondary">Cancel</button></a>
            </li>
            <div class="d-flex" style="height: 20px; width: 15px;">
              <div class="vr"></div>
            </div>
            <li class="nav-item">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPublish">Publish</button>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container" style="padding-top: 60px; ">
      <div class="col-lg-10" style="text-align: center; padding-left: 180px;">
        <div class="container-center" >
          <h3 contenteditable="true">Part tak berjudul</h3>
          <hr class="solid">
          <div class="mb-5">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="20"></textarea>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="modalPublish">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Periksa kembali sebelum dipublish</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-4 col-md-7 col-sm-6">
                <div class="text-center">
                  <img src="" class="rounded" alt="">
                  <h5>Sampul</h5>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="container" style="box-shadow: 0 0 .10rem">
                  <br>
                  <h5>Detail Cerita</h5>
                  <hr class="solid">
                  <h5>Judul Cerita</h5>
                  <input class="form-control form-control-sm" type="text" placeholder="Tulis judul" aria-label=".form-control-sm example">
                  <br>
                  <h5>Deskripsi</h5>
                    <div class="mb-3">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                  <h5>Karakter Utama</h5>
                  <input class="form-control form-control-sm" type="text" placeholder="Nama karakter utama" aria-label=".form-control-sm example">
                  <br>
                  <h5>Pilih Kategori</h5>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih kategori</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Publish</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../_vendor/prismjs/prism.js" data-manual=""></script>
    <script src="../_assets/js/custom.js"></script>
  
</body>
</html>
