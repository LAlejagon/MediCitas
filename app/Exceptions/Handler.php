<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
    // Método para manejar excepciones específicas de la API
    public function handleApiExceptions($request, $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Model Not Found'], 404);
        }

        Log::warning("[Handler.handleApiExceptions] API Exception type '" .
            get_class($exception) . "' not handled.");

        return parent::render($request, $exception);
    }

    // Método para renderizar excepciones
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return $this->handleApiExceptions($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
