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

    public function create(Entry $entry)
    {

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