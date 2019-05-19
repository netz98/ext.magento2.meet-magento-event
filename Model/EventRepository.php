<?php

declare(strict_types=1);

namespace MeetMagento\Event\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use MeetMagento\Event\Api\Data\EventInterface;
use MeetMagento\Event\Api\Data\EventSearchResultsInterfaceFactory;
use MeetMagento\Event\Model\ResourceModel\Event as EventResource;
use MeetMagento\Event\Model\ResourceModel\Event\CollectionFactory as EventCollectionFactory;
use MeetMagento\Event\Api\EventRepositoryInterface;

/**
 * Class EventRepository
 * @package MeetMagento\Event\Model
 */
class EventRepository implements EventRepositoryInterface
{
    /**
     * @var \MeetMagento\Event\Model\ResourceModel\Event\CollectionFactory
     */
    private $eventCollectionFactory;

    /**
     * @var \MeetMagento\Event\Model\ResourceModel\Event
     */
    private $eventResource;

    /**
     * @var \MeetMagento\Event\Model\EventFactory
     */
    private $eventFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var \MeetMagento\Event\Api\Data\EventSearchResultsInterface
     */
    private $searchResultsFactory;

    /**
     * EventRepository constructor.
     * @param \MeetMagento\Event\Model\ResourceModel\Event $eventResource
     * @param \MeetMagento\Event\Model\EventFactory $eventFactory
     * @param \MeetMagento\Event\Model\ResourceModel\Event\CollectionFactory $eventCollectionFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param \MeetMagento\Event\Api\Data\EventSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        EventResource $eventResource,
        EventFactory $eventFactory,
        EventCollectionFactory $eventCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        EventSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->eventCollectionFactory = $eventCollectionFactory;
        $this->eventResource = $eventResource;
        $this->eventFactory = $eventFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save MeetMagento Event
     *
     * @param \MeetMagento\Event\Api\Data\EventInterface $event
     * @return \MeetMagento\Event\Api\Data\EventInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(EventInterface $event): EventInterface
    {
        try {
            $this->eventResource->save($event);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $event;
    }

    /**
     * Get MeetMagento Event
     *
     * @param int $eventId
     * @return \MeetMagento\Event\Api\Data\EventInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($eventId): EventInterface
    {
        $event = $this->eventFactory->create();
        $this->eventResource->load($event, $eventId);

        if (!$event->getId()) {
            throw new NoSuchEntityException(__('The event with the "%1" ID doesn\'t exist.', $eventId));
        }

        return $event;
    }

    /**
     * Delete MeetMagento Event
     *
     * @param \MeetMagento\Event\Api\Data\EventInterface $event
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(EventInterface $event): bool
    {
        try {
            $this->eventResource->delete($event);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * Delete MeetMagento Event by ID
     *
     * @param int $eventId
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($eventId): bool
    {
        return $this->delete($this->get($eventId));
    }

    /**
     * Get list of MeetMagento Events
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MeetMagento\Event\Api\Data\EventSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \MeetMagento\Event\Model\ResourceModel\Event\Collection $collection */
        $collection = $this->eventCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \MeetMagento\Event\Api\Data\EventSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
