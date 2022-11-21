<?php

namespace User;

class User {

    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $gender;
    private ?string $birthday;
    private ?string $mail;
    private ?int $phone;
    private ?string $registration_id;

    /**
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $gender
     * @param string|null $birthday
     * @param string|null $mail
     * @param int|null $phone
     * @param string|null $registration_id
     */
    public function __construct(?int $id = null, ?string $firstname = null, ?string $lastname = null, ?string $gender = null, ?string $birthday = null, ?string $mail = null, ?int $phone = null, ?string $registration_id = null) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->mail = $mail;
        $this->phone = $phone;
        $this->registration_id = $registration_id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): ?int
    {
        $this->id = $id;
        return $id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): ?string
    {
        $this->firstname = $firstname;
        return $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return string|null
     */
    public function setLastname(?string $lastname): ?string
    {
        $this->lastname = $lastname;
        return $lastname;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     * @return string|null
     */
    public function setGender(?string $gender): ?string
    {
        $this->gender = $gender;
        return $gender;
    }

    /**
     * @return string|null
     */
    public function getBirthday(): ?\string
    {
        return $this->birthday;
    }

    /**
     * @param string|null $birthday
     */
    public function setBirthday(?string $birthday): ?string
    {
        $this->birthday = $birthday;
        return $birthday;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     * @return string|null
     */
    public function setMail(?string $mail): ?string
    {
        $this->mail = $mail;
        return $mail;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @param int|null $phone
     * @return int|null
     */
    public function setPhone(?int $phone): ?int
    {
        $this->phone = $phone;
        return $phone;
    }

    /**
     * @return string|null
     */
    public function getRegistrationId(): ?string
    {
        return $this->registration_id;
    }

    /**
     * @param string|null $registration_id
     * @return string|null
     */
    public function setRegistrationId(?string $registration_id): ?string
    {
        $this->registration_id = $registration_id;
        return $registration_id;
    }



}