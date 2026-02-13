<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/data.php';

$totalQuestions = isset($QUESTIONS) && is_array($QUESTIONS) ? count($QUESTIONS) : 0;

if ($totalQuestions === 0) {
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['quiz_current'], $_SESSION['quiz_score'], $_SESSION['quiz_answers'])) {
    header('Location: index.php');
    exit;
}

$currentIndex = (int) $_SESSION['quiz_current'];
$answers = is_array($_SESSION['quiz_answers']) ? $_SESSION['quiz_answers'] : [];

// Compute score from stored answers to avoid double-scoring and to allow back navigation.
$score = 0;
foreach ($answers as $idx => $letter) {
    if (isset($QUESTIONS[$idx]['answer']) && (string) $QUESTIONS[$idx]['answer'] === (string) $letter) {
        $score++;
    }
}
$_SESSION['quiz_score'] = $score;

// Handle submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? (string) $_POST['action'] : 'next';

    if ($action === 'reset') {
        $_SESSION['quiz_current'] = 0;
        $_SESSION['quiz_score'] = 0;
        $_SESSION['quiz_answers'] = [];
        header('Location: index.php');
        exit;
    }

    if ($action === 'back') {
        $currentIndex = max(0, $currentIndex - 1);
        $_SESSION['quiz_current'] = $currentIndex;
        header('Location: quiz.php');
        exit;
    }

    $selected = isset($_POST['answer']) ? (string) $_POST['answer'] : '';

    $validLetters = ['A', 'B', 'C', 'D'];
    if (!in_array($selected, $validLetters, true)) {
        // Invalid submission; reload safely.
        header('Location: quiz.php');
        exit;
    }

    if (!isset($QUESTIONS[$currentIndex])) {
        header('Location: result.php');
        exit;
    }

    // Store answer
    $answers[$currentIndex] = $selected;
    $_SESSION['quiz_answers'] = $answers;

    // Next question
    $currentIndex++;
    $_SESSION['quiz_current'] = $currentIndex;

    if ($currentIndex >= $totalQuestions) {
        header('Location: result.php');
        exit;
    }

    header('Location: quiz.php');
    exit;
}

// Guard against invalid index
if ($currentIndex < 0) {
    $_SESSION['quiz_current'] = 0;
    header('Location: quiz.php');
    exit;
}

if ($currentIndex >= $totalQuestions) {
    header('Location: result.php');
    exit;
}

$question = $QUESTIONS[$currentIndex];
$questionText = isset($question['question']) ? (string) $question['question'] : '';
$options = isset($question['options']) && is_array($question['options']) ? $question['options'] : [];

$selectedForThis = isset($answers[$currentIndex]) ? (string) $answers[$currentIndex] : '';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quiz • PHP Quiz App</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="topbar">
                <div>
                    <div class="kicker">Progress</div>
                    <div class="progress">Question <?php echo (int) ($currentIndex + 1); ?> of <?php echo (int) $totalQuestions; ?></div>
                </div>
                <div class="pill">Score: <?php echo (int) $score; ?></div>
            </div>

            <div class="meter" aria-hidden="true">
                <div class="meter__bar" style="width: <?php echo (int) round((($currentIndex + 1) / $totalQuestions) * 100); ?>%"></div>
            </div>

            <div class="question">
                <h1 class="question__title"><?php echo e($questionText); ?></h1>
            </div>

            <form method="post" action="quiz.php" class="form">
                <div class="options">
                    <?php foreach ($options as $letter => $text): ?>
                        <label class="option">
                            <input type="radio" name="answer" value="<?php echo e((string) $letter); ?>" <?php echo ($selectedForThis === (string) $letter) ? 'checked' : ''; ?> required />
                            <span class="option__letter"><?php echo e((string) $letter); ?></span>
                            <span class="option__text"><?php echo e((string) $text); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="actions">
                    <?php if ($currentIndex > 0): ?>
                        <button type="submit" name="action" value="back" class="btn btn--ghost">Back</button>
                    <?php endif; ?>
                    <button type="submit" class="btn btn--primary">
                        <?php echo ($currentIndex + 1 === $totalQuestions) ? 'Finish Quiz' : 'Next Question'; ?>
                    </button>
                    <button type="submit" name="action" value="reset" class="btn btn--danger" formnovalidate>Restart</button>
                </div>

                <div class="muted">
                    Your selection is required before moving forward.
                </div>
            </form>
        </div>
        <div class="footer">Core PHP Quiz • Session-driven • No database</div>
        <div class="footer">© Copyright 2026 . All Rights Reserved.By - KRUSHNADEVSINH</div>
    </div>
</body>
</html>
