<?php
class user_html5_kickstart {

  public function replaceContent(&$params, &$obj) {
    // short charset meta-tag
    $search = '/http-equiv=\"Content-Type\" content=\"text\/html; charset=(.+?)\"/';
    $replace = 'charset="${1}"';
    $params['pObj']->content = preg_replace($search, $replace, $params['pObj']->content);

    // remove the type="text/css" for stylesheets
    $search = '/<link rel=\"stylesheet\"(.+?) href=\"(.+?)\"(.+?)\/?>/';
    $replace = '<link rel="stylesheet" href="${2}" />';
    $params['pObj']->content = preg_replace($search, $replace, $params['pObj']->content);

    // remove every type-attribute for scripts
    $search = '/<script(.+?) type=\"text\/javascript\"(.+?)>/';
    $replace = '<script${1}${2}>';
    $params['pObj']->content = preg_replace($search, $replace, $params['pObj']->content);

    // inline script-tags
    $search = '<script type="text/javascript">';
    $replace = '<script>';
    $params['pObj']->content = str_replace($search, $replace, $params['pObj']->content);

    // conditional comments for ie7 and ie8
    $search = '/<html (.+?)>/';
    $replace = '<!--[if lt IE 8]> <html class="no-js lt-ie8" ${1}> <![endif]-->' . "\n"
             . '<!--[if IE 8]> <html class="no-js ie8" ${1}> <![endif]-->' . "\n"
             . '<!--[if gt IE 8]><!--> <html class="no-js" ${1}> <!--<![endif]-->';
    $params['pObj']->content = preg_replace($search, $replace, $params['pObj']->content);
  }

  public function noCache(&$params, &$obj) {
    if (!$GLOBALS['TSFE']->isINTincScript()) { // If there are no INTincScripts to include
      return; // stop
    }
    $this->replaceContent($params, $obj); // call main replace function
  }

  public function cache(&$params, &$obj) {
    if ($GLOBALS['TSFE']->isINTincScript()) { // If there are any INTincScripts to include
      return; // stop
    }
    $this->replaceContent($params, $obj); // call main replace function
  }
}
?>
