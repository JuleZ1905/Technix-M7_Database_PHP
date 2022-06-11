<?php

use Julian\M7PhpDatabase\Gameround;
use Julian\M7PhpDatabase\Player;
use TYPO3Fluid\Fluid\View\TemplateView;

require('vendor/autoload.php');

$view = new TemplateView();

$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename('templates/add.html');

$names = Player::getAllPlayerNames();

if (isset($_POST['submit']) && isset($_POST['player1']) && isset($_POST['player2']) && isset($_POST['symbol-p1']) && isset($_POST['symbol-p2']) && isset($_POST['date']) && isset($_POST['time'])) {
    if ($_POST['player1'] == $_POST['player2']) {
        $error = 'You cannot pick the same player twice!';
        $view->assignMultiple([
            'players' => $names,
            'error' => $error
        ]);
    } else {
        Gameround::addGameround($_POST['date'], $_POST['time'] . ':00', $_POST['player1'], $_POST['player2'], $_POST['symbol-p1'], $_POST['symbol-p2']);
        header('Location: index.php');
    }
    echo $view->render();
} else {
    $view->assignMultiple([
        'players' => $names,
        'error' => false
    ]);
    echo $view->render();
}
