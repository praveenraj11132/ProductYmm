<?php

namespace Wheelpros\YMMCheck\Block\Ymms;

use Magento\Framework\View\Element\Template;
use Wheelpros\YMMCheck\Block\Breadcrumbs;

class View extends Template
{
    /**
     * @return $this|View
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $this->getLayout()->createBlock(Breadcrumbs::class);

        $pageMainTitle = $this->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle) {
            $pageMainTitle->setPageTitle(__('YMM'));
        }

        return $this;
    }
}
