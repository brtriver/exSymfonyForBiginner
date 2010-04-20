<?php

/**
 * ##MODULE_NAME## sample actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ##MODULE_NAME##
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ##MODULE_NAME##Actions extends sfActions
{
  public function preExecute()
  {
    // code here
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // default
    return sfView::SUCCESS;
    // not return template but render text
    return $this->renderText('message here');
  }
  private function __sampleCode()
  {
    // for debug
    $this->logMessage($message, 'debug'); // emerg, alert, crit, err, warning, notice, info, and debug

    // get Rouging object
    $object = $this->getRoute()->getObject();
    
    // with form
    $this->form = new HogeForm($object);
    $this->form->bind($request->getParameter('hoge'));
    if ($this->form->isValid()) {
      // code here
      $name = $this->form->getValue('name');
    }
    $widget = $this->form['name']->getWidget();
    
    // use Request Parameter
    $name = $request->getParameter('name', 'default_value');
    $all_parameters = $request->getParameterHolder()->getAll();
    $condition = $request->isMethod('post'); // if request method is 'post', return true.
    
    // set template
    $this->setTemplate('new'); // render 'newSuccess.php' instead of 'indexSuccess.php'
    
    // use session
    $this->getUser()->setAttribute('name', 'value');
    $condition = $this->getUser()->hasAttriute('error');
    $name = $this->getUser()->getAttribute('name', 'default_value');
    $condition = $this->getUser()->isAuthenticated();
    
    // use flash
    $this->getUser()->setFlash('error', 'error is occured!');
    $condition = $this->getUser()->hasFlash('error');  
    $name = $this->getUser()->getFlash('error');   
    
    // forward
    $this->forward('module', 'action');
    $this->forwardIf($condition, 'module', 'action'); // if $condition is true, forwarding to 'module/action'
    $this->forward404If($condition, 'message'); // if $condition is true, forwarding to the 404 page
    
    // redirect
    $this->redirect('@routing_name');
    $this->redirect('module/action');
    $this->redirectIf($condition, '@routing_name');
    $this->redirect404If($condition, '@routing_name');
    
    // call Doctrine
    $result = Doctrine_Core::getTable('ModelName')->find('id');
    $q = Doctrine_Query::create()->from('ModelName');
    
    // access to Global Parameters
    $request->getMethod() 	      // $_SERVER['REQUEST_METHOD']
    $request->getUri() 	          // $_SERVER['REQUEST_URI']
    $request->getReferer() 	      // $_SERVER['HTTP_REFERER']
    $request->getHost() 	        // $_SERVER['HTTP_HOST']
    $request->getLanguages() 	    // $_SERVER['HTTP_ACCEPT_LANGUAGE']
    $request->getCharsets() 	    // $_SERVER['HTTP_ACCEPT_CHARSET']
    $request->isXmlHttpRequest() 	// $_SERVER['X_REQUESTED_WITH'] == 'XMLHttpRequest'
    $request->getHttpHeader() 	  // $_SERVER
    $request->getCookie() 	      // $_COOKIE
    $request->isSecure() 	        // $_SERVER['HTTPS']
    $request->getFiles() 	        // $_FILES
    $request->getGetParameter() 	// $_GET
    $request->getPostParameter() 	// $_POST
    $request->getUrlParameter() 	// $_SERVER['PATH_INFO']
    $request->getRemoteAddress() 	// $_SERVER['REMOTE_ADDR']
    
    // add a new parameter to RequestParameter
    $request->addRequestParameters(array('new_key' => 'new_value'));
  }
}
