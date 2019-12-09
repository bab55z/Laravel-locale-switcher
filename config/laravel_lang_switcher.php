<?php

return [

    /**
     * Whether or not to show the language picker, or just default to the default
     * locale specified in the app config file
     *
     * @var bool
     */
    'status' => true,

    /**
     * Available languages
     *
     * Add your language code to this array.
     * The code must have the same name as the language folder.
     * Be sure to add the new language in an alphabetical order.
     *
     * The language picker will not be available if there is only one language option
     * Commenting out languages will make them unavailable to the user
     *
     * @var array
     */
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
    /**
     * redirect path after setting a new language
     * if empty the user will be redirected to the previous page
     */
    'redirect-to' => '',
];
