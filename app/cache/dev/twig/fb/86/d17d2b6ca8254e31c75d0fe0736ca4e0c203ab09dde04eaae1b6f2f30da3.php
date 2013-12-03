<?php

/* FMTTBundle:Pack:show.html.twig */
class __TwigTemplate_fb86d17d2b6ca8254e31c75d0fe0736ca4e0c203ab09dde04eaae1b6f2f30da3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'context' => array($this, 'block_context'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_context($context, array $blocks = array())
    {
        // line 4
        echo "    This is the pack <strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name"), "html", null, true);
        echo "</strong>, version <strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "version"), "html", null, true);
        echo "</strong>, of project <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projects_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "project"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "project"), "name"), "html", null, true);
        echo "</a>.
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        $this->env->loadTemplate("FMTTBundle:Pack:_import.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "FMTTBundle:Pack:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  45 => 7,  32 => 4,  29 => 3,);
    }
}
