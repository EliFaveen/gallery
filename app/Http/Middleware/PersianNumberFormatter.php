<?php

namespace App\Http\Middleware;

use Closure;

class PersianNumberFormatter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $latin_num = range(0,9);
        $persian_num = array('٠', '١', '٢', '٣', '۴', '٥', '٦', '۷', '٨', '٩');
        $persian_num2 = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '٧', '۸', '۹');

        foreach ($request->all() as $key=>$value){
            if(is_string($value)){
                $fixed = str_replace($persian_num,$latin_num,$value);
                $fixed = str_replace($persian_num2,$latin_num,$fixed);
                $request[$key] =$fixed;
            }
        }
        return $next($request);
    }
}
