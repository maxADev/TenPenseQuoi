<?php

namespace App\Frontend\Modules\Reglement;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class ReglementController extends BackController {

    
    public function executeIndex(HTTPRequest $request) {

        $this->page->addVar('title', 'Reglement');
        $this->page->addVar('layout', 'connectedLayout');
    }

}
