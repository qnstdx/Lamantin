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

/* home.html.twig */
class __TwigTemplate_3aa7bdccefcfc4099c8f9b2bac64f904c30aa13728f59dddc3354d98c358ae27 extends \Twig\Template
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
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\">
    <title>Lamantin Framework | Home</title>
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    <div class=\"content\">
        <div class=\"top-right links\">
            <a href=\"/logout\">logout</a>
        </div>
        <div class=\"m-b-md\">
            <h2>Hello, ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "username", []), "html", null, true);
        echo "</h2>
        </div>
    </div>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 19,  30 => 1,);
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
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\">
    <title>Lamantin Framework | Home</title>
</head>
<body>
<div class=\"flex-center position-ref full-height\">
    <div class=\"content\">
        <div class=\"top-right links\">
            <a href=\"/logout\">logout</a>
        </div>
        <div class=\"m-b-md\">
            <h2>Hello, {{ data.username }}</h2>
        </div>
    </div>
</div>
</body>
</html>", "home.html.twig", "G:\\OSPanel\\domains\\Lamantin\\public\\views\\home.html.twig");
    }
}
