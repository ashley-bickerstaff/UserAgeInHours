<?php
/**
 * The service class that proxies the request and submission of entries through the storage mechanisms.
 *
 * @category   Application
 * @package    Application\Service
 * @class      EntryService
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\Service;

use Application\Entity\Entry;
use Application\Service\Storage\StorageInterface;

class EntryService
{

    /**
     * @var StorageInterface
     */
    protected $storage;

    /**
     * Inject the storage provider at instantiation.
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->setStorage($storage);
    }

    public function getAll()
    {
        return $this->getStorage()->getAll();
    }

    public function create(array $entryData)
    {
        $entry = new Entry();

        /**
         * Convert to a valid \DateTime instance with a 'zero' time.
         */
        $dateOfBirth = \DateTime::createFromFormat('d/m/Y', $entryData[Entry::FIELD_DOB]);
        $dateOfBirth->setTime(0,0,0);
        $entryData[Entry::FIELD_DOB] = $dateOfBirth;

        $entry->exchangeArray($entryData);

        return $this->getStorage()->create($entry);
    }

    /**
     * @param StorageInterface $storage
     * @return $this
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * @return StorageInterface
     */
    public function getStorage()
    {
        return $this->storage;
    }
}