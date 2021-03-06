<?php
    require_once 'include/config.php';

    if ($_POST) {
        $aksi = $_POST['aksi'];
        $id = $_POST['id'];
        $nama_kelas = $_POST['nama_kelas'];
        $nama_guru = $_POST['nama_guru'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $hari = $_POST['hari'];
   
        $nekel = $_POST['nekel'];
        $jam_mulai = $_POST['jam_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];

        if ($aksi=="edit") {
            if ($nama_kelas!="") {

                $sql = "UPDATE jadwal SET hari=:hari,
                                          jam_mulai =:jam_mulai,
                                          tgl_selesai=:tgl_selesai
                                          WHERE id_jadwal=:id_jadwal ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':hari', $hari);
                $query -> bindParam(':jam_mulai', $jam_mulai);
                $query -> bindParam(':tgl_selesai', $tgl_selesai);
                $query -> bindParam(':id_jadwal', $id);
                $query -> execute();

                echo"
                    <script>
                        alert('Update Success');
                        window.location.href='?page=jadwal/tampil_jadwal.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=jadwal/jadwal.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nama_kelas!="") {

                $sql = "INSERT INTO jadwal(id_kelas, id_guru, id_kelas_siswa , tgl_mulai, hari, jam_mulai, tgl_selesai) 
                        VALUES(:id_kelas, :id_guru ,:id_kelas_siswa , :tgl_mulai, :hari, :jam_mulai, :tgl_selesai)";
                $query = $db -> prepare($sql);
                $query -> execute(array(
                    ':id_kelas' => $nama_kelas,
                    ':id_guru' => $nama_guru,
                    
                    ':id_kelas_siswa' => $nakel,
                    ':tgl_mulai' => $tgl_mulai,
                    ':hari' => $hari,
                    ':jam_mulai' => $jam_mulai,
                    ':tgl_selesai' => $tgl_selesai
                ));

                echo"
                    <script>
                        alert('Insert Success');
                        window.location.href='?page=jadwal/tampil_jadwal.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=jadwal/jadwal.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM jadwal WHERE id_jadwal=:id_jadwal ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_jadwal' => $del));

        echo"
            <script>
                alert('Delete Success');
                window.location.href='?page=jadwal/tampil_jadwal.php'
            </script>
        ";
    }

?>