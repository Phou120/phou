<?php

namespace App\Traits;

trait ResponseAPI
{
  /**
   * Core of response
   *
   * @param   string          $message
   * @param   array|object    $data
   * @param   integer         $statusCode
   * @param   boolean         $isSuccess
   */
  public function coreResponse($data, $message, $statusCode, $isSuccess = true)
  {
    // Send the response
    if ($isSuccess) {
      return response()->json([
        'error' => false,
        'message' => $message,
        'code' => $statusCode,
        'data' => $data
      ], $statusCode);
    } else {
      return response()->json([
        'error' => true,
        'code' => $statusCode,
        'message' => $message,
      ], $statusCode);
    }
  }

  /**
   * Send any success response
   *
   * @param   string          $message
   * @param   array|object    $data
   * @param   integer         $statusCode
   */
  public function success($data, $message, $statusCode = 200)
  {
    return $this->coreResponse($data, $message, $statusCode);
  }

  /**
   * Send any error response
   *
   * @param   string          $message
   * @param   integer         $statusCode
   */
  public function error($message, $statusCode = 500)
  {
    return $this->coreResponse(null, $message, $statusCode, false);
  }
}
