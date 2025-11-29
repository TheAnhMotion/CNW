<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các loài hoa tuyệt đẹp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
    </div>

    <div class="flower-grid">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-item">
                <div class="info">
                    <h3><?php echo $flower['name']; ?></h3>
                    <p><?php echo $flower['Description']; ?></p>
                </div>
                <img src="<?php echo file_exists($flower['image']) ? $flower['image'] : 'https://via.placeholder.com/300'; ?>" alt="<?php echo $flower['name']; ?>">
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>