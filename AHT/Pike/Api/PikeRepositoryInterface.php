<?php
namespace AHT\Pike\Api;

use AHT\Pike\Api\Data\PikeInterface;

interface PikeRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \AHT\Pike\Api\Data\PikeInterface $pike
     * @return \AHT\Pike\Api\Data\PikeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(PikeInterface $pike);


    /**
     * Retrieve entity.
     *
     * @param int $entityId
     * @return \AHT\Pike\Api\Data\PikeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($entityId);

    /**
     * Delete an entity.
     *
     * @param \AHT\Pike\Api\Data\PikeInterface $pike
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(PikeInterface $pike);

    /**
     * Delete entity by ID.
     *
     * @param int $entityId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($entityId);
}
