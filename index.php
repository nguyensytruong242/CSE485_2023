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
    <header>
        <div class="container">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">QLHS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form action="read-Student.php" class="d-flex" role="search" method="post">
                    <input id="txtSearch" name="txtSearch" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </nav>
        </div>
    </header>
    <main>
    <div class="container">
        <h3 class="text-center text-primary mt-5 mb-5">MANAGE STUDENT LIST</h3>
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
                <!-- Vùng này là dữ liệu cần lặp lại hiển thị từ CSDL -->
                <!--  -->
                <?php
                    include 'student.php';
                    include 'studentDAO.php';
                    $dao = new StudentDAO();
                    $file = fopen("db_dshs.txt", "r");
                    // $students = $dao->getAll();
                    if($file){
                        $header = fgets($file);
                        while (($line = fgets($file)) !== false) {
                            // Tách dữ liệu từng sinh viên và tạo đối tượng Student
                            $data = explode(',', $line);
                            $id = trim($data[0]);
                            $name = trim($data[1]);
                            $age = trim($data[2]);
                            $grade = trim($data[3]);
                            $student = new Student($id, $name, $age,$grade);

                            // Thêm sinh viên vào danh sách
                            $dao->create($student);
                        }
                        fclose($file);

                        // Hiển thị danh sách sinh viên ra bảng
                        $students = $dao->getAll();
                        // echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Grade</th></tr>";
                        foreach ($students as $student) {
                            echo "<tr>";
                            echo "<td>".$student->id."</td>";
                            echo "<td>".$student->name."</td>";
                            echo "<td>".$student->age."</td>";
                            echo "<td>".$student->grade."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "Không thể mở file";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>