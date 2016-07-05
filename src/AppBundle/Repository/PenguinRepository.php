<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Igor Nikolaev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Penguin entity repository
 */
class PenguinRepository extends EntityRepository
{
    /**
     * @var int
     */
    private $homepagePenguins;

    /**
     * @param int $homepagePenguins Homepage penguins count
     */
    public function setHomepagePenguins($homepagePenguins)
    {
        $this->homepagePenguins = $homepagePenguins;
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getForHomepageLatestBuilder()
    {
        return $this->createDefaultQueryBuilder()
            ->setMaxResults($this->homepagePenguins);
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function createDefaultQueryBuilder()
    {
        return $this->createQueryBuilder('o')->addOrderBy('o.addedAt', 'desc');
    }
}
