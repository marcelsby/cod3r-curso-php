<?php

$errors = [];

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} elseif (isset($exception)) {
    $message =  [
        'type' => MessageType::Error->value,
        'message' => $exception->getMessage()
    ];

    if (get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

if (isset($message)) {
    $alertType = $message['type'];
}

?>

<?php if (isset($message)) : ?>

<div class="my-3 alert alert-<?php echo $alertType ?>"
    role="alert">
    <?php echo $message['message'] ?>
</div>

<?php endif ?>