<?php
namespace Wheelpros\YMMCheck\Block;

use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterfaceFactory;
use Magento\Framework\App\Request\Http;
use Magento\Catalog\Helper\Image;

class Ymm extends Template
{
    protected $_productCollectionFactory;
    protected $_productFactory;
    protected $_productRepositoryFactory;
    protected $_request;
    protected $imageHelper;


    public function __construct(
        Template\Context $context,
        CollectionFactory $productCollectionFactory,
        ProductFactory $productFactory,
        Http $request,
        Image $imageHelper,
        ProductRepositoryInterfaceFactory $productRepositoryFactory,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
        $this->_request = $request;
        $this->imageHelper = $imageHelper;
        $this->_productRepositoryFactory = $productRepositoryFactory;
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        $productCollection = $this->_productCollectionFactory->create();
        $productCollection->addAttributeToSelect('*')
            ->addAttributeToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)
            ->addAttributeToFilter('visibility', \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH)
            ->addMediaGalleryData();

        // Check if search term is present in request
        $searchQuery = $this->_request->getParam('q');
        if (!empty($searchQuery)) {
            // Add search filter to collection
            $productCollection->addAttributeToFilter('name', ['like' => '%' . $searchQuery . '%']);
        }

        $this->setProductCollection($productCollection);
        return parent::_prepareLayout();
    }

    public function getProductCollection()
    {
        $productCollection=$this->getData('product_collection');
        foreach ($productCollection as $product) {
            $Url = $this->imageHelper->init($product, 'product_thumbnail_image')->getUrl();
            $product->setImageUrl($Url);
        }

        return $productCollection;
    }
}
