<?php

declare(strict_types=1);

namespace MeetMagento\Example\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use MeetMagento\Example\Api\Data\EventInterface;

/**
 * Class Event
 * @package MeetMagento\Example\Model
 */
class Event extends AbstractExtensibleModel implements EventInterface
{
    /**
     * @param int $eventId
     * @return $this
     */
    public function setEventId($eventId)
    {
        return $this->setData(self::EVENT_ID, $eventId);
    }

    /**
     * @return int
     */
    public function getEventId()
    {
        return $this->_getData(self::EVENT_ID);
    }

    /**
     * init model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MeetMagento\Example\Model\ResourceModel\Event::class);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_getData(self::TITLE);
    }

    /**
     * @param string $startDate
     * @return $this
     */
    public function setStartDate(string $startDate)
    {
        return $this->setData(self::START_DATE, $startDate);
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->_getData(self::START_DATE);
    }

    /**
     * @param string $startDate
     * @return $this
     */
    public function setEndDate(string $endDate)
    {
        return $this->setData(self::END_DATE, $endDate);
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->getData(self::END_DATE);
    }
}
