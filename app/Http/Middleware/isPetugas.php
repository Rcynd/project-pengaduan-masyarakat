<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() || auth()->user()->level !== 'admin' && auth()->user()->level !== 'petugas'){
            return redirect('/dashboard')->with('sukses','Halaman yang anda tuju hanya dapat dilihat oleh admin dan petugas!');
        }
        return $next($request);
    }
}
