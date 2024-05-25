<?php
include "templates/header-report-iko.php";
include "templates/sidebar-report-iko.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Tahunan IKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Report</a></li>
              <li class="breadcrumb-item active">Report Tahunan IKO</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-book mr-3"></i>Data Pelaporan IKO</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="table-report" width="100%">
              <thead align="center">
                <th>No.</th>
                <th>Tanggal Kegiatan</th>
                <th>Lokasi</th>
                <th>Tim</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Catatan</th>
              </thead>
              <tbody align="center">
                <?php
                $year1 = $_POST['year1'];
                $year2 = $_POST['year2'];
                $data = query("SELECT * FROM pelaporaniko WHERE YEAR(tgl_kegiatan) BETWEEN '$year1' AND '$year2' ORDER BY tgl_kegiatan DESC");
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['id']; ?></td>
                  <td><?= $d['tgl_kegiatan']; ?></td>
                  <td><?= $d['lokasi']; ?></td>
                  <td><?= $d['t_lapor']; ?></td>
                  <td><?= $d['ket']; ?></td>
                  <td><?= $d['foto']; ?></td>
                  <td><?= $d['status']; ?></td>
                  <td><?= $d['ket_petugas']; ?></td>
                </tr>
                <?php
                endforeach;
                ?>
              </tbody>
              <tfoot align="center">
                <th>No.</th>
                <th>Tanggal Kegiatan</th>
                <th>Lokasi</th>
                <th>Tim</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Catatan</th>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "templates/footer.php";
?>