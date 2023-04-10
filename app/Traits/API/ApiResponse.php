<?php

namespace App\Traits\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    /** Generate Response Data Array **/
    private function generateData(mixed $data, string|null $message, int $statusCode): array
    {
        $message = $message ?? trans(Response::$statusTexts[$statusCode]);

        return ['message' => $message, 'data' => $data];
    }

    /** Generic message for all Responses **/
    private function genericResponse(mixed $data = [], string $message = null, int $statusCode = null): JsonResponse
    {
        $data = $this->generateData($data, $message, $statusCode);

        return new JsonResponse($data, $statusCode);
    }

    /*
    |--------------------------------------------------------------------------
    | Success Responses
    |--------------------------------------------------------------------------
    */

    /** Status 200 **/
    public function okResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_OK);
    }

    /** Status 201 **/
    public function createdResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_CREATED);
    }

    /** Status 204 **/
    public function noContentResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_NO_CONTENT);
    }

    /*
    |--------------------------------------------------------------------------
    | Client Error Responses
    |--------------------------------------------------------------------------
    */

    /** Status 302 **/
    public function foundResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_FOUND);
    }

    /*
    |--------------------------------------------------------------------------
    | Client Error Responses
    |--------------------------------------------------------------------------
    */

    /** Status 400 **/
    public function badRequestResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_BAD_REQUEST);
    }

    /** Status 401 **/
    public function unauthorizedResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_UNAUTHORIZED);
    }

    /** Status 403 **/
    public function forbiddenResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_FORBIDDEN);
    }

    /** Status 404 **/
    public function notFoundResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_NOT_FOUND);
    }

    /** Status 405 **/
    public function methodNotAllowedResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_METHOD_NOT_ALLOWED);
    }

    /** Status 409 **/
    public function conflictResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_CONFLICT);
    }

    /** Status 422 **/
    public function unprocessableEntityResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /*
    |--------------------------------------------------------------------------
    | Server Error Responses
    |--------------------------------------------------------------------------
    */

    /** Status 500 **/
    public function internalServerErrorResponse(string $message = null, mixed $data = []): JsonResponse
    {
        return $this->genericResponse($data, $message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
