<?php

namespace Wheelpros\YMMCheck\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wheelpros\YMMCheck\Model\Config;

class NewTabStatus implements ArgumentInterface
{
    private const NEW_TAB_STATUS = 'catalog/frontend/enable_new_tab';

    /**
     * @var Config
     */
    public Config $config;

    /**
     * @param Config $config
     */
    public function __construct(
        Config $config,
    ) {
        $this->config = $config;
    }

    /**
     * Returns true if products needs to be opened in new tab (in all listing pages)
     *
     * @return bool
     */
    public function getNewTabStatus(): bool
    {
        return $this->config->getConfig(self::NEW_TAB_STATUS);
    }
}
