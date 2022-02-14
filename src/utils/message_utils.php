<?php

enum MessageType: string
{
    case Error = 'danger';
    case Success = 'success';
    case Warning = 'warning';
    case Info = 'info';
}

function addMessage(MessageType $type, string $msg)
{
    $_SESSION['message'] = [
        'type' => $type->value,
        'message' => $msg
    ];
}
