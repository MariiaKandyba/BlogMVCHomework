<?php
class View
{
    function generate($content_view, $template_view, $data = null)
    {
        if ($template_view != null)
            include 'application/views/' . $template_view;
        else
            include 'application/views/' . $content_view;
    }
}
