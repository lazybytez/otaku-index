<?php

namespace App\DataFixtures;

use App\Entity\Visibility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VisibilityFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = [
            "public",
            "private",
            "not-listed"
        ];

        foreach ($names as $value) {
            $visibility = new Visibility();
            $visibility->setName($value);
            $manager->persist($visibility);
        }

        $manager->flush();
    }
}
