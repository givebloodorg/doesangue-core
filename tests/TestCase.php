<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function headers($user = null)
    {
      $headers = ['Accept' => 'application/json'];

      if (!is_null($user)) {

        $token = JWTAuth::fromUser($user);

        JWTAuth::setToken($token);

        $headers['Authorization'] = 'Bearer '.$token;
      }

      return $headers;
    }

}
