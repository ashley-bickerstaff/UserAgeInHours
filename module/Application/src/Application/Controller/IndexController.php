<?php
/**
 * Front controller for the application.
 *
 * @category   Application
 * @package    Application\Controller
 * @class      IndexController
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $entryService;

    public function indexAction()
    {
        $entryService = $this->getEntryService();
        $entries = $entryService->getAll();
//        foreach ($entries as $entry) {
//            var_dump($entry);
//        }
        return new ViewModel(array(
            'existingEntries' => $entries
        ));
    }

    public function setEntryService($entryService)
    {
        $this->entryService = $entryService;
    }

    public function getEntryService()
    {
        return $this->entryService;
    }
}
