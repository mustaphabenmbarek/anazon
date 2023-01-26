<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_PELUCHES = 'CATEGORY_PELUCHES';

    public function load(ObjectManager $manager): void
    {
        $jouets = new Category();
        $jouets->setTitle('Jouets');
        $manager->persist($jouets);
        // $mainCategory = new Category();
        // $mainCategory->setTitle('Main Category');
        // $manager->persist($mainCategory);

        $category = new Category();
        $category->setTitle('Peluches');
        //$category->setTitle('Sub Category');
        $category->setParent($jouets);
        //$category->setParent($mainCategory);
        $manager->persist($category);
        $this->addReference(self::CATEGORY_PELUCHES, $category);

        $category = new Category();
        $category->setTitle('Balades');
        $manager->persist($category);

        $manager->flush();
    }
}
