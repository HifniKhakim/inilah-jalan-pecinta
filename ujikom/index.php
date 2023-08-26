<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>pendaftaran beasiswa</title>
</head>
<body>
    <?php
    include_once("connection.php");

    $result = mysqli_query($conn, "SELECT * FROM pendaftar");

    if (isset($_GET['link_page'])){
        $link_page = $_GET['link_page'];
    } else {
        $link_page = 1;
    }

    if (isset($_GET['jenis_beasiswa'])){
        $jenis_beasiswa = $_GET['jenis_beasiswa'];
    } else {
        $jenis_beasiswa = "akademik";
    }

    function SetLinkPage($actual_link, $reference_link) {
        $result = "";
        if ($actual_link == $reference_link) {
            $result = "show active";
        }
        return $result;
    }

    function SetContentPage($actual_content, $reference_content) {
        $result = "";
        if ($actual_content == $reference_content) {
            $result = "show active";
        }
        return $result;
    }
    function SetBeasiswa($actual_beasiswa, $reference_beasiswa) {
        $result = "";
        if ($actual_beasiswa == $reference_beasiswa) {
            $result = "selected";
        }
        return $result;
    }

    $minValue = 2.9;
    $maxValue = 3.5;

    function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

    $ipk = round(generateRandomFloat($minValue, $maxValue), 2);

    function SetDisable($ipk) {
        $result = "";
        if ($ipk < 3) {
            $result = "disabled";
        }
        return $result;
    }
    ?>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- ... (Navbar content) ... -->
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Pendaftaran beasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-auto">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>
    
    <!-- Tabs Navigation -->
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active <?php echo SetLinkPage("1", $link_page) ?>" id="nav-beasiswa" data-bs-toggle="tab" href="#beasiswa" role="tab" aria-controls="nav-beasiswa" aria-selected="true">Pilihan beasiswa</a>
                <a class="nav-item nav-link <?php echo SetLinkPage("2", $link_page) ?>" id="nav-daftar" data-bs-toggle="tab" href="#daftar" role="tab" aria-controls="nav-daftar" aria-selected="false">Daftar</a>
                <a class="nav-item nav-link <?php echo SetLinkPage("3", $link_page) ?>" id="nav-hasil" data-bs-toggle="tab" href="#hasil" role="tab" aria-controls="nav-hasil" aria-selected="false">Hasil</a>
            </div>
        </nav>

        <!-- Tab Contents -->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?php echo SetContentPage("1", $link_page) ?>" id="beasiswa" role="tabpanel" aria-labelledby="nav-beasiswa-tab">
                <!-- ... (Beasiswa content) ... -->
                <h3>Jenis Beasiswa</h3>

<!-- Beasiswa Akademis -->
<div class="card">
  <div class="card-header" id="headingAkademis">
    <h4 class="mb-0">
      <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAkademis" aria-expanded="true" aria-controls="collapseAkademis">
        Beasiswa Akademis
      </button>
    </h4>
  </div>
  <div id="collapseAkademis" class="collapse show" aria-labelledby="headingAkademis" data-bs-parent="#accordion">
    <div class="card-body">
      Beasiswa ini diberikan kepada siswa yang memiliki prestasi akademis yang sangat baik, seperti nilai rata-rata tinggi, peringkat kelas teratas, atau pencapaian akademis lainnya. Beasiswa ini mendorong dan menghargai prestasi belajar.<br>
      <a class="btn btn-primary btn-lg my-large-btn" href="index.php?link_page=2&jenis_beasiswa=akademik">Daftar Sekarang</a>
    </div>
  </div>
</div>

<!-- Beasiswa Non Akademis -->
<div class="card">
  <div class="card-header" id="headingNonAkademis">
    <h4 class="mb-0">
      <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNonAkademis" aria-expanded="false" aria-controls="collapseNonAkademis">
        Beasiswa Non Akademis
      </button>
    </h4>
  </div>
  <div id="collapseNonAkademis" class="collapse" aria-labelledby="headingNonAkademis" data-bs-parent="#accordion">
    <div class="card-body">
      <ul>
        <li>
          <h5>Beasiswa Seni dan Budaya:</h5>
          Beasiswa ini diberikan kepada mereka yang memiliki bakat di bidang seni, seperti musik, seni rupa, tari, sastra, dan lain-lain. Tujuannya adalah mendukung perkembangan bakat seni dan budaya.
        </li>
        <li>
          <h5>Beasiswa Riset dan Studi Lanjutan:</h5>
          Diberikan kepada individu yang ingin mengejar studi lanjutan atau riset dalam bidang tertentu. Beasiswa ini sering diberikan oleh universitas atau lembaga riset untuk mendorong penelitian dan pengembangan ilmu pengetahuan.
        </li>
        <!-- Tambahkan sisa contoh beasiswa non akademis di sini -->
      </ul>
      <p>Penting untuk selalu membaca dan memahami persyaratan serta prosedur aplikasi untuk setiap jenis beasiswa yang Anda minati. Mencari beasiswa yang sesuai dengan bakat, minat, dan kebutuhan Anda akan membantu memaksimalkan peluang mendapatkan bantuan finansial dalam mengejar pendidikan atau riset.</p>
      <ul>
        <li>Prestasi Akademis: ...</li>
        <li>Surat Rekomendasi: ...</li>
        <!-- Tambahkan sisa contoh persyaratan beasiswa di sini -->
      </ul>
      <a class="btn btn-primary btn-lg my-large-btn" href="index.php?link_page=2&jenis_beasiswa=non_akademik">Daftar Sekarang</a>
    </div>
  </div>
</div>

            </div>
            
            <div class="tab-pane fade <?php echo SetContentPage("2", $link_page) ?>" id="daftar" role="tabpanel" aria-labelledby="nav-daftar-tab">
                <!-- ... (Form Pendaftaran content) ... -->
                <fieldset>
                <form action="add_pendaftaran.php" method="post" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="nama lengkap" required>
                    </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="hp" class="col-sm-2 col-form-label">Nomor HP</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="hp" id="hp" placeholder="handphone" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-10">
                  <select class="form-control" name="semester" id="semester" required <?php echo SetDisable($ipk) ?>>
                    <?php
                    for ($i = 1; $i <= 8; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ipk" id="ipk" value="<?php echo $ipk ?>" required readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="beasiswa" class="col-sm-2 col-form-label">Beasiswa</label>
                <div class="col-sm-10">
                  <select class="form-control" name="beasiswa" id="beasiswa" <?php echo SetDisable($ipk) ?> required>
                    <option value="akademik" <?php echo SetBeasiswa("akademik", $jenis_beasiswa) ?>>Akademik</option>
                    <option value="non_akademik" <?php echo SetBeasiswa("non_akademik", $jenis_beasiswa) ?>>Non Akademik</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="upload_file" class="col-sm-2 col-form-label" <?php echo SetDisable($ipk) ?>>Choose File</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="berkas" id="customFile" required <?php echo SetDisable($ipk) ?>>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-sm-2">
                  <input class="btn btn-primary btn-lg my-large-btn" type="submit" value="Daftar" <?php echo SetDisable($ipk) ?>>
                  <a class="btn btn-danger btn-lg" href="index.php?link_page=2">Batal</a>
                </div>
              </div>

                </form>
                  </fieldset>
            </div>
            
            <div class="tab-pane fade <?php echo SetContentPage("3", $link_page) ?>" id="hasil" role="tabpanel" aria-labelledby="nav-hasil-tab">
                <!-- ... (Hasil content) ... -->
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                  ?>

                  <div class="row grid-item">
                  <div class="col-md-3 col-lg-4 img-container">
                  <img class="img-fluid" src="uploads/<?php echo $user_data['berkas']; ?>" alt="">
                 </div>
                  <div class="col-md-9 col-lg-8 info-container">
                    <div class="row">

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>Nama:</h4>
                        <h5><?php echo $user_data['nama'];?></h5>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>Email:</h4>
                        <h5><?php echo $user_data['email'];?></h5>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>No. HP:</h4>
                        <h5><?php echo $user_data['hp'];?></h5>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>Semester:</h4>
                        <h5><?php echo $user_data['semester'];?></h5>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>IPK:</h4>
                        <h5><?php echo $user_data['ipk'];?></h5>
                      </div>

                      <div class="col-sm-6 col-md-6 col-lg-4">
                        <h4>Beasiswa:</h4>
                        <h5><?php echo $user_data['beasiswa'];?></h5>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                        <h4>Status:</h4>
                        <h5><?php echo $user_data['status'];?></h5>
                      </div>
                    </div>

                    </div>
                  </div>
                </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
