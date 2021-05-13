<?php


namespace App\Utils;


use Illuminate\Http\JsonResponse;

class ResponseUtil {

    private const STATUS_OK = 200;
    private const STATUS_BAD_REQUEST = 400;
    private const STATUS_UNAUTHORIZED = 401;

    /**
     * Returns json data with 200(OK) status code.
     * @param array $response
     * @return JsonResponse
     */
    public static function json(array $response): JsonResponse {
        return response()->json($response, self::STATUS_OK);
    }

    /**
     * Returns 200(OK) status code.
     * Can be used for webhook response.
     * @return JsonResponse
     */
    public static function ok(): JsonResponse {
        return response()->json([], self::STATUS_OK);
    }

    /**
     * Returns a success message with 200(OK) status code.
     * @param string $message
     * @return JsonResponse
     */
    public static function success(string $message): JsonResponse {
        return response()->json(['success' => $message], self::STATUS_OK);
    }

    /**
     * Returns an error message with 400(Bad Request) status code.
     * @param string $message
     * @return JsonResponse
     */
    public static function error(string $message): JsonResponse {
        return response()->json(['error' => $message], self::STATUS_BAD_REQUEST);
    }

    /**
     * Returns an error message with 401(Unauthorized) status code.
     * @return JsonResponse
     */
    public static function unauthorized(): JsonResponse {
        return response()->json(['error' => 'Unauthorized'], self::STATUS_UNAUTHORIZED);
    }
}
