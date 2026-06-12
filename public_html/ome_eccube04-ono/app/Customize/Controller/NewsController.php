<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Customize\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Eccube\Controller\AbstractController;
use Eccube\Entity\News;

class NewsController extends AbstractController
{
    /**
     * @Route("/news/detail/{id}", name="news_detail", methods={"GET"})
     * @Template("@user_data/News/detail.twig")
     *
     * @param News $News
     *
     * @return array
     */
    public function detail(News $News)
    {
        return [
            'News' => $News,
        ];
    }
}
