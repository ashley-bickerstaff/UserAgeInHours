<?php
/**
 * Storage adapter interface. Exposes methods that should available to storage mechanisms.
 *
 * @category   Application
 * @package    Application\Service\Storage
 * @class      StorageInterface
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\Service\Storage;

interface StorageInterface
{

    /**
     * Return an array of entities from storage.
     * @return mixed
     */
    public function getAll();

    /**
     * Persist an entity in storage.
     * @param $entity
     * @return mixed
     */
    public function create($entity);

} 