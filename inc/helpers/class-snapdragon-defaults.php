<?php
/**
 * Snapdragon Defaults Class
 *
 * @since    1.0
 * @package  snapdragon
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



if ( ! class_exists( 'SnapdragonDefaults' ) ) :



    class SnapdragonDefaults {



        private static $instance = null;



        public const TRANSLATE_POST_NAME = 'snapdragon-language-option';
        public const TRANSLATE_FLAGS_DIR = '/assets/images/languages/';
        public const TRANSLATE_DEFAULT_SELECTED = 'hu_HU';
        public const TRANSLATE_OPTIONS_NAME = 'snapdragon_enabled_languages';
        public const TRANSLATE_DEFAULT_ENABLED_LANGUAGES = ['hu_HU', 'en_US'];
        public const TRANSLATE_COOKIE_NAME = 'snapdragon_language_selected';
        public const TRANSLATE_CODE_PAIRS = [
            'de_DE' => 'Deutsch',
            'en_US' => 'English (USA)',
            'en_GB' => 'English (UK)',
            'fr_FR' => 'Français',
            'hu_HU' => 'Magyar',
            'pl_PL' => 'Polski',
            'ro_RO' => 'Română',
            'es_ES' => 'Español',
            'it_IT' => 'Italiano',
            'nl_NL' => 'Nederlands',
            'pt_PT' => 'Português',
            'sv_SE' => 'Svenska',
            'fi_FI' => 'Suomi',
            'cs_CZ' => 'Čeština',
            'ja_JP' => '日本語',
            'zh_CN' => '中文 (简体)',
            'zh_TW' => '中文 (繁體)',
            'ru_RU' => 'Русский',
            'ar_AR' => 'العربية',
            'tr_TR' => 'Türkçe',
        ];


        public const COOKIE_EXCLUSION_SELECTION_VALUES = ['language', 'product'];
        public const COOKIE_EXP_TIME = "+1 day";
        public const COOKIE_ACCEPTED_NAME = 'snapdragon_cookies_accepted';
        public const COOKIE_ACCEPTED = 0;
        public const COOKIE_MESSAGE_OPTION_NAME = 'snapdragon_cookie_message';
        public const COOKIE_MESSAGE = 'Ez a webhely cookie-kat használ az online élmény javítása érdekében, lehetővé teszi a webhelyen a személyre szabottabb keresést, a különböző méretű eszközökön és kijelzőkön való megjelenést, illetve a tartalom nyelvi fordításának lehetőségét. Továbbá a webhely forgalmának mérését, valamint a böngészési tevékenysége alapján testreszabott hirdetések megjelenítését.';

        
        public const ADV_COOKIE_SEASONAL_MODAL_NAME = 'snapdragon_seasonal_adverts_showed';
        public const ADV_COOKIE_SEASONAL_MODAL_SHOWED = 0;
        
        public const ADV_COOKIE_MODAL_NAME = 'snapdragon_adverts_showed';
        public const ADV_COOKIE_MODAL_SHOWED = 0;


        public const PRODUCT_WISHLIST_COOKIE_NAME = 'snapdragon_product_whislist';
        public const PRODUCT_LAST_VIEWED_COOKIE_NAME = 'snapdragon_product_last_viewed';
                
        public const PRODUCT_ORDERBY_COOKIE_NAME = 'snapdragon_product_orderby';
        public const PRODUCT_ORDERBY_VALUES = ['post_date-DESC', 'post_date-ASC', 'meta_value_num-DESC', 'meta_value_num-ASC', 'title-DESC', 'title-ASC'];
        public const PRODUCT_ORDERBY_COOKIE = 'post_date-DESC';

        public const PRODUCT_NUMBER_COOKIE_NAME = 'snapdragon_product_number';
        public const PRODUCT_NUMBER_VALUES = [12, 24, 48, -1];
        public const PRODUCT_NUMBER = 12;

        public const PRODUCT_ONLY_SALES_COOKIE_NAME = 'snapdragon_product_only_sales';
        public const PRODUCT_ONLY_SALES = 0;
        
        public const PRODUCT_PRICE_COOKIE_NAME = 'snapdragon_product_price';
        public const PRODUCT_PRICE = -1;
        
        public const PRODUCT_GRID_COOKIE_NAME = 'snapdragon_product_grid';
        public const PRODUCT_GRID = 'grid';
        public const PRODUCT_GRID_VALUES = ['grid', 'lines'];


        public const MEDIAQUERY_COOKIE_NAME = 'snapdragon_device_screen';
        public const MEDIAQUERY_DEFAULT = 'desktop';
        public const MEDIAQUERY_DEVICES = ['mobile','tablet','laptop','desktop'];



        public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}



        // End of class
    }



endif;



return SnapdragonDefaults::instance();