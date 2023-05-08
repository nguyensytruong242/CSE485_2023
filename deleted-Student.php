<?php
    $id = $_GET['id'];
    $file = 'db_dshs.txt';
    $handle = fopen($file, 'r+');
    if ($handle) {
        $content = array(); // mảng lưu nội dung file
        while (!feof($handle)) {
            $line = fgets($handle);
            if ($line != "$id") { // nếu không phải dòng cần xóa thì lưu vào mảng
                $content[] = $line;
            }
        }
        fclose($handle);
        unset($content[$id]); // xóa phần tử thứ 2 trong mảng (đây là dòng cần xóa)
        $newContent = implode('', $content); // ghép các phần tử còn lại của mảng thành một chuỗi
        file_put_contents($file, $newContent); // ghi lại chuỗi mới vào file
        header("location: admin.php");
    } else {
        echo "Không thể mở file!";
    }
?>
