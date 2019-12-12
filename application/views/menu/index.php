  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= $title; ?></a></li>
        <li class="active"><?= $bc; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Menu</h3><br>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
              <?= validation_errors('<span class="text-danger">', '</span><br>') ?>
              <!--  -->
              <!-- <a href="<?= base_url("Menu/newmenu") ?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Menu Baru</a> -->
              <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-form">
                <i class="fa fa-plus"></i> Tambah Menu Baru
              </button> -->
              <button class="btn btn-primary" onclick="addmenu()">
                <i class="fa fa-plus"></i> Tambah Menu Baru
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col" width="30">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col" width="200">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                    <tr>
                      <th scope="col"><?= $i ?></th>
                      <td><?= $m['title'] ?></td>
                      <td>
                        <a style="cursor:pointer;" class="btn btn-warning btn-sm" onclick="select_data(
                          '<?=$m['id_user_submenu']?>',
                          '<?=$m['user_menu_id']?>',
                          '<?=$m['title']?>',
                          '<?=$m['url']?>',
                          '<?=$m['icon']?>',
                          '<?=$m['is_activated']?>'
                          )"
                          >Edit</a>
                        <a href="<?= base_url()?>Menu/menudelete/<?=$m['id_user_submenu']?>" class="btn btn-danger btn-sm tombol-hapus"  
                            onclick="return confirm('Anda yakin mau menghapus ?')" 
                        >Hapus</a>
                      </td>
                    </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <!-- Modal ADD -->
        <div class="modal fade" id="modal-form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Menu</h4>
              </div>
              <!-- <form action="<?= base_url('Menu') ?>" method="POST"> -->
              <form action="#" id="form">
                <div class="modal-body">
                  <input type="hidden" value="" name="menuid" id="menuid">
                  <div class="form-group">
                    <label for="menu">Nama Menu</label>
                    <input type="text" class="form-control" id="nmmenu" name="nmmenu" placeholder="Masukkan Nama Menu">
                    <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                    <label for="Bagian">Bagian</label>
                    <select class="form-control select2" style="width: 100%;" name="bagian" id="bagian">
                      <option value="">-- Silahkan Pilih Bagian Menu --</option>
                      <?php foreach ($bagian as $bg) : ?>
                        <option value="<?= $bg['id_user_menu'] ?>"><?= $bg['menu'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan Url jika ada">
                  </div>
                  <div class="form-group">
                    <label for="ikon">Kode Ikon</label>
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan kode ikon">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                  <button type="submit" onclick="save()" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <script type="text/javascript">
          var save_method;
          var table;
          // show modal form
          function addmenu() {
            save_method = 'add';
            $('#form')[0].reset();
            $('#modal-form').modal('show');
            $('.modal-title').text('Tambah data menu');
            $('.modal-footer button[type=submit]').html('Tambah Data');
          }

          function save() {
            var url;
            var serializeData = $('#form').serialize();
            if (save_method == 'add') {
              url = '<?= base_url("Menu/menuadd") ?>';
            } else {
              url = '<?= base_url("Menu/menuedit") ?>';
            }
            $.ajax({
              url: url,
              type: "POST",
              data: serializeData,
              dataType: "JSON",
              success: function(data) {
                $('#modal-form').modal('hide');
                location.reload();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                alert('error adding / Update data');
              }
            });
          }

          function select_data($id_user_submenu,$user_menu_id,$title,$url,$icon,$is_activated) {
            save_method = 'edit';
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit data menu');
            $('.modal-footer button[type=submit]').html('Edit Data');

            $('#menuid').val($id_user_submenu);
            $('#nmmenu').val($title);
            $('#bagian').val($user_menu_id);
            $('#url').val($url);
            $('#icon').val($icon);
          }
          function delete_data($id_user_submenu){
            url = '<?= base_url("Menu/menudelete") ?>';
          }
        </script>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->