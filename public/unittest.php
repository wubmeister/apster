<?php

include '../vendor/autoload.php';

$renderer = new Unittest\Render\Html();

try {

    if (isset($_GET['file'])) {

        $file = dirname(__DIR__) . '/' . $_GET['file'];
        $test = new Unittest\Test([$file]);
        $test();
        $renderer->render($test);

    } else {

        $tests = Unittest\Test::listTests(dirname(__DIR__) . '/vendor/apster/lib-apster/tests', dirname(__DIR__) . '/');
        $renderer->renderList($tests);

    }

} catch (Exception $ex) {

    $renderer->renderError($ex);

}
