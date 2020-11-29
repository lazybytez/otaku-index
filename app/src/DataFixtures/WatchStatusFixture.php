<?php

namespace App\DataFixtures;

use App\Entity\WatchStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WatchStatusFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = [
            "plan-to-watch",
            "watching",
            "completed",
            "on-hold",
            "dropped"
        ];

        foreach ($names as $value) {
            $visibility = new WatchStatus();
            $visibility->setName($value);
            $manager->persist($visibility);
        }

        $manager->flush();
    }
}
