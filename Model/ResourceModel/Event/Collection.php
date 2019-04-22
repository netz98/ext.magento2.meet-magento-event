<?php

declare(strict_types=1);

namespace MeetMagento\Example\Model\ResourceModel\Event;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MeetMagento\Example\Model\Event as EventModel;
use MeetMagento\Example\Model\ResourceModel\Event as EventResourceModel;

/**
 * Class Collection
 * @package MeetMagento\Example\Model\ResourceModel\Event
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(EventModel::class, EventResourceModel::class);
    }
}
