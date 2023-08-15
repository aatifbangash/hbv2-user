<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class RaiseException extends Exception
{
    protected $message;
    protected $code;
    protected $statusCode;
    protected $attributeName;

    public function __construct($message = null, $code = null, $statusCode = 404, $attributeName = null)
    {
        parent::__construct('');

        $this->message = $message;
        $this->code = $code;
        $this->statusCode = $statusCode;
        $this->attributeName = $attributeName;

    }

    public function render($request): JsonResponse
    {
        return response()->json(['code' => $this->code, 'message' => $this->message, 'attributeName' => $this->attributeName], $this->statusCode);
    }
}
