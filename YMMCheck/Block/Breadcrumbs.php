<?php

namespace Wheelpros\YMMCheck\Block;

use Magento\Framework\View\Element\Template;

/**
 * Blowouts breadcrumbs
 */
class Breadcrumbs extends Template
{
    /**
     * Preparing layout
     *
     * @return Breadcrumbs
     */
    protected function _prepareLayout()
    {
        if ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbsBlock->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            );

            $breadcrumbsBlock->addCrumb(
                'ymms',
                [
                    'label' => __('YMM'),
                    'title' => __('Go to YMM Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl() . 'ymm'
                ]
            );
        }

        return parent::_prepareLayout();
    }
}
