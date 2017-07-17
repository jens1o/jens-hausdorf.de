<?php
namespace jens1o\webpage\util;

/**
 * Provides utilities to work with languages
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 * @package    jens1o\webpage
 * @subpackage util
 */
class LanguageUtil {

    /**
     * Creating this class is disallowed
     */
    private function __construct() {}

    /**
     * Tries to find the best suitable language for this user.
     *
     * @param array $availableLanguages
     * @param   string  $defaultLanguage    The default language that will be shipped once we don't know
     * @return string
     */
    public static function getPreferredLanguage(array $availableLanguages, string $defaultLanguage): string {
        if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $queue = new \SplPriorityQueue;

            // extract languages and sort them by priority given by the browser
            foreach(\preg_split('/,\s*/', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $acceptedLanguage) {
                $result = \preg_split('/;\s*q=/', $acceptedLanguage, 2);
                $queue->insert(self::trimLanguageCode($result[0]), isset($result[1]) ? (float) $result[1] : 1.0);
            }

            // compare our available languages against the user wanted ones
            foreach($queue as $wantedLanguage) {
                foreach($availableLanguages as $availableLanguage) {
                    if($availableLanguage === $wantedLanguage) {
                        return $availableLanguage;
                    }
                }
            }
        }

        return $defaultLanguage;
    }

    /**
     * Removes any suffixes from a language code.
     * Example: `de-DE` => `de`
     *
     * @param string $langCode
     * @return void
     */
    public static function trimLanguageCode(string $langCode): string {
        return \preg_replace('/-[a-z0-9]+/', '', \strtolower($langCode));
    }

}