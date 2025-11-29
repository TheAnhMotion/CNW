<?php require 'data.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hoa (Admin)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Trang quản trị viên</h1>
        <a href="index.php" class="btn-link to-home">&larr; Về trang chủ</a>
    </div>

    <button class="btn-add">+ Thêm hoa mới</button>

    <table>
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Hình ảnh</th>
                <th>Tên loài hoa</th>
                <th>Mô tả ngắn</th>
                <th style="width: 140px;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $key => $flower): ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td>
                    <img src="<?php echo file_exists($flower['image']) ? $flower['image'] : 'https://via.placeholder.com/60'; ?>" class="thumb">
                </td>
                <td><strong><?php echo $flower['name']; ?></strong></td>
                <td><?php echo $flower['Description']; ?></td>
                <td>
                    <button class="btn-edit">Sửa</button>
                    <button class="btn-del">Xóa</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>