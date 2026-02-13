<?php

declare(strict_types=1);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start / Restart quiz
    $_SESSION['quiz_current'] = 0;
    $_SESSION['quiz_score'] = 0;
    $_SESSION['quiz_answers'] = [];

    header('Location: quiz.php');
    exit;
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP Quiz App</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="brand">
                <div class="brand__badge">PHP</div>
                <div>
                    <h1 class="title">Smart Quiz</h1>
                    <p class="subtitle">Core PHP • Sessions • Forms • Instant Results • Clean UI</p>
                </div>
            </div>

            <div class="panel">
                <h2 class="panel__title">Ready to begin?</h2>
                <p class="panel__text">
                    Answer 30 carefully curated multiple-choice questions. One question appears at a time,
                    with a smooth, distraction-free flow.
                </p>

                <form method="post" action="index.php" class="actions">
                    <button type="submit" class="btn btn--primary">Start Quiz</button>
                </form>

                <div class="muted">
                    
                </div>
            </div>
        </div>
        <div class="footer">Built with Core PHP + HTML5 + CSS3</div>
        <div class="footer">Created By - KRUSHNADEVSINH (Full-Stack Developer)</div>
        <div class="footer">© Copyright 2026 . All Rights Reserved.</div>
    </div>
</body>
</html>
