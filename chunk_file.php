<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['fileToUpload']['tmp_name'];
    $chunk_size = 1024 * 1024; // 1 MB
    $handle = fopen($file, 'rb');
    $file_size = filesize($file);
    $i = 0;

    while (!feof($handle)) {
        $chunk = fread($handle, $chunk_size);
        file_put_contents('chunk_'.$i, $chunk);
        $i++;
        $percent_complete = ($i * $chunk_size) / $file_size * 100;
        echo '<script>
                document.getElementById("progress").style.width = "'.$percent_complete.'%";
                document.getElementById("status").innerHTML = "'.$percent_complete.'% Complete";
              </script>';
        ob_flush();
        flush();
    }

    fclose($handle);
    echo '<script>
            document.getElementById("status").innerHTML = "Upload Complete";
          </script>';
}

?>
