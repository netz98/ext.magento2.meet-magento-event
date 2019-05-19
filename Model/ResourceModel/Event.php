<?php

declare(strict_types=1);

namespace MeetMagento\Event\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Event
 * @package MeetMagento\Event\Model\ResourceModel
 */
class Event extends AbstractDb
{
    const TABLE_NAME = 'meetmagento_events';
    const ID_FIELD_NAME = 'event_id';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
