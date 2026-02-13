<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/data.php';

$totalQuestions = isset($QUESTIONS) && is_array($QUESTIONS) ? count($QUESTIONS) : 0;

if ($totalQuestions === 0) {
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['quiz_score'], $_SESSION['quiz_answers'])) {
    header('Location: index.php');
    exit;
}

$answers = is_array($_SESSION['quiz_answers']) ? $_SESSION['quiz_answers'] : [];

// Recompute score from answers to ensure consistent results.
$score = 0;
foreach ($answers as $idx => $letter) {
    if (isset($QUESTIONS[$idx]['answer']) && (string) $QUESTIONS[$idx]['answer'] === (string) $letter) {
        $score++;
    }
}
$_SESSION['quiz_score'] = $score;
$percentage = $totalQuestions > 0 ? (int) round(($score / $totalQuestions) * 100) : 0;

if ($percentage >= 90) {
    $label = 'Legendary';
    $message = 'Excellent accuracy and consistency. You clearly know your fundamentals.';
    $toneClass = 'tone--legendary';
} elseif ($percentage >= 70) {
    $label = 'Good';
    $message = 'Great work. You are close—review the missed topics and try again.';
    $toneClass = 'tone--good';
} else {
    $label = 'Needs Improvement';
    $message = 'Keep practicing. Focus on fundamentals and retake the quiz to improve.';
    $toneClass = 'tone--needs';
}

$stars = 1;
if ($percentage >= 90) {
    $stars = 5;
} elseif ($percentage >= 80) {
    $stars = 4;
} elseif ($percentage >= 70) {
    $stars = 3;
} elseif ($percentage >= 50) {
    $stars = 2;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Restart
    $_SESSION['quiz_current'] = 0;
    $_SESSION['quiz_score'] = 0;
    $_SESSION['quiz_answers'] = [];

    header('Location: quiz.php');
    exit;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function optionText(array $question, string $letter): string
{
    if (!isset($question['options']) || !is_array($question['options'])) {
        return '';
    }
    return isset($question['options'][$letter]) ? (string) $question['options'][$letter] : '';
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Results • PHP Quiz App</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="brand">
                <div class="brand__badge">RESULT</div>
                <div>
                    <h1 class="title">Your Score</h1>
                    <p class="subtitle">Summary of your quiz performance</p>
                </div>
            </div>

            <div class="scoreboard <?php echo e($toneClass); ?>">
                <div class="scoreboard__left">
                    <div class="scoreboard__score"><?php echo (int) $score; ?> / <?php echo (int) $totalQuestions; ?></div>
                    <div class="scoreboard__percent"><?php echo (int) $percentage; ?>%</div>
                    <div class="rating" aria-label="Rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star <?php echo ($i <= $stars) ? 'star--on' : 'star--off'; ?>">★</span>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="scoreboard__right">
                    <div class="scoreboard__label"><?php echo e($label); ?></div>
                    <div class="scoreboard__msg"><?php echo e($message); ?></div>
                </div>
            </div>

            <div class="panel">
                <h2 class="panel__title">Review</h2>
                <p class="panel__text">Open the detailed review only if you want to inspect every question.</p>

                <?php
                    $answeredCount = 0;
                    foreach ($answers as $letter) {
                        if ((string) $letter !== '') {
                            $answeredCount++;
                        }
                    }
                    $wrongCount = max(0, $answeredCount - $score);
                ?>

                <div class="review__summary">
                    <div class="mini">
                        <div class="mini__k">Answered</div>
                        <div class="mini__v"><?php echo (int) $answeredCount; ?></div>
                    </div>
                    <div class="mini">
                        <div class="mini__k">Correct</div>
                        <div class="mini__v"><?php echo (int) $score; ?></div>
                    </div>
                    <div class="mini">
                        <div class="mini__k">Incorrect</div>
                        <div class="mini__v"><?php echo (int) $wrongCount; ?></div>
                    </div>
                </div>

                <details class="review__details">
                    <summary class="review__toggle">Show detailed review</summary>
                    <div class="review">
                        <?php foreach ($QUESTIONS as $idx => $q): ?>
                            <?php
                                $qText = isset($q['question']) ? (string) $q['question'] : '';
                                $correct = isset($q['answer']) ? (string) $q['answer'] : '';
                                $user = isset($answers[$idx]) ? (string) $answers[$idx] : '';
                                $isCorrect = ($user !== '' && $user === $correct);
                                $userText = $user !== '' ? optionText($q, $user) : '';
                                $correctText = $correct !== '' ? optionText($q, $correct) : '';
                            ?>
                            <div class="review__item <?php echo $isCorrect ? 'review__item--ok' : 'review__item--bad'; ?>">
                                <div class="review__q">
                                    <div class="review__num">#<?php echo (int) ($idx + 1); ?></div>
                                    <div class="review__text"><?php echo e($qText); ?></div>
                                </div>
                                <div class="review__a">
                                    <div class="review__row">
                                        <div class="review__label">Your answer</div>
                                        <div class="review__value">
                                            <?php if ($user === ''): ?>
                                                <span class="tag tag--neutral">Not answered</span>
                                            <?php else: ?>
                                                <span class="tag <?php echo $isCorrect ? 'tag--good' : 'tag--bad'; ?>"><?php echo e($user); ?></span>
                                                <span class="review__detail"><?php echo e($userText); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="review__row">
                                        <div class="review__label">Correct answer</div>
                                        <div class="review__value">
                                            <span class="tag tag--good"><?php echo e($correct); ?></span>
                                            <span class="review__detail"><?php echo e($correctText); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </details>
            </div>

            <div class="panel">
                <h2 class="panel__title">What next?</h2>
                <p class="panel__text">You can restart the quiz and try to beat your score.</p>

                <form method="post" action="result.php" class="actions">
                    <button type="submit" class="btn btn--primary">Restart Quiz</button>
                    <a class="btn btn--ghost" href="index.php">Back to Start</a>
                </form>
            </div>
        </div>
        <div class="footer">Tip: Refreshing results won’t change your score (session-based).</div>
        <div class="footer">© Copyright 2026 . All Rights Reserved.By - KRUSHNADEVSINH</div>
    </div>
</body>
</html>
