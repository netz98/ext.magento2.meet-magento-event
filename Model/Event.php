<?php

declare(strict_types=1);

namespace MeetMagento\Event\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use MeetMagento\Event\Api\Data\EventInterface;

/**
 * Class Event
 * @package MeetMagento\Event\Model
 */
class Event extends AbstractExtensibleModel
{
    /**
     * init model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MeetMagento\Event\Model\ResourceModel\Event::class);
    }
}
