<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Igor Nikolaev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DataFixtures\ORM\Penguin;

use AppBundle\Entity\Penguin;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * Penguin data fixture
 */
class LoadPenguinData implements FixtureInterface
{
    const COUNT_MIN = 50;
    const COUNT_MAX = 100;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $count = $faker->numberBetween(self::COUNT_MIN, self::COUNT_MAX);

        for ($i = 0; $i < $count; $i++) {
            $manager->persist($this->createPenguin($faker));
        }

        $manager->flush();
    }

    /**
     * @param \Faker\Generator $faker Faker
     *
     * @return \AppBundle\Entity\Penguin
     */
    private function createPenguin(Generator $faker)
    {
        return (new Penguin())
            ->setAddedAt($faker->dateTimeThisYear)
            ->setTitle($faker->sentence());
    }
}
