<div class="col-xs-12">
     <?= $this->session->flashdata('message'); ?>
     <div class="box box-primary">
          <div class="box-header">
               <h3 class="box-title">Proses Permohonan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th>id</th>
                              <th>Unit</th>
                              <th>TGL Pemohonan</th>
                              <th>#</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($atk as $at) : ?>
                              <tr>
                                   <td><?= $at['id_atk']; ?></td>
                                   <td><?= $at['username']; ?></td>
                                   <td> <?= date("d F Y", strtotime($at['created_at'])) ?> </td>
                                   <td>

                                        <?php if ($user['role_id'] == '1') { ?>
                                             <?php if ($at['sts'] < '2') { ?>
                                                  <a href="<?= base_url('permohonan_atk/hapus/'); ?><?= $at['id_atk']; ?>" class="btn btn-danger" title="Batal" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-times"></i> </a>
                                                  <a href="<?= base_url('permohonan_atk/edit/'); ?><?= $at['id_atk']; ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i> </a>
                                             <?php } ?>
                                        <?php } ?>

                                        <?php if ($user['role_id'] == '2') { ?>
                                             <?php if ($at['sts'] <= 3) { ?>
                                                  <a href="<?= base_url('validator/permohonan_atk/prosesDetail/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
                                             <?php } ?>
                                        <?php } ?>

                                        <?php if ($user['role_id'] == '3') { ?>
                                             <?php if ($at['sts'] == '2') { ?>
                                                  <a href="<?= base_url('pimpinan/permohonan_atk/setuju/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Setuju"><i class="fa fa-check"></i> </a>
                                                  <button type="button" class="btn btn-danger" title="Tolak" data-toggle="modal" data-target="#tolakPimpinan"><i class="fa fa-times"></i> </button>
                                             <?php } ?>
                                        <?php } ?>


                                        <?php if ($user['role_id'] == '4') { ?>
                                             <?php if ($at['sts'] == '3') { ?>
                                                  <a href="<?= base_url('lkk/permohonan_atk/prosesDetail/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
                                             <?php } ?>
                                        <?php } ?>


                                   </td>
                              </tr>
                         <?php endforeach; ?>
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

<!-- Modal -->
<div class="modal fade" id="tolak" role="dialog">
     <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Berikan Tanggapan Penolakan.</h4>
               </div>
               <div class="modal-body">
                    <form method="post" action="<?= base_url('validator/permohonan_atk/tolakGo/'); ?>">
                         <div class="form-group">
                              <label for="usr">ID Permohonan:</label>
                              <input type="text" class="form-control" id="id_atk" name="id_atk" value="<?= $at['id_atk']; ?>" readonly required>
                         </div>
                         <div class=" form-group">
                              <label for="usr">Keterangan:</label>
                              <textarea type="text" class="form-control" rows="5" id="komentar" name="komentar" required></textarea>
                         </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> send</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
               </div>
               </form>
          </div>

     </div>
</div>


<!-- Modal Pimpinan Tolak -->
<div class="modal fade" id="tolakPimpinan" role="dialog">
     <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Berikan Tanggapan Penolakan.</h4>
               </div>
               <div class="modal-body">
                    <form method="post" action="<?= base_url('pimpinan/permohonan_atk/tolakGo/'); ?>">
                         <div class="form-group">
                              <label for="usr">ID Permohonan:</label>
                              <input type="text" class="form-control" id="id_atk" name="id_atk" value="<?= $at['id_atk']; ?>" readonly required>
                         </div>
                         <div class=" form-group">
                              <label for="usr">Keterangan:</label>
                              <textarea type="text" class="form-control" rows="5" id="komentar" name="komentar" required></textarea>
                         </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> send</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
               </div>
               </form>
          </div>

     </div>
</div>