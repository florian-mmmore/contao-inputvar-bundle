<?php
/**
 * Created by PhpStorm.
 * User: thomasvoggenreiter
 * Date: 02.11.17
 * Time: 15:41
 */

namespace Dreibein\InputvarBundle;

use Dreibein\InputvarBundle\DependencyInjection\InputvarExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DreibeinInputvarBundle extends Bundle
{
    /**
     * @return InputvarExtension|null|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getContainerExtension()
    {
        return new InputvarExtension();
    }
}
