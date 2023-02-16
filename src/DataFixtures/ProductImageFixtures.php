<?php

namespace App\DataFixtures;

use App\Entity\ProductImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 10; $i++) {
        $productImage = new ProductImage();
        $productImage->setPath('ane-en-peluche.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_DONKEY_PELUCHE));
        $manager->persist($productImage);

        // $productImage = new ProductImage();
        // $productImage->setPath('cat-en-peluche.jpg');
        // $productImage->setPosition(2);
        // $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_CAT_PELUCHE));
        // $manager->persist($productImage);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
