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

/* main.html */
class __TwigTemplate_22b343623a03d6d37e9c113c6abc3d7a64cad2f5bcdd6780fb275ad21e168a9a extends \Twig\Template
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
        echo "<!DOCTYPE html>
<head>
\t<title>";
        // line 3
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
\t<meta charset=\"UTF-8\">

\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["Vue_href_dev"] ?? null), "html", null, true);
        echo "\"></script>

\t<link href=\"https://fonts.googleapis.com/css?family=Kulim+Park&display=swap\" rel=\"stylesheet\">\t
\t<link href=\"https://fonts.googleapis.com/css?family=Montserrat:500&display=swap\" rel=\"stylesheet\">

\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/public/css/main.css\">
</head>
<body>
\t<div id=\"app\">
\t\t<header>
\t\t\t<center><h1 v-bind:title=\"data_last_update\" id=\"grappy_h1\">";
        // line 16
        echo twig_escape_filter($this->env, ($context["h1"] ?? null), "html", null, true);
        echo "</h1></center>
\t\t</header>
\t\t<main>
\t\t\t<center><p v-on:click=\"opacityGrappy\" v-if=\"seen\" >";
        // line 19
        echo twig_escape_filter($this->env, ($context["it_work"] ?? null), "html", null, true);
        echo "!</p></center>
\t\t</main>
\t\t<footer>
\t\t\t";
        // line 22
        if ((($context["version"] ?? null) == "0.6.0")) {
            // line 23
            echo "\t\t\t\t<p align=\"center\">This resource powered by GrappyEngine v";
            echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
            echo "<p>
\t\t\t";
        } else {
            // line 25
            echo "\t\t\t\t<p>Your grappy is out of date, please install the latest, current version</p>
\t\t\t\t<a href=\"https://github.com/Phpesher/Grappy\">Download</a>
\t\t\t";
        }
        // line 28
        echo "\t\t\t<br>
\t\t\t<h3>< Components info: ></h3>
\t\t\t<p>Data Base data: ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["db_data"] ?? null), 0, []), "name", []), "html", null, true);
        echo "</p>
\t\t\t<p>Vue answer: \${ vue_answer }</p>
\t\t</footer>
\t</div>
\t<img id=\"grappy_logo\" src=\"https://i.ibb.co/nbWvmPb/Grappy-Logo.png\" alt=\"Grappy-Logo\">
\t<script src=\"/public/js/main.js\"></script>
</body>";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 30,  78 => 28,  73 => 25,  67 => 23,  65 => 22,  59 => 19,  53 => 16,  40 => 6,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "main.html", "C:\\OSPanel\\domains\\GrappyEngine\\public\\temp\\main.html");
    }
}
