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
        <h6>DAFTAR HADIR {{ strtoupper($data_absence->kategori) }}</h6>
        <h6>CABOR BRIDGE TAHUN {{ $year }}</h6>
      </div>
    </div>
    <div class="row justify-content-start mt-2">
      <div class="col-2">Tanggal</div><div class="col-8">: {{ $tanggal_paraf }}</div>
    </div>
    <div class="row justify-content-start">
      <div class="col-2">Tempat</div><div class="col-8">: {{ $data_absence->tempat }}</div>
    </div>
    <div class="row justify-content-start">
      <div class="col-2">Acara</div><div class="col-8">: {{ $data_absence->kegiatan }}</div>
    </div>

    <!-- Table row -->
    <div class="row mt-3">
      <div class="col-12 table-responsive">
        <table class="table table-bordered table-absensi">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Kehadiran</th>
              <th scope="col">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach ($attendances as $atd)
            <tr>
              <th scope="row" class="text-center">{{ $no++ }}</th>
              <td>{{ $atd->nama_atlet }}</td>
              <td>{{ $atd->kehadiran }}</td>
              <td>
                @if($atd->keterangan == null)
                -
                @else
                {{ $atd->keterangan }}
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex pagination mb-1 justify-content-center">
        </div>
      </div>
    </div>

    <div class="row justify-content-end mt-2">
      <div class="col-4 text-center">
        <p class="mb-0">Kulon Progo, {{ $tanggal_paraf }}</p>
        <p>Manajer</p>
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
  window.addEventListener("load", window.print());
</script>
</body>
</html>
