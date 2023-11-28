<?php

namespace Src\Controller;

use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\ServerRequest;
use Exception;
use Src\Service\FeedbackService;
class FeedbackController
{
    public function feedback(ServerRequest $request, FeedbackService $feedbackService): EmptyResponse
    {
        $body = $request->getParsedBody();
        try{
            $feedbackService->feedbackCreate($body);
            return new EmptyResponse(200);
        } catch (Exception $e){
            return new EmptyResponse(400);
        }
    }
}