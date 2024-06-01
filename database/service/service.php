<?php

class Service
{

    private $serviceId;
    private $nameService;
    private $descriptionService;
    private $createdAt;
    private $updatedAt;

    public function __construct($serviceId, $nameService, $descriptionService, $createdAt, $updatedAt = null)
    {
        $this->serviceId = $serviceId;
        $this->nameService = $nameService;
        $this->descriptionService = $descriptionService;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }



    // Getters
    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function getNameService()
    {
        return $this->nameService;
    }

    public function getDescriptionService()
    {
        return $this->descriptionService;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    // Setters
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    public function setNameService($nameService)
    {
        $this->nameService = $nameService;
    }

    public function setDescriptionService($descriptionService)
    {
        $this->descriptionService = $descriptionService;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}