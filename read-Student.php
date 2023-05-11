<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <main>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">AGE</th>
                <th scope="col">GRADE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                    include 'studentDAO.php';
                    include 'student.php';
                    $dao = new StudentDAO();
                    $id = $_POST['txtSearch'];
                    $file = fopen('db_dshs.txt', 'r');
                    while (!feof($file)) { 
                        $line = fgets($file); 
                        if ($line != "") { $data = explode(',', $line); 
                        $student = new Student(trim($data[0]), trim($data[1]), trim($data[2]), trim($data[3])); 
                        $dao->create($student); 
                        } 
                    } 
                    fclose($file); 
                    $student = $dao->read($id); 
                    // lấy thông tin sinh viên có ID là 123 
                    if ($student != null) { 
                        echo '<td>' . $student->id . '</td>';
                        echo '<td>' . $student->name . '</td>';
                        echo '<td>' . $student->age . '</td>';
                        echo '<td>' . $student->grade . '</td>';
                ?> 
                <?php 
                    } else { 
                        echo "Không tìm thấy sinh viên!"; 
                    } 
                ?>
                </tr>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>