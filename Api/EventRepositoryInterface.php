<?php

declare(strict_types=1);

namespace MeetMagento\Event\Api;

use MeetMagento\Event\Api\Data\EventInterface;

/**
 * Interface EventRepositoryInterface
 * @package MeetMagento\Event\Api
 */
interface EventRepositoryInterface
{
    /**
     * Save MeetMagento Event
     *
     * @param \MeetMagento\Event\Api\Data\EventInterface $event
     * @return \MeetMagento\Event\Api\Data\EventInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(EventInterface $event): EventInterface;

    /**
     * Get MeetMagento Event
     *
     * @param int $eventId
     * @return \MeetMagento\Event\Api\Data\EventInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($eventId): EventInterface;

    /**
     * Delete MeetMagento Event
     *
     * @param \Magento\Catalog\Api\Data\CategoryInterface $event
     * @return bool
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete(EventInterface $event): bool;

    /**
     * Delete MeetMagento Event by ID
     *
     * @param int $eventId
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($eventId): bool;

    /**
     * Get list of MeetMagento Events
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MeetMagento\Event\Api\Data\EventSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
