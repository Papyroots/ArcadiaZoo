<?php
class Opinion {
    private $opinionId;
    private $nameVisitor;
    private $visitorOpinion;
    private $isVisible = false;
    private $createdAt;
    private $updatedAt;

    public function __construct($opinionId, $nameVisitor, $visitorOpinion, $isVisible, $createdAt, $updatedAt = null) {
        $this->opinionId = $opinionId;
        $this->nameVisitor = $nameVisitor;
        $this->visitorOpinion = $visitorOpinion;
        $this->isVisible = $isVisible;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }

    // Getters
    public function getopinionId() {
        return $this->opinionId;
    }

    public function getNameVisitor() {
        return $this->nameVisitor;
    }

    public function getVisitorOpinion() {
        return $this->visitorOpinion;
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

    public function setVisitorOpinion($visitorOpinion) {
        $this->visitorOpinion = $visitorOpinion;
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


    public function isValid() {
        return !empty($this->nameVisitor) && !empty($this->visitorOpinion);
    }
}
