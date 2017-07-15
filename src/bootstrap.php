<?php
/**
 * Bootstraps everything
 *
 * @author     jens1o
 * @copyright  Jens Hausdorf 2017
 * @license    MIT License
 */

// shortcuts first, saves much time:
if(isset($_GET['showSource'])) {
    // earlier, I had shown the source of my one php file... Now there are some more files...
    header('Location: https://github.com/jens1o/jens-hausdorf.de', true, 301);
    exit;
}

// load dependencies and init autoloader
require_once './vendor/autoload.php';

use jens1o\webpage\util\{
    AgeDateTime,
    LanguageUtil
};


// init smarty
$smarty = new Smarty;

$smarty->setCompileDir('./src/compiled/');
$smarty->setTemplateDir('./src/templates/');
$smarty->setCaching(true);
$smarty->setCacheDir('./src/cache/');
$smarty->php_handling = Smarty::PHP_REMOVE;

/**
 * Shortcut function for smarty
 *
 * @param   string  $string     The date in an acceptable format of what you want to know how long it has been.
 * @return int
 */
function getAge(string $string): int {
    try {
        return (new AgeDateTime($string))->getAge();
    } catch(\Throwable $e) {
        // noop
        return 42;
    }
}
/**
 * Returns a random greeting in a programming language I know.
 *
 * @return string
 */
function getRandomGreeting(): string {
    $greetings = [
        'System.Console.WriteLine("Hello World!");',
        'MsgBox("Hello World!");',
        'printf("Hello World!");',
        'echo Hello World!',
        'puts("Hello World!")',
        'std::cout << "Hello World!" << std::endl',
        'writeln("Hello World!")',
        'print "Hello World!";',
        'document.write("Hello World!");',
        'console.log("Hello World!")',
        'System.out.println("Hello World!");'
    ];

    return $greetings[array_rand($greetings)];
}

$smarty->registerPlugin('modifier', 'age', 'getAge');
$smarty->registerPlugin('function', 'randomGreeting', 'getRandomGreeting');

$lang = LanguageUtil::getPreferredLanguage(['en', 'de'], 'en');
$smarty->assign('language', $lang);
$smarty->assign('statusCode', $_SERVER['SERVER_PROTOCOL'] . ' ' . http_response_code());
$smarty->assign('useGridLayout', isset($_GET['3columns']));
$smarty->display("./src/templates/index.tpl", $lang);