<?php
        include 'koneksi1.php';
        $upload = "files/".$_FILES['file']['name'];
        move_uploaded_file($_FILES["file"]["tmp_name"], $upload);
        $bin_string = file_get_contents($upload);
        $hex_string = base64_encode($bin_string);
        $mysqli->query("INSERT INTO upload(name) VALUES ('" . $hex_string . "')");
        unlink($upload);
        
?> 