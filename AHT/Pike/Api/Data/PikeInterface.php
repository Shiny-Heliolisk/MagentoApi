<?php

namespace AHT\Pike\Api\Data;

interface PikeInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set ID
     *
     * @param int $entityId
     * @return PikeInterface
     */
    public function setEntityId($entityId);

    /**
     * Set name
     *
     * @param int $name
     * @return PikeInterface
     */
    public function setName($name);
}
