<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* main.html.twig */
class __TwigTemplate_7358a249c2f5281102744061a4213f5cfc0c8be9847f4027860150eda048c9b8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"/public/css/main.css\">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>Lamantin Framework | Main</title>
    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\">
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    ";
        // line 24
        if ((call_user_func_array($this->env->getFunction('auth')->getCallable(), []) == true)) {
            // line 25
            echo "        <div class=\"top-right links\">
            <a href=\"/home\">Home</a>
        </div>
    ";
        } else {
            // line 29
            echo "        <div class=\"top-right links\">
            <a href=\"/login\">Login</a>
            <a href=\"/register\">Register</a>
        </div>
    ";
        }
        // line 34
        echo "    <div class=\"content\">
        <div class=\"title m-b-md\">
            Lamantin Framework
        </div>
    </div>
    <p>&nbsp;&nbsp;&nbsp;v1.0.0</p>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 34,  63 => 29,  57 => 25,  55 => 24,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"/public/css/main.css\">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>Lamantin Framework | Main</title>
    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\">
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    {% if auth() == true %}
        <div class=\"top-right links\">
            <a href=\"/home\">Home</a>
        </div>
    {% else %}
        <div class=\"top-right links\">
            <a href=\"/login\">Login</a>
            <a href=\"/register\">Register</a>
        </div>
    {% endif %}
    <div class=\"content\">
        <div class=\"title m-b-md\">
            Lamantin Framework
        </div>
    </div>
    <p>&nbsp;&nbsp;&nbsp;v1.0.0</p>
</div>
</body>
</html>", "main.html.twig", "G:\\OSPanel\\domains\\Lamantin\\public\\views\\main.html.twig");
    }
}
