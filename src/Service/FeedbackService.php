<?php

namespace Src\Service;

use Laminas\Diactoros\ServerRequest;
use ORM;

class FeedbackService
{
    public function feedbackCreate(array $fields): void
    {
        $feedback = ORM::for_table('feedback')->create();

        $feedback->first_name = $fields['first-name'];
        $feedback->last_name = $fields['last-name'];
        $feedback->telephone = $fields['telephone'];
        $feedback->email = $fields['email'];
        $feedback->message = $fields['message'];
        $feedback->save();
    }
}