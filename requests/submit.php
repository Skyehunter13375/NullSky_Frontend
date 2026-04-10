<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

if (!empty($_POST['block'])) { exit; }

// Basic validation
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$summary = trim($_POST['summary'] ?? '');
$notes   = trim($_POST['notes']   ?? '');
$private = isset($_POST['private']);

if (!$name || !$email || !$summary) {
    die("All required fields must be filled.");
}

try {
    $pdo->beginTransaction();

    // Insert into req_detail
    $stmt = $pdo->prepare("INSERT INTO req_detail (name, email, summary, private) VALUES (:name, :email, :summary, :private) RETURNING id");
    $stmt->bindValue(':name',    $name);
    $stmt->bindValue(':email',   $email);
    $stmt->bindValue(':summary', $summary);
    $stmt->bindValue(':private', $private, PDO::PARAM_BOOL);
    $stmt->execute();

    $ticketId = $stmt->fetchColumn();

if (!empty($notes)) {
    $stmt2 = $pdo->prepare("INSERT INTO req_notes (id, idx, notes) VALUES (:id, COALESCE((SELECT MAX(idx) + 1 FROM req_notes WHERE id = :id), 1), :notes)");
    $stmt2->bindValue(':id',    $ticketId, PDO::PARAM_INT);
    $stmt2->bindValue(':notes', $notes);
    $stmt2->execute();
}
    $pdo->commit();

    header("Location: success.php?id=" . $ticketId);
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    die("Error submitting ticket: " . $e->getMessage());
}