<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const ORDERS = [
        ['Test', 'Test', 'test@test.com'],
        ['Test1', 'Test1', 'test1@test1.com'],
        ['Test2', 'Test2', 'test2@test2.com'],
        ['Test3', 'Test3', 'test3@test3.com'],
        ['Test4', 'Test4', 'test4@test4.com'],
        ['Test5', 'Test5', 'test5@test5.com']
    ];
    public function load(ObjectManager $manager): void
    {
        $orders = [];
        for ($i = 0; $i < count(self::ORDERS); $i++) {
            $orders[$i] = new Order();
            $orders[$i]
                ->setName(self::ORDERS[$i][0])
                ->setTheme(self::ORDERS[$i][1])
                ->setEmail(self::ORDERS[$i][2])
            ;
            $manager->persist($orders[$i]);
        }
        $manager->flush();
    }
}
