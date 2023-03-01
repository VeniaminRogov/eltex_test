<?php

namespace App\Model;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderModel
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function create(Order $order): void
    {
        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }

    public function update(): void
    {
        $this->entityManager->flush();
    }

    public function remove(Order $order): void
    {
        $this->entityManager->remove($order);
        $this->entityManager->flush();
    }


}