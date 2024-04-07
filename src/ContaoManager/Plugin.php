<?php
/**
 * Created by PhpStorm.
 * User: thomasvoggenreiter
 * Date: 02.11.17
 * Time: 15:39
 */

namespace Dreibein\InputvarBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Dreibein\InputvarBundle\DreibeinInputvarBundle;

/**
 * Class Plugin
 * @package ContaoManager
 */
class Plugin implements BundlePluginInterface
{
    /**
     * @param ParserInterface $parser
     * @return array
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(DreibeinInputvarBundle::class)->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
