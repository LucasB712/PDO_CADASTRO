<?php

namespace Alura\Pdo\Domain\Model;

class Student
{
    private ?int $id;
    private string $nome;
    private \DateTimeInterface $birthDate;
    /**@var Phone[]*/
    private array $phones = [];

    public function __construct(?int $id, string $nome, \DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->birthDate = $birthDate;
    }

    public function defineId(int $id): void {
        if (!is_null($this->id)) {
            throw new \DomainException('Você só pode definir o ID uma vez');
        }
        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->nome;
    }

    public function changeName(string $newName): void {
        $this->nome = $newName;
    }

    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function age(): int
    {
        return $this->birthDate
            ->diff(new \DateTimeImmutable())
            ->y;
    }
    public function addPhone(Phone $phone) : void {
        $this->phones[] = $phone;
    }
    /** @return Phone[] */
    public function phones() : array {
        return $this->phones;        
    }
}
