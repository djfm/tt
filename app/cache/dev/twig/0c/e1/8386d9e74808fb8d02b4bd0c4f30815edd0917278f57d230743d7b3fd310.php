<?php

/* FMTTBundle:Pack:new.html.twig */
class __TwigTemplate_0ce18386d9e74808fb8d02b4bd0c4f30815edd0917278f57d230743d7b3fd310 extends Twig_Template
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
        echo "You are creating a new pack for project <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projects_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "project"), "id"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "project"), "name"), "html", null, true);
        echo "</a>
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    \t<div class=\"large-12 columns with-margin-top\">
    \t\t";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
    \t</div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FMTTBundle:Pack:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  44 => 8,  41 => 7,  32 => 4,  29 => 3,);
    }
}
