<?php

namespace App\Services;

/**
 *
 */
class AccountActivation
{
  public static function generateToken(){
    return mt_rand().time();


  }


}
