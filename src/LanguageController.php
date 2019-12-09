<?php

namespace Williems\LaravelLangSwitcher;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function swap($lang)
    {
        session()->put('locale', $lang);
        session()->save();

        if (strlen(config('langswitcher.redirect-to')) > 0) {
            return redirect(config('langswitcher.redirect-to'));
        }
        return redirect()->back();
    }
}
