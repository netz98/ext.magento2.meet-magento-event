<?php

declare(strict_types=1);

namespace MeetMagento\Event\Model\ResourceModel\Event;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MeetMagento\Event\Model\Event as EventModel;
use MeetMagento\Event\Model\ResourceModel\Event as EventResourceModel;

/**
 * Class Collection
 * @package MeetMagento\Event\Model\ResourceModel\Event
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
