<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Absensi Pelatkab</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/print.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="">
    <!-- title row -->
    <div class="row">
      <div class="col-2">
        <img src="/images/gabsi.png" class="img-kop float-end">
      </div>
      <div class="col-8 page-header">
        <!-- KOP GABKU -->
        <h1>GABKU</h1>
        <h3>GABUNGAN BRIDGE KULON PROGO</h3>
        <p>Sekretariat, Jl. Daendels KM 1 Brosot, Galur, Kulon Progo 55661 Telp: 085729600750</p>
      </div>
      <div class="col-2">
        <img src="/images/koni.jpg" class="img-kop float-start">
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row">
      <div class="col-12 page-header">
        <div class="hr-kop mb-2"></div>
        <h6>DAFTAR HADIR PELATKAB</h6>
        <h6>CABOR BRIDGE TAHUN {{ $year }}</h6>
      </div>
    </div>
    <div class="row justify-content-start mt-2">
      <div class="col-2">Bulan</div>
      <div class="col-8">: 
        @if($bulan == '01')
        Januari
        @elseif($bulan == '02')
        Februari
        @elseif($bulan == '03')
        Maret
        @elseif($bulan == '04')
        April
        @elseif($bulan == '05')
        Mei
        @elseif($bulan == '06')
        Juni
        @elseif($bulan == '07')
        Juli
        @elseif($bulan == '08')
        Agustus
        @elseif($bulan == '09')
        September
        @elseif($bulan == '10')
        Oktober
        @elseif($bulan == '11')
        November
        @elseif($bulan == '12')
        Desember
        @endif
      </div>
    </div>
    <div class="row justify-content-start">
      <div class="col-2">Tempat</div><div class="col-8">: Balai Desa Brosot</div>
    </div>
    <div class="row justify-content-start">
      <div class="col-2">Acara</div><div class="col-8">: Latihan</div>
    </div>

    <!-- Table row -->
    <div class="row mt-3">
      <div class="col-12 table-responsive">
        <table class="table table-bordered table-absensi">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Atlet</th>
            @foreach($dataAbsen as $data)
            <th>{{ $data->tanggal }}</th>
            @endforeach
          </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            @foreach($atlets as $data)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <div class="row justify-content-end mt-2">
      <div class="col-4 text-center">
        <p class="mb-0">Kulon Progo, {{ $tanggal_paraf }}</p>
        <p>Manager</p>
        <br><br><br><br>
        <p>Heru Sarjana, S.Pd</p>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  // window.addEventListener("load", window.print());
</script>
</body>
</html>
