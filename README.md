# PHP Quiz Web Application (Core PHP)

A clean, session-based quiz web application built with **Core PHP + HTML5 + CSS3**.

## Folder Structure

```
quiz/
  data.php
  index.php
  quiz.php
  result.php
  style.css
  README.md
```

## How to Run in XAMPP (Windows)

1. **Install XAMPP** (if not already installed).
2. Copy the project folder into XAMPP:

   - Place this folder as:
     `C:\xampp\htdocs\quiz\`

3. Open **XAMPP Control Panel**.
4. Click **Start** next to **Apache**.
5. Open your browser and go to:

   - `http://localhost/quiz/`

6. Click **Start Quiz**.

## Application Flow

- `index.php`
  - Start page.
  - Initializes session values on POST and redirects to `quiz.php`.

- `quiz.php`
  - Shows **one question at a time**.
  - Uses **POST form submission**.
  - Requires an option selection (HTML `required` + server-side validation).
  - Updates session state (`current question`, `score`, `answers`).
  - Redirects using `header('Location: ...')` after each POST (PRG pattern).

- `result.php`
  - Displays total score, percentage, and performance message.
  - Restart button resets session state and redirects back to `quiz.php`.

- `data.php`
  - Stores **30 multiple-choice questions** in a PHP array.

## Explanation (PHP Fundamentals)

### Arrays

- The question bank is stored in `data.php` as a PHP array:
  - Each question is an array with:
    - `question` (string)
    - `options` (associative array with keys `A`, `B`, `C`, `D`)
    - `answer` (correct letter)

### Loops (foreach)

- Options are printed using a `foreach` loop in `quiz.php`:
  - This cleanly renders all options without repeating markup.

### Conditions (if / else)

- Used to:
  - Validate request method (`POST` vs `GET`)
  - Ensure session variables exist (`isset()` checks)
  - Validate submitted answer is one of `A/B/C/D`
  - Decide whether to go to next question or show results
  - Show performance message based on percentage

### Sessions

- Sessions manage quiz state across multiple pages/requests:
  - `$_SESSION['quiz_current']` tracks the current question index
  - `$_SESSION['quiz_score']` tracks the user score
  - `$_SESSION['quiz_answers']` stores selected answers by question index

### Scoring System

- When a user submits an answer in `quiz.php`:
  - The submitted letter is compared to the correct letter.
  - If it matches, score increments by 1.
  - The app then redirects (PRG) to avoid double-submission on refresh.

## Notes

- No database required.
- No external libraries.
- Designed to run without PHP warnings by using `isset()` and safe defaults.

## 🌐 Live Demo

This project is deployed on a PHP-supported hosting platform.

🔗 Live Website:
http://krushnadevsinh999.infinityfreeapp.com/

Note: GitHub Pages does not support PHP, so the live demo is hosted externally.

## 👥 Group Member
- KRUSHNADEVSINH G. VALA
- 240905090058
- B.TECH(I.T)-4th SEM
- CLASS-Z, BATCH-Z22/Z3
