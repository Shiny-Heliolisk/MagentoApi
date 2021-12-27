<?php

namespace AHT\Pike\Model;

use AHT\Pike\Api\Data\PikeInterface;
use AHT\Pike\Api\PikeRepositoryInterface;
use AHT\Pike\Model\ResourceModel\Pike;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Pike\Model\PikeFactory;

class PikeRepository implements PikeRepositoryInterface
{
    const CACHE_TAG = 'aht_pike_pike_repository';

    private $_pikeFactory;
    private $_resourcePike;

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'pike_repository';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        PikeFactory $pikeFactory,
        Pike $resourcePike
    ) {
        $this->_resourcePike = $resourcePike;
        $this->_pikeFactory = $pikeFactory;
    }

    public function save(PikeInterface $pike)
    {
        try {
            $this->_resourcePike->save($pike);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $pike;
    }

    public function delete(PikeInterface $pike)
    {
        try {
            $this->_resourcePike->delete($pike);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function getById($entityId)
    {
        $pike = $this->_pikeFactory->create();
        $this->_resourcePike->load($pike, $entityId);
        if (!$pike->getId()) {
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', $entityId));
        }
        return $pike;
    }

    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }
}
