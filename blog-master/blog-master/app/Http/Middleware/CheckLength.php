<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/25
 * Time: 19:36
 */

namespace App\Http\Middleware;

use Closure;

class CheckLength
{
    /**
     * 返回请求过滤器
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (strlen($request->input('title')) < 6) {
//            return response("title is too short",400);
//        }

        $response = $next($request);
        return $response;

    }

}