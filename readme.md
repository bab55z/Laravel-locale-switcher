# Laravel-locale-switcher
Easy and fast locale switching package for your laravel app. 

## Instalation with composer
"bab55z/laravel-locale-switcher": "v1.0.0",

## Publish config file
php artisan vendor:publish --provider="Bab55z\LaravelLocaleSwitcher\LaravelLocaleSwitcherServiceProvider" --tag="config"

## Available settings
**status** : true enables locale switching management

**languages** : supported locales by your app

**redirect-to** : redirect page after locale switched successfully, leave blank to redirect user to the previous page

## Usage

### Update th config file with languages supported by your laravel app
```
'languages' => [
        /**
         * Key is the Laravel locale code
         * Index 0 of sub-array is the Carbon locale code
         * Index 1 of sub-array is the PHP locale code for setlocale()
         * Index 2 of sub-array is whether or not to use RTL (right-to-left) css for this language
         * Index 3 of sub-array is displayable name
         */
        'en'    => ['en', 'en_US', false, 'English'],
        'de'    => ['de', 'de_DE', false, 'Deutsch'],
        'pl'    => ['pl', 'pl_PL', false, 'Polski'],
        'fr'    => ['fr', 'fr_FR', false, 'Français'],
        'es'    => ['es', 'es_ES', false, 'Español'],
        'it'    => ['it', 'it_IT', false, 'Italiano'],
        'pt'    => ['pt_BR', 'pt_PT', false, 'Português'],
        /*'ar'    => ['ar', 'ar_AR', true, 'العربية'],
        'da'    => ['da', 'da_DK', false, 'Dansk'],
        'sv'    => ['sv', 'sv_SE', false, 'Svenska'],
        'th'    => ['th', 'th_TH', false, 'Thailändisch'],*/
    ],
```

### Add routes to your blade files

- sample #1 : adds links statically
```
<li class="nav-item">
    <a class="nav-link" href="/lang/{{app()->getLocale() == 'pl' ? 'en' : 'pl'}}" role="button">
      <img src="/img/{{app()->getLocale() == 'pl' ? 'en' : 'pl'}}.png">
      {{app()->getLocale() == 'pl' ? ' English' : ' Polski'}}
    </a>
</li>
```
<p align="center"> 
<img src="https://github.com/bab55z/Laravel-locale-switcher/raw/readme-update/static/animstatic_.gif">
</p>


- sample #2 : adds links dynamically
```
<div class="navbar-dropdown is-boxed is-medium">
  @foreach(config('langswitcher.languages') as $locale => $localeDetails)
    {{--highlight active language --}}
    @if(strtolower(app()->getLocale()) == strtolower($locale))
      <a class="navbar-item is-menu disabled" href="/#">
        <img src="/img/{{$locale}}.png" alt="lang"> &nbsp; 
          <span style="{{strtolower(app()->getLocale()) == strtolower($locale) ? 'font-weight:bold;':''}}">
            {{$localeDetails[3]}}
          </span>
      </a>
    @endif
  @endforeach
  <hr class="navbar-divider">
  @foreach(config('langswitcher.languages') as $locale => $localeDetails)
      @if(strtolower(app()->getLocale()) != strtolower($locale))
        <a class="navbar-item is-menu" href="/lang/{{$locale}}">
          <img src="/img/{{$locale}}.png" alt="lang"> &nbsp;
          <span style="{{strtolower(app()->getLocale()) == strtolower($locale) ? 'font-weight:bold;':''}}">
            {{$localeDetails[3]}}
          </span>
        </a>
      @endif
  @endforeach
</div>
```
<p align="center"> 
<img src="https://github.com/bab55z/Laravel-locale-switcher/raw/readme-update/static/animdynamic.gif">
</p>

# Thanks ;)
