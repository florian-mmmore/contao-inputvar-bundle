<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 19.11.18
 * Time: 11:50
 */

namespace Dreibein\InputvarBundle\Resources\contao\config;

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = ['input_var.listener.insert_tags', 'onReplaceInsertTags'];
