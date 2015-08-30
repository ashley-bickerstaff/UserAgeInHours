<?php
/**
 * The filtering and validation for new entries.
 *
 * @category   Application
 * @package    Application\InputFilter
 * @class      EntryInputFilter
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\InputFilter;

use Application\Entity\Entry;
use Zend\InputFilter\InputFilter;

class EntryInputFilter extends InputFilter
{

    /**
     * Add our own validation when the class is requested.
     */
    public function __construct()
    {

        /**
         * Full name filtering and validation.
         */
        $this->add(array(
            'name' => Entry::FIELD_NAME,
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 511
                    )
                )
            )
        ));

        /**
         * Date of birth filtering and validation.
         */
        $this->add(array(
            'name' => Entry::FIELD_DOB,
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'Date',
                    'options' => array(
                        'format' => 'd/m/Y'
                    )
                )
            )
        ));
    }
}