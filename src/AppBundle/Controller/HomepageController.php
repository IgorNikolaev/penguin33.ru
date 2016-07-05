<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Igor Nikolaev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Homepage controller
 */
class HomepageController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $latestPenguins = $this->getPenguinRepository()->getForHomepageLatestBuilder()->getQuery()->getResult();

        return $this->render(':homepage:index.html.twig', [
            'latest_penguins' => $latestPenguins,
        ]);
    }

    /**
     * @return \AppBundle\Repository\PenguinRepository
     */
    private function getPenguinRepository()
    {
        return $this->get('app.penguin.repository');
    }
}
