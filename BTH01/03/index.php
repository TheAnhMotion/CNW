<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp 65HTTT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Danh sách điểm danh lớp 65HTTT</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ đệm</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $filename = "65HTTT_Danh_sach_diem_danh.csv";

                    $file = fopen($filename, "r");

                    fgetcsv($file);

                    while (($row = fgetcsv($file)) !== false) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row[0]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[1]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[2]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[3]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[4]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[5]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row[6]) . "</td>"; 
                        echo "</tr>";
                    }
                    fclose($file);
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>