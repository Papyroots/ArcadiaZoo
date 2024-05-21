<?php
class Opinion {
    private $opinionId;
    private $nameVisitor;
    private $opinion;
    private $isVisible;
    private $createdAt;
    private $updatedAt;

    public function __construct($opinionId, $nameVisitor, $opinion, $isVisible, $createdAt, $updatedAt = null) {
        $this->opinionId = $opinionId;
        $this->nameVisitor = $nameVisitor;
        $this->opinion = $opinion;
        $this->isVisible = $isVisible;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }

    // Getters
    public function getOpinionId() {
        return $this->opinionId;
    }

    public function getNameVisitor() {
        return $this->nameVisitor;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function getIsVisible() {
        return $this->isVisible;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    // Setters
    public function setOpinionId($opinionId) {
        $this->opinionId = $opinionId;
    }

    public function setNameVisitor($nameVisitor) {
        $this->nameVisitor = $nameVisitor;
    }

    public function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    public function setIsVisible($isVisible) {
        $this->isVisible = $isVisible;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = new DateTime($createdAt);
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }
}
