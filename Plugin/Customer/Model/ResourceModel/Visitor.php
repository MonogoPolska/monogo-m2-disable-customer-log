<?php
declare(strict_types=1);

namespace Monogo\DisableCustomerLog\Plugin\Customer\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Monogo\DisableCustomerLog\Helper\Config;

/**
 * Class Visitor
 *
 * @category Monogo
 * @package  Monogo\DisableCustomerLog
 * @license  MIT
 * @author   Paweł Detka <pawel.detka@monogo.pl>
 */
class Visitor
{
    protected $config;

    /**
     * Logger constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Save plugin
     *
     * @param \Magento\Customer\Model\ResourceModel\Visitor $subject
     * @param callable                                      $proceed
     * @param AbstractModel                                 $object
     *
     * @return \Magento\Customer\Model\ResourceModel\Visitor
     */
    public function aroundSave(
        \Magento\Customer\Model\ResourceModel\Visitor $subject,
        callable $proceed,
        AbstractModel $object
    ): \Magento\Customer\Model\ResourceModel\Visitor {
        if ($this->config->getIsEnabled()) {
            if ($object->getSessionId()) {
                $converted = base_convert($object->getSessionId(), 36, 10);
                $object->setId($converted);
            }
            return $subject;
        }
        return $proceed($object);
    }
}
