<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRODUCT_DONKEY_PELUCHE = 'PRODUCT_DONKEY_PELUCHE';
    public const PRODUCT_CAT_PELUCHE = 'PRODUCT_CAT_PELUCHE';

    public function load(ObjectManager $manager): void
    {
        // for ($i=0; $i < 10; $i++) {
        $product = new Product();
        $product->setName('Super peluche de donkey');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_PELUCHES));
        $product->setPrice(12.23);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_DONKEY_PELUCHE, $product);

        // $product = new Product();
        // $product->setName('Super peluche de Cat');
        // $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_PELUCHES));
        // $product->setPrice(10.00);
        // $manager->persist($product);
        // $this->addReference(self::PRODUCT_CAT_PELUCHE, $product);
        //}

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
