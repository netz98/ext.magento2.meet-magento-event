<?php

declare(strict_types=1);

namespace MeetMagento\Example\Api\Data;

/**
 * Interface EventInterface
 * @package MeetMagento\Example\Api\Data
 */
interface EventInterface
{
    const EVENT_ID = 'event_id';
    const TITLE = 'title';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';

    /**
     * @param int $eventId
     * @return $this
     */
    public function setEventId($eventId);

    /**
     * @return int
     */
    public function getEventId();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $startDate
     * @return $this
     */
    public function setStartDate(string $startDate);

    /**
     * @return string
     */
    public function getStartDate();

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate);

    /**
     * @return string
     */
    public function getEndDate();
}
