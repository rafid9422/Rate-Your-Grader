<?php
session_start();

// Reviewer module does not own a review form. If a Student reaches this URL
// through an old/broken link, send them to the Student review controller.
$role = isset($_SESSION['role']) ? strtolower(trim($_SESSION['role'])) : '';

if (!isset($_SESSION['s_id'])) {
    header("Location: ../../../Common/MVC/php/Login.php");
    exit();
}

if ($role === 'reviewer') {
    header("Location: ReviewerDashboard.php");
    exit();
}

if ($role === 'student' || $role === '') {
    $query = $_SERVER['QUERY_STRING'] ?? '';
    header("Location: ../../../Student/MVC/php/ProfessorReview.php" . ($query !== '' ? '?' . $query : ''));
    exit();
}

header("Location: ../../../Common/MVC/php/HomePage.php");
exit();
?>
