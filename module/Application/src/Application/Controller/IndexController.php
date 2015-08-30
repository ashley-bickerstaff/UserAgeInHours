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

use Application\InputFilter\EntryInputFilter;
use Application\Service\EntryService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * @var EntryService
     */
    protected $entryService;

    /**
     * @var EntryInputFilter
     */
    protected $entryInputFilter;

    public function indexAction()
    {


        $entryService = $this->getEntryService();

        $request = $this->getRequest();
        if ($request->isPost()) {

            $inputFilter = $this->getEntryInputFilter();
            $inputFilter->setData($request->getPost());

            if ($inputFilter->isValid()) {

                /**
                 * Retrieve the data from the InputFilter means that we get
                 * the filtered values.
                 */
                $validValues = $inputFilter->getValues();
                $insertId = $entryService->create($validValues);

                var_dump($insertId);

            }

        }

        $entries = $entryService->getAll();

        return new ViewModel(array(
            'currentDateTime' => new \DateTime(),
            'existingEntries' => $entries
        ));
    }

    /**
     * @param EntryService $entryService
     * @return $this
     */
    public function setEntryService($entryService)
    {
        $this->entryService = $entryService;
        return $this;
    }

    /**
     * @return EntryService
     */
    public function getEntryService()
    {
        return $this->entryService;
    }

    /**
     * @param $inputFilter
     * @return $this
     */
    public function setEntryInputFilter($inputFilter)
    {
        $this->entryInputFilter = $inputFilter;
        return $this;
    }

    /**
     * @return EntryInputFilter
     */
    public function getEntryInputFilter()
    {
        return $this->entryInputFilter;
    }
}
