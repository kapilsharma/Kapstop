<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KT_Controller extends CI_Controller {
	protected $layout = 'layout';
    public $ktemp;
    
	function __construct() {
		parent::__construct();
        
        //Load Template Library.
        $this->load->helper('html');
        
        $this->load->library('kt/Ktemplate');
    }
    
    //Ktemplate wrappers
    protected function setTemplate($template) {
    	$this->ktemplate->setTemplate($template);
    }
    
    protected function getTemplate() {
    	return $this->ktemplate->getTemplate();
    }
    
    protected function setLayout($layout) {
    	$this->ktemplate->setLayout($layout);
    }
    
    protected function getLayout() {
    	return $this->ktemplate->getLayout();
    }
    
    protected function setTemplateData($data,$value=NULL) {
    	$this->ktemplate->setTemplateData($data,$value);
    }
    
    protected function getTemplateData($data) {
    	return $this->ktemplate->getTemplateData($data);
    }
    
    protected function renderTemplateData($data) {
    	$this->renderTemplateData($data);
    }
    
    protected function addCSS($css){
    	$this->ktemplate->addCSS($css);
    }
    
    protected function render(){
    	$this->ktemplate->render();
    }
    
    /**protected function render($content) {
		$view_data = array(
			'content' => $content
    	);
		$this->load->view($this->layout,$view_data);
	}*/
}
