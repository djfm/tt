<?php

/* FMTTBundle:Pack:_import.html.twig */
class __TwigTemplate_4165f8d249de4e26022aa1aae505baa3bf34408cd1fa98703f8765cdefead5ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"row\">
    <div class=\"large-12 columns\">
        <h2>Import Translations</h2>
        <form enctype=\"multipart/form-data\" method=\"POST\" action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("packs_import", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
            <label for=\"source\">Source File</label>
            <input required id=\"source\" name=\"source\" type=\"file\"></input>
            <span class=\"field-error\">";
        // line 7
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "source", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "source"), "")) : ("")), "html", null, true);
        echo "</span>

            <div class=\"row\">
                 <div class=\"large-4 columns\">
                    <div class=\"row\">
                        <div class=\"large-12 columns\">
                            <label for=\"domain\">Text Domain</label>
                            <input required id=\"domain\" name=\"domain\" type=\"text\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "domain", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "domain"), "")) : ("")), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"large-12 columns\">
                            <span class=\"field-error\">";
        // line 17
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "domain", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "domain"), "")) : ("")), "html", null, true);
        echo "</span>
                        </div>
                    </div>
                </div>
                <div class=\"large-4 columns\">
                    <div class=\"row\">
                        <div class=\"large-12 columns\">
                            <label for=\"source_locale\">Source Locale</label>
                            <input required id=\"source_locale\" name=\"source_locale\" type=\"text\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "source_locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "source_locale"), "")) : ("")), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"large-12 columns\">
                            <span class=\"field-error\">";
        // line 28
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "source_locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "source_locale"), "")) : ("")), "html", null, true);
        echo "</span>
                        </div>
                    </div>
                </div>
                <div class=\"large-4 columns\">
                     <div class=\"row\">
                        <div class=\"large-12 columns\">
                            <label for=\"target_locale\">Target Locale</label>
                            <input required id=\"target_locale\" name=\"target_locale\" type=\"text\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "target_locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "target_locale"), "")) : ("")), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"large-12 columns\">
                            <span class=\"field-error\">";
        // line 39
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "target_locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "target_locale"), "")) : ("")), "html", null, true);
        echo "</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <label for=\"use_messages_yes\">Import Messages</label>
                    <input type=\"radio\" name=\"use_messages\" id=\"use_messages_yes\" value=\"1\" ";
        // line 47
        if (((($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "use_messages", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "use_messages"), "0")) : ("0")) == 1)) {
            echo "checked";
        }
        echo ">
                    <label for=\"use_messages_yes\">Yes</label>
                    <input type=\"radio\" name=\"use_messages\" id=\"use_messages_no\" value=\"0\" ";
        // line 49
        if (((($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "use_messages", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["values"]) ? $context["values"] : null), "use_messages"), "0")) : ("0")) == 0)) {
            echo "checked";
        }
        echo ">
                    <label for=\"use_messages_no\">No</label>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <span class=\"hint\">
                        If you choose to import messages, the messages will be added to this pack's messages. Otherwise only the translations will be imported. In both cases translations are imported.
                    </span>
                </div>
            </div>
           
            <button>Import</button>
        </form>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FMTTBundle:Pack:_import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 49,  91 => 47,  80 => 39,  74 => 36,  63 => 28,  57 => 25,  46 => 17,  40 => 14,  30 => 7,  24 => 4,  19 => 1,);
    }
}
