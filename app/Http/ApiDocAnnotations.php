<?php

/**
 * @OA\Info(
 *      version="0.0.1",
 *      title="Pizza Orders",
 *      description="Pizza orders api documentation",
 * )
 */

/**
 * @OA\Post(
 *      path="/auth/register",
 *      tags={"Auth"},
 *      summary="Registering new user",
 *      description="Registering new user",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "secret",
 *                   "password_confirmation": "secret"
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully registered",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/facebook",
 *      tags={"Auth"},
 *      summary="Facebook login",
 *      description="Returns app access_token by FB access_token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "access_token": "VALID_FB_ACCESS_TOKEN",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully authenticated through Facebook",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/login",
 *      tags={"Auth"},
 *      summary="App login",
 *      description="Returns login access token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "secret",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "message":"User successfully authenticated",
 *                   "data":{"access_token": "VALID_JWT_TOKEN", "user": {"name":"Example user", "email":"example@example.com", "roles":{"admin","manager"}}}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */