<?php

class User {
    private $username;
    private $password;
    private $lastname;
    private $firstname;
    private $role;
    private $createdAt;
    private $updatedAt;

    public function __construct($username, $password, $lastname, $firstname, $role, $createdAt, $updatedAt = null) {
        $this->username = $username;
        $this->password = $password;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->role = $role;
        $this->createdAt = new DateTime($createdAt);
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = new DateTime($createdAt);
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt ? new DateTime($updatedAt) : null;
    }
}
