<?php

namespace Bab55z\LaravelLocaleSwitcher;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class LocaleMiddleware
 * @package App\Http\Middleware
 */
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Locale is enabled and allowed to be changed
         */
        if (config('langswitcher.status')) {

            if (session()->has('locale') && in_array(session()->get('locale'), array_keys(config('langswitcher.languages')))) {

                /**
                 * Set the Laravel locale
                 */
                app()->setLocale(session()->get('locale'));

                /**
                 * setLocale for php. Enables ->formatLocalized() with localized values for dates
                 */
                setLocale(LC_TIME, config('langswitcher.languages')[session()->get('locale')][1]);

                /**
                 * setLocale to use Carbon source locales. Enables diffForHumans() localized
                 */
                Carbon::setLocale(config('langswitcher.languages')[session()->get('locale')][0]);

                /**
                 * Set the session variable for whether or not the app is using RTL support
				 * for the current language being selected
				 * For use in the blade directive in BladeServiceProvider
                 */
                if (config('langswitcher.languages')[session()->get('locale')][2]) {
                    session(['lang-rtl' => true]);
                } else {
                    session()->forget('lang-rtl');
                }
            }
            else{
                /**
                 * set a default language not manually set by auto-detecting user language,
                 * then fallback to config default language
                 */

                $defaultLocale = null;
                $available = config('langswitcher.languages');

                if ($request->server('HTTP_ACCEPT_LANGUAGE')) {
                    $langs = explode( ',', $request->server('HTTP_ACCEPT_LANGUAGE'));
                    foreach ( $langs as $lang ){
                        $lang = substr( $lang, 0, 2 );
                        if( array_key_exists( $lang, $available ) ) {
                            $defaultLocale = $lang;
                            break;
                        }
                    }
                }

                if ($defaultLocale) {
                    app()->setLocale($defaultLocale);
                    Carbon::setLocale($defaultLocale);
                } else {
                    app()->setLocale(config('app.locale'));
                    Carbon::setLocale(config('app.locale'));
                }
            }
        }

        return $next($request);
    }
}
