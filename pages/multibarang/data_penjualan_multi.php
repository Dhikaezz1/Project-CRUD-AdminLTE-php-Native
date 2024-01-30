<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PENJUALAN MULTI ITEM
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PENJUALAN MULTI ITEM</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <a href="index.php?page=data_multibarang" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
           <a href="pages/report_all_barang.php"  target="_blank" class="btn btn-warning" role="button" title="Tambah Data"><i class="glyphicon glyphicon-print"></i> Print</a>  
        </div>
            <div class="box-body table-responsive">
              <table id="penjualan" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>TANGGAL</th>
                  <th>PEGAWAI</th>
                  <th>TOTAL</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                //$query=mysql_query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
                $query=mysqli_query($connection,"SELECT * FROM jual ORDER BY id DESC")
                or die(mysqli_error($connection));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['tgl'];?></td>
                  <td><?php echo $row['pegawai'];?></td>
                  <td><?php echo $row['total'];?></td>
                  <td>
                    <a href="index.php?page=data_detail" class="btn btn-success" role="button" title="Detail"><i class="glyphicon glyphicon-edit"></i></a>
              <a href="pages/report_barang.php?id=<?=$row['id'];?>" class="btn btn-warning" role="button" title="cetak"><i class="glyphicon glyphicon-print"></i></a>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#mahasiswa').DataTable();
  });
</script>