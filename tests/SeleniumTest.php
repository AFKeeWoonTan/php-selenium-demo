<?php
require 'vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class SeleniumTest {
    public function testExample() {
        $serverUrl = 'http://selenium:4444/wd/hub'; // Selenium server URL
        $driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());

        // Navigate to the PHP application
        $driver->get('http://testserver/index.php');
        //$driver->get('http://localhost:8000/index.php');

        // Wait and get the text of the PHP link
        $element = $driver->findElement(WebDriverBy::className('php-link'));
        $text = $element->getText();

        // Assert the text
        if ($text == 'Learn PHP') {
            echo "Test Passed\n";
        } else {
            echo "Test Failed\n";
        }

        // Close the browser
        $driver->quit();
    }
}

$test = new SeleniumTest();
$test->testExample();

