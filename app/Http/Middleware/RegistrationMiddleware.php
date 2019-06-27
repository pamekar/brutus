<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class RegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $password = $request->all()['password'];

        $validation = [];
        if (Str::upper($password[0]) !== $password[0]
            && Str::upper($password[1]) !== $password[1]
        ) {
            $validation["beginsUpper"]
                = "Your password should begin with capital letters as first digits";
        }

        if (preg_match("/[a-z]/", $password) === 0) {
            $validation['containsLower']
                = "Your Password should consist of lower case letters";
        }

        if (preg_match_all("/[`'\\~!@# $*%^&()<>,:;{}\|]/", $password) < 2) {
            $validation['containsSymbols']
                = "Your password must include at least 2 symbols in the set -> `'\\~!@# $*%^&()<>,:;{}\| <-";
        }

        if (preg_match_all("/[0-9]/", $password) < 3) {
            $validation['containsDigits']
                = "Your password must include at least 3 digits";
        }

        if (strlen($password) <= 16) {
            $validation['greaterThan16']
                = "Your Password must be greater than 16";
        }

        if (!empty($validation)) {
            $characters = [
                '~',
                '!',
                '@',
                '$',
                '#',
                '%',
                '^',
                '&',
                '*',
                '(',
                ')'
            ];

            $validation['suggestion'] = "You can try: <strong>"
                . Str::upper(Str::random(2)) . Str::random(8) . mt_rand(100,
                    1000) . $characters[array_rand($characters)] . $characters[array_rand($characters)]
                . "</strong>";
            return redirect('register')->with("password", $validation);
        }

        return $next($request);
    }

}
