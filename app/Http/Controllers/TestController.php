<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
  * @OA\Get(
  *   tags={"test"},
  *   path="/api",
  *   summary="Test route",
  *   @OA\Response(response=200, description="OK"),
  *   @OA\Response(response=404, description="Not Found")
  * )
  */

class TestController extends Controller
{
    public function test() {
        return response('Space Flight News', 200);
    }
}
