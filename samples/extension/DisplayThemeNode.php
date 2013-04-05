<?php

class DisplayThemeNode extends \Twig_Node
{
    public function __construct(Twig_NodeInterface $resources, $lineno, $tag = null)
    {
        parent::__construct(array('resources' => $resources), array(), $lineno, $tag);
    }

    public function compile(Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$this->env->getExtension(\'display\')->addThemes(')
            ->subcompile($this->getNode('resources'))
            ->raw(");\n");
        ;
    }
}
