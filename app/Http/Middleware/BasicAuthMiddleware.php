<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check header Authorization
        if (!$request->header('Authorization')) {
            return response()->json(['message' => 'Authorization header not found'], Response::HTTP_UNAUTHORIZED);
        }

        // get value of header Authorization
        $authHeader = $request->header('Authorization');
        if(strpos($authHeader, 'Basic') !== 0) {
            return response()->json(['message' => 'Authorization header is not Basic Auth'], Response::HTTP_UNAUTHORIZED);
        }

        // Decode base64 from basic auth
        $encodedCredentials = substr($authHeader, 6);
        $decodedCredentials = base64_decode($encodedCredentials);

        if(!$decodedCredentials) {
            return response()->json(['message' => 'Invalid credentials encoding'], Response::HTTP_UNAUTHORIZED);
        }

        // Extract username and password
        [$username, $password] = explode(':', $decodedCredentials);

        // Check username and password
        $employee = new Employee();
        $auth = $employee->auth($username, md5($password));
        if(!$auth) {
            return response()->json(['message' => 'Invalid username or password Basic Auth API'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
