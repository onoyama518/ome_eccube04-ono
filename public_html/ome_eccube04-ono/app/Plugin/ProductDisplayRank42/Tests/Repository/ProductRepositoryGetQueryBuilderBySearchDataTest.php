<?php

/*
 * This file is part of ProductDisplayRank42
 *
 * Copyright(c) U-Mebius Inc. All Rights Reserved.
 *
 * https://umebius.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductDisplayRank42\Tests\Repository;

use Eccube\Common\Constant;
use Eccube\Entity\Master\ProductListOrderBy;
use Eccube\Entity\Product;
use Eccube\Repository\Master\ProductListOrderByRepository;
use Eccube\Repository\ProductRepository;
use Eccube\Tests\Repository\AbstractProductRepositoryTestCase;
use Plugin\ProductDisplayRank42\Entity\Config;
use Plugin\ProductDisplayRank42\Repository\ConfigRepository;

/**
 * Class ProductRepositoryGetQueryBuilderBySearchDataTest.
 */
class ProductRepositoryGetQueryBuilderBySearchDataTest extends AbstractProductRepositoryTestCase
{
    /**
     * @var array
     */
    protected $searchData;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ProductListOrderByRepository
     */
    private $productListOrderByRepository;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->productRepository = $this->entityManager->getRepository(Product::class);
        $this->productListOrderByRepository = $this->entityManager->getRepository(ProductListOrderBy::class);
        $this->configRepository = $this->entityManager->getRepository(Config::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testOrderByRankDescending()
    {
        $Config = $this->configRepository->get();

        $Products = $this->productRepository->findAll();
        $Products[0]->setName('りんご');
        $Products[0]->setDisplayRank(3);

        $Products[1]->setName('アイス');
        $Products[1]->setDisplayRank(2);

        $Products[2]->setName('お鍋');
        $Products[2]->setDisplayRank(1);

        $this->entityManager->flush();

        $ProductListOrderBy = $this->productListOrderByRepository->find($Config->getProductListOrderById());
        $this->searchData = [
            'orderby' => $ProductListOrderBy,
        ];

        $this->scenario();

        $this->expected = ['りんご', 'アイス', 'お鍋'];
        $this->actual = [
            $this->Results[0]->getName(),
            $this->Results[1]->getName(),
            $this->Results[2]->getName(),
        ];
        $this->verify();
    }

    public function scenario()
    {
        $this->Results = $this->productRepository->getQueryBuilderBySearchData($this->searchData)
            ->getQuery()
            ->getResult();
    }
}
