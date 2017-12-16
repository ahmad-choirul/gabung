<?php

    include '../config.php';
    $kdbarang = $_GET['judul'];
    $barang = mysqli_query($db_link n  ,"select * from tugas where judul='$kdbarang'");
    
    while($row=mysqli_fetch_array($barang)){
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="proses_edit.php" name="modal-popup" enctype="multipart/form-data" method="POST" id="form-edit">
                <div class="form-group">
                                <label class="col-lg-3 control-label">judul</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="kdbarang" value="<?php echo $row['judul']; ?>" readonly/>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">isi</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="nama" value="<?php echo $row['isi']; ?>"/>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">deadline</label>
                                    <div class="col-lg-5">
                                        <input style="width: 210px;"  class="form-control" type="text" name="jumlah" value="<?php echo $row['tanggal']; ?>"/>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Edit</button>
                                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Keluar</button>
                            </div>
            </form>
            <?php
    }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
                $('#form-edit')
                    .bootstrapValidator({
                        message: 'This value is not valid',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            nama: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'Nama Barang tidak boleh kosong'
                                    },
                                    stringLength: {
                                        min: 5,
                                        max: 30,
                                        message: 'Panjang minimal 5 karakter dan panjang maksismu 30 karakter'
                                    }
                                }
                            }, 
                            jumlah: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'Jumlah Barang tidak boleh kosong'
                                    },
                                    digits: {
                                        message: 'anda harus memasukkan angka'
                                    }
                                }
                            }
                        }
                    });
                });
</script>