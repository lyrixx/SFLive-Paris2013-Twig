<?php

class DisplayExtension extends \Twig_Extension
{
    private $themes;

    public function __construct(array $themes = array())
    {
        $this->themes = $themes;
    }

    public function getTokenParsers()
    {
        return array(
            // {% display_theme "my_themes.html.twig" %}
            new DisplayThemeTokenParser(),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'display_menu',
                array($this, 'displayMenu'),
                array('needs_environment' => true, 'is_safe' => array('html'))
            ),
            new \Twig_SimpleFunction(
                'display_*',
                array($this, 'displayBlock'),
                array('needs_environment' => true, 'is_safe' => array('html'))
            ),
        );
    }

    public function displayMenu(\Twig_Environment $env, $page = null)
    {
        // Do what you need HERE.

        return $this->displayBlock($env, 'menu', array('page' => $page));
    }

    public function displayBlock(\Twig_Environment $env, $block, $parameters = array())
    {
        foreach ($this->themes as $theme) {
            if ($theme instanceof \Twig_Template) {
                $template = $theme;
            } else {
                $template = $env->loadTemplate($theme);
            }
            if ($template->hasBlock($block)) {
                return $template->renderBlock($block, $parameters);
            }
        }

        throw new \InvalidArgumentException('Unable to find block '.$block);
    }

    public function addThemes($themes)
    {
        $themes = reset($themes);
        $themes = is_array($themes) ? $themes : array($themes);
        $this->themes = array_merge($themes, $this->themes);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'display';
    }
}
