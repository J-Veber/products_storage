<?php

  class View {
    public function generate($content_view, $template_view, $data = null) {
      include dirname(__DIR__) . '\views\\' . $template_view;
    }
  }