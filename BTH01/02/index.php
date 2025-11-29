<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trắc nghiệm Android</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Kiểm Tra Kiến Thức</h1>

    <?php

    $questions = [];
    $lines = file('Quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $curr = [];

    foreach ($lines as $line) {
        if (empty($line)) continue;

        if (strpos($line, 'ANSWER:') === 0) {
            $curr['ans'] = array_map('trim', explode(',', substr($line, 7))); 
            $questions[] = $curr;
            $curr = []; 
        } elseif (preg_match('/^([A-D])\./', $line, $m)) {
            $curr['opts'][$m[1]] = substr($line, 2);
        } else {
            $curr['txt'] = ($curr['txt'] ?? '') . ' ' . $line; 
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $score = 0;
        foreach ($questions as $i => $q) {
            $userAns = $_POST["q$i"] ?? []; 
            if (!is_array($userAns)) $userAns = [$userAns];
            
            sort($userAns); sort($q['ans']);
            if ($userAns == $q['ans']) $score++;
        }
        echo "<div class='result-box'>Kết quả: <strong>$score / " . count($questions) . "</strong> câu đúng!</div>";
    }
    ?>

    <form method="POST">
        <?php foreach ($questions as $i => $q): ?>
            <?php $isMulti = count($q['ans']) > 1; ?>
            <div class="question-block">
                <div class="question-title">
                    Câu <?= $i + 1 ?>: <?= htmlspecialchars($q['txt']) ?>
                    <?= $isMulti ? '<span class="badge">Chọn nhiều</span>' : '' ?>
                </div>
                <div class="options">
                    <?php foreach ($q['opts'] as $key => $val): ?>
                        <label>
                            <input type="<?= $isMulti ? 'checkbox' : 'radio' ?>" 
                                   name="q<?= $i ?><?= $isMulti ? '[]' : '' ?>" 
                                   value="<?= $key ?>">
                            <b><?= $key ?>.</b> <?= htmlspecialchars($val) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="submit-btn">NỘP BÀI</button>
    </form>
</div>
</body>
</html>