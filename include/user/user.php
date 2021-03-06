
<div class="row">
    <div class="col-md-12">
        <form action="?page=user/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM User</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                            
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                            </ul>                                        
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">
                            <h2 class="text-uppercase"> User</h2>
                        </label>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Siswa</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_siswa">
                                <?php
                                    require 'include/config.php';
                                    $dml = "SELECT * FROM siswa";
                                    $dfl = $db -> query($dml);
                                    while ($ambil = $dfl -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_siswa = $ambil['id_siswa'];
                                        $nama_lengkap = $ambil['nama_lengkap'];
                                ?>
                                <option value="<?= $id_siswa; ?>">
                                    <?= $nama_lengkap; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="naleng" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Username</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="user"  class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="password" name="pass" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="status">
                              <option value="admin">Admin</option>
                              <option value="guru">Guru</option>
                              <option value="siswa">Siswa</option>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                </div>  
                <div class="panel-footer">
                    <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                </div>                            
            </div>
        </form>            
    </div>
</div>    