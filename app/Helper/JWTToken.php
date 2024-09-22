<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{

public static function createJwtToken($userEmail,$userId){
       $key =env('JWT_key');
       $payload =[
                'iss' =>"Car_Rental",
                'iat' =>time(),
                'exp' =>time()+24*60*60,
                'userEmail'=>$userEmail,
                'userId'=>$userId
       ];
       return Jwt::encode($payload,$key,'HS256');
}

public function verifyJwtToken($token){
   try{
    if($token == null){
        return 'unauthorized';
    }else{
        $key = env('JWT_key');
        return JWT::decode($token,new Key($key,'HS256'));
    }
   }catch(Exception  $e){
    return "unauthorized";
   }

}

}