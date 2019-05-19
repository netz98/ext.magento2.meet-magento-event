<?php

declare(strict_types=1);

namespace MeetMagento\Event\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface EventSearchResultsInterface
 * @package MeetMagento\Event\Api\Data
 */
interface EventSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get items list.
     *
     * @return \MeetMagento\Event\Api\Data\EventInterface[]
     */
    public function getItems();

    /**
     * Set items list.
     *
     * @param \MeetMagento\Event\Api\Data\EventInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
