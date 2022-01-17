<?php

$errors = [];

if ($exception) {
    $message =  [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if (get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

if (isset($message)) {
    $alertType = $message['type'] === 'error' ? 'danger' : 'success';
}

?>

<?php if (isset($message)) : ?>

<div class="my-3 alert alert-<?php echo $alertType ?>"
    role="alert">
    <?php echo $message['message'] ?>
</div>

<?php endif ?>