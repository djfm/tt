<?php

/* ::base.html.twig */
class __TwigTemplate_9d1e9c981c69f2340818e64c876798b8207f6f32434438575cca112ea008df9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'context' => array($this, 'block_context'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e3025dc_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3025dc_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/e3025dc_normalize_1.css");
            // line 11
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
            // asset "e3025dc_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3025dc_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/e3025dc_foundation_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
            // asset "e3025dc_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3025dc_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/e3025dc_main_3.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
        } else {
            // asset "e3025dc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3025dc") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/e3025dc.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
        }
        unset($context["asset_url"]);
        // line 13
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <nav class=\"top-bar docs-bar hide-for-small\" data-topbar=\"\">
          <ul class=\"title-area\">
            <li class=\"name\">
              <h1><a href=\"http://tt.fmdj.fr\">TT</a></h1>
            </li>
          </ul>
        <section class=\"top-bar-section\">
            <ul class=\"left\">
              <li class=\"divider\"></li>
              <li class=\"\">
                <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("projects");
        echo "\" class=\"\">Projects</a>
              </li>
              <li class=\"divider\"></li>
            </ul>
          </section>
        </nav>
        <div class=\"row\">
            <div class=\"large-12 columns\">
                <div class=\"context-info\">
                    ";
        // line 36
        $this->displayBlock('context', $context, $blocks);
        // line 37
        echo "                </div>
            </div>
        </div>
        ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        echo "            
        ";
        // line 41
        $this->displayBlock('javascripts', $context, $blocks);
        // line 42
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 36
    public function block_context($context, array $blocks = array())
    {
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
    }

    // line 41
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 41,  131 => 40,  126 => 36,  121 => 13,  115 => 5,  109 => 42,  107 => 41,  103 => 40,  98 => 37,  96 => 36,  84 => 27,  67 => 14,  64 => 13,  38 => 11,  34 => 6,  30 => 5,  24 => 1,);
    }
}
