<?php

enum MessageType: string
{
    case Error = 'error';
    case Success = 'success';
}

function addMessage(MessageType $type, string $msg)
{
    $_SESSION['message'] = [
        'type' => $type->value,
        'message' => $msg
    ];
}
