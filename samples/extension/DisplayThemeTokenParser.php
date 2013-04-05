<?php

class DisplayThemeTokenParser extends \Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $resources = new Twig_Node_Expression_Array(array(), $stream->getCurrent()->getLine());
        do {
            $resources->addElement($this->parser->getExpressionParser()->parseExpression());
        } while (!$stream->test(Twig_Token::BLOCK_END_TYPE));

        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new DisplayThemeNode($resources, $lineno, $this->getTag());
    }

    public function getTag()
    {
        return 'display_theme';
    }
}
