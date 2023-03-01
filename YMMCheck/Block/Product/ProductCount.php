<?php

namespace Wheelpros\YMMCheck\Block\Product;

use Magento\Framework\View\Element\Template;

/**
 * Block class to display product count in listing page
 */
class ProductCount extends Template
{
    /**
     * Product count to display on the page
     *
     * @var int
     */
    protected int $productCount;

    /**
     * Get product count
     *
     * @return int
     */
    public function getProductCount(): int
    {
        if (!empty($this->productCount)) {
            return $this->productCount;
        }

        return 0;
    }

    /**
     * Set Product count
     *
     * @param  int $productCount
     * @return void
     */
    public function setProductCount(int $productCount): void
    {
        $this->productCount = $productCount;
    }
}
