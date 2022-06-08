<?php

use TYPO3Fluid\Fluid\View\TemplateView;

require('vendor/autoload.php');

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

echo $view->render();

?>