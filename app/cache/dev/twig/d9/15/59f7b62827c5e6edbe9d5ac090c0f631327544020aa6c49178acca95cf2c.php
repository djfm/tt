<?php

/* FMTTBundle:Project:show.html.twig */
class __TwigTemplate_d91559f7b62827c5e6edbe9d5ac090c0f631327544020aa6c49178acca95cf2c extends Twig_Template
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
        echo "    
                You are currently browsing project ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name"), "html", null, true);
        echo ". Here is a list of the packs available for translation contained in this project.
            </div>
        </div>
    </div>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        if (twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "packs"))) {
            // line 13
            echo "        <div class=\"row\">
            <div class=\"large-12 columns\">
                <p>There are no packs in this project yet!</p>
            </div>
        </div>
    ";
        } else {
            // line 19
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "packs"));
            foreach ($context['_seq'] as $context["_key"] => $context["pack"]) {
                // line 20
                echo "            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h2><a href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("packs_show", array("id" => $this->getAttribute((isset($context["pack"]) ? $context["pack"] : $this->getContext($context, "pack")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pack"]) ? $context["pack"] : $this->getContext($context, "pack")), "name"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pack"]) ? $context["pack"] : $this->getContext($context, "pack")), "version"), "html", null, true);
                echo "</a></h2>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pack'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "    ";
        }
        // line 27
        echo "
    <div class=\"row\">
        <div class=\"large-12 columns\">
            <form action=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projects_packs_new", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\"><button>Create a new Pack</button></form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FMTTBundle:Project:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 30,  84 => 27,  81 => 26,  67 => 22,  63 => 20,  58 => 19,  50 => 13,  47 => 12,  44 => 11,  35 => 5,  32 => 4,  29 => 3,);
    }
}
