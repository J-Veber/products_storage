<?php

  class View {
    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    public function generate($content_view, $template_view, $data = null) {
      include '../views/' . $template_view;
    }
  }