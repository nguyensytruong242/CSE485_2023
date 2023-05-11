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
                <a class="navbar-brand" href="admin.php">QLHS</a>
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </nav>
        </div>
    </header>
    <main>
    <div class="container">
        <?php
            $lines = file('db_dshs.txt');

            // Đếm số phần tử trong mảng (tức là số dòng trong tệp)
            $num_lines = count($lines);
            include 'studentDAO.php';
            include 'student.php';
            $dao = new StudentDAO();
            $dao = new StudentDAO();
            $id = $_GET['id'];
                    $file = fopen("db_dshs.txt", "r");
                    $students = $dao->getAll();
                    if ($file) {
                        $header = fgets($file);
                        // echo '<table>';
                        // echo '<tr><th>ID</th><th>NAME</th><th>AGE</th><th>GRADE</th><th>EIDT</th><th>DELETE</th></tr>';
                        while (($line = fgets($file)) !== false) {
                            $data = explode(',', $line);
                            $id = trim($data[0]);
                            $name = trim($data[1]);
                            $age = trim($data[2]);
                            $grade = trim($data[3]);
                            $student = new Student($id, $name, $age,$grade);

                            // Thêm sinh viên vào danh sách
                            $dao->create($student);
                        }
                    }
            $student = $dao->read($id);
            if($student){
                $id = $student -> id;
                $name = $student-> name;
                $age = $student -> age;
                $grade = $student -> grade;
            }
   
        ?>
        <h5 class="text-center text-primary mt-5 mb-5">CẬP NHẬT DANH BẠ SINH VIÊN</h5>
            <form action="process-updateStudent.php" method="post">
            <div class="mb-3">
                    <label for="txtId" class="form-label">ID</label>
                    <input type="text" readonly class="form-control" id="txtId" name="txtId" placeholder= "" value="<?php echo $id ?>">
                </div>
                <div class="mb-3">
                    <label for="txtName" class="form-label">NAME</label>
                    <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nhập tên" value="<?php echo $name ?>">
                </div>
                <div class="mb-3">
                    <label for="txtAge" class="form-label">AGE</label>
                    <input type="number" class="form-control" id="txtAge" name="txtAge" placeholder="Nhập tuổi" value="<?php echo $age ?>" >
                </div>
                <div class="mb-3">
                    <label for="txtGrade" class="form-label">GRADE</label>
                    <input type="number" class="form-control" id="txtGrade" name="txtGrade" placeholder="Nhập khối" value="<?php echo $grade ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
    </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>