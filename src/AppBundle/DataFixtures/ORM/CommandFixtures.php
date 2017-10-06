<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Command;
use AppBundle\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class CommandFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 10; ++$i) {
            // Items
            $items = new ArrayCollection();
            for ($i = 1; $i < 5; ++$i) {
                $item = (new Item())
                    ->setQuantity(rand(1, 10))
                    ->setProduct($this->getReference(sprintf('product-%s', rand(1, 50))));

                $items->add($item);
            }

            // Command
            $command = (new Command())
                ->setCustomer($this->getReference(sprintf('customer-%s', rand(1, 10))))
                ->setItems($items);

            $manager->persist($command);
            $manager->flush();

            $this->addReference(sprintf('command-%s', $i), $command);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            CustomerFixtures::class,
            ProductFixtures::class,
        );
    }
}