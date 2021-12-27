<?php

namespace AHT\Pike\Setup\Patch\Data;

use AHT\Pike\Model\PikeFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddRecords implements DataPatchInterface
{
    /**
     *
     * @var _pikeFactory
     */
    private $_pikeFactory;

    /**
     * Model constructor.
     *
     * @param PikeFactory  $pikeFactory
     */
    public function __construct(
        PikeFactory $pikeFactory
    ) {
        $this->_pikeFactory = $pikeFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {

        $data = [
            'name'         => "User 1",
        ];
        $pike = $this->_pikeFactory->create();
        $pike->addData($data)->save();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
