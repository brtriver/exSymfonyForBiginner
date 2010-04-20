//---------------------------------//
// parameters
//---------------------------------//
access to request parameters.
<?php $sf_request->getParameter('name'); ?>

access to Raw parameter (not escaped)
<?php $sf_data->getRaw('name') ?>
or
<?php $form->getObject->getName(ESC_RAW)?>

access to user parameters.
<?php $condition = $sf_user->isAuthenticated(); ?>

access to sf_context.
// get this page's absolute url.
<?php $url = $sf_context::getInstance()->getController()->genUrl(array(), true) ?>

render date time with doctrine model
<?php echo $object->getDateTimeObject('created_at')->format('Y-m-d H:i:s') ?>

//---------------------------------//
// HTML
//---------------------------------//
change layout to 'newLayout.php' in the global template dir.
<?php decorate_with('newlayout')?>

add a new 'web/css/mystyle.css' style sheet file.
<?php use_stylesheet('mystyle.css')?>

add a new 'web/js/myjs.js' javascript file.
<?php use_stylesheet('myjs.css')?>

link tag
<?php echo link_to('click here', '@routing_name?name=' . $name) ?>
or
<a href="<?php echo url_for('@routing_name') ?>">click here</a>
open with a new window
<?php echo link_to('click here', 'http://example.com', array('popup' => true)) ?>

image tag(web/images/title.gif)
<?php echo image_tag('title.gif') ?>
or
<img src="<?php echo image_path('title.gif') ?>" />

//---------------------------------//
// partial, component, slot
//---------------------------------//
// partial, component
include this module's '_sample.php' template with $params.
<?php include_partial('sample', array('params' => $params)) ?>

include this global's '_header.php' template with $params.
<?php include_partial('global/header', array('params' => $params)) ?>

include this module's '_sample.php' template by calling the 'executeSample' component with $params.
<?php include_partial('sample', array('params' => $params)) ?>

// slot
define slot
<?php slot('navigation', 'HOME &gt; mypage') ?>
or
<?php slot('navigation') ?>
<span>HOME</span>
&gt;
<strong>mypage</strong>
<?php end_slot()?>

//---------------------------------//
// helper
//---------------------------------//
<?php use_helper('Debug') ?>

//---------------------------------//
//debug
//---------------------------------//
<?php use_helper('Debug') ?>
<?php log_message($message, 'debug'); //emerg, alert, crit, err, warning, notice, info, and debug ?>

//---------------------------------//
//sfForm
//---------------------------------//

render form table
<table>
<?php echo $form ?>
</table>

render form start tag with routing name.
<?php echo form_tag_for($form, '@job', array('method' => 'post')) ?>

render global errors.
<?php if ($form->hasGlobalErrors()): ?>
  <tr>
    <td colspan="4">
      <ul class="error_list">
        <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
          <li><?php echo $name.': '.$error ?></li>
        <?php endforeach; ?>
      </ul>
    </td>
  </tr>
<?php endif; ?>

render form errors to debug.
<?php echo $form->getErrorSchema() ?>

render form element
<?php echo $form['name']->render(array('class' => 'width: 200px')) ?>

render form label
<?php echo $form['name']->renderLabel() ?>

render form error
<?php echo $form['name']->renderError() ?>

render form hidden fields
<?php echo $form->renderHiddenFields() ?>
