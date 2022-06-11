<?php

use Julian\M7PhpDatabase\Tournament;
use TYPO3Fluid\Fluid\View\TemplateView;

require('vendor/autoload.php');

$gamerounds = [];
$tournament = new Tournament();
$gamerounds = $tournament->getGamerounds();


/**
 * data which needs to be sent to the template
 * 1) playernames
 * 2) playerids
 * 3) gameround
 * 4) date
 * 5) winner
 * 6) symbols picked
 */

$view = new TemplateView();

$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename('templates/index.html');

$view->assignMultiple([
    'gamerounds' => $gamerounds
]);

echo $view->render();
