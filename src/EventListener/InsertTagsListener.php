<?php

declare(strict_types=1);

namespace Dreibein\InputvarBundle\EventListener;

use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Contao\Input;
use Contao\System;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class InsertTagsListener
 * @package Dreibein\AppBundle\EventListener
 */
class InsertTagsListener
{
    /**
     * @var ContaoFrameworkInterface $framework
     */
    private $framework;

    /**
     * @var array $allowedTags
     */
    private $allowedTags = [
        'get',
        'post',
        'cookie'
    ];

    /**
     * InsertTagsListener constructor.
     *
     * @param ContaoFrameworkInterface $framework
     */
    public function __construct(ContaoFrameworkInterface $framework)
    {
        $this->framework = $framework;
    }

    /**
     * @param $tag
     *
     * @return bool|string
     */
    public function onReplaceInsertTags($tag)
    {
        $tags = explode('::', $tag);
        $key = strtolower($tags[0]);
        if ('inputvar' === $key && \in_array($tags[1], $this->allowedTags, true)) {
            return $this->replaceInsertTags($tags[1], $tags[2]);
        }
        return false;
    }

    /**
     * @param string $tag
     * @param string $value
     *
     * @return string
     */
    private function replaceInsertTags(string $tag, string $value): string
    {
        $this->framework->initialize();

        switch ($tag) {
            case 'get':
                $return = Input::get($value);
                if (\is_array($return)) {
                    $return = serialize($return);
                }
                break;
            case 'post':
                $return = Input::post($value);
                if (\is_array($return)) {
                    $return = serialize($return);
                }
                break;
            case 'cookie':
                /** @var SessionInterface $session */
                $session = System::getContainer()->get('session');

                $return = $session->get($value);
                if (\is_array($return)) {
                    $return = serialize($return);
                }
                break;
            default:
                $return = '';
        }
        if ($return === null) {
            $return = '';
        }
        return $return;
    }
}
