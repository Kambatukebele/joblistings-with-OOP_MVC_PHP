<?php
//Print with Print_r
function showPrint($stuff)
{
  echo "<pre>";
  print_r($stuff);
  echo "</pre>";
}
//Print with Var_Dump
function showDump($stuff)
{
  echo "<pre>";
  var_dump($stuff);
  echo "</pre>";
}
//Return Old Value
function old($key, $default = null)
{
  if (isset($_POST[$key])) {
    return $_POST[$key];
  }

  return $default;
}

//Redirect to another page
function Redirect($url)
{
  header("Location: " . ROOT . $url);
  die();
}

//TRANSFORM TEXTAREA CONTENT TO NORMAL TEXT WITH SPACE
function textAreatbr2nl($string)
{
  return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}

//PREVENT THE CONNECTION WITH NOT LOGGEDIN
function middleware($session)
{
  if(!isset($session))
  {
    Redirect("login_company");
  }
}