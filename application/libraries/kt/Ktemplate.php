<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ktemplate {
	//Used to hold template directory
	private $template;
    
    //Used to hold layout within template
    private $layout;
    
    //CodeIgniter instance
    private $CI;
    
    //Template data, loaded through config file
    private $templateData;
    
    //Again template data but overridden by controller. This will be actually passed to views.
    private $viewData;
    
    //An array to hold placeholder html
    private $placeHolder;
    
    //CSS files to be included.
    private $css;

	/**
    * Constructor: Initilizing key variables from config files
    */
	function __construct($template=NULL) {
    	//Get CI instance, if needed
        $this->CI = &get_instance();
        
        //Load config file
        $this->CI->load->config('ktemplate',TRUE);
        
        $this->viewData = Array();
        $this->css = Array();
        $this->placeHolder = Array();
        
        $this->setDefaultTemplateData();
        
        $this->setEmptyPlaceHolders();
    }
    
    public function render(){
    	$this->addTemplateData();
        $this->addTemplateCSS();
        $this->viewData['placeHolder'] = $this->placeHolder;
    	$this->CI->load->view($this->layout, $this->viewData);
    }
    
    public function renderPlaceHolder($placeHolder, $view) {
    	$viewPath = $this->getTemplate().'/view/'.$view.'.ktv';
        $this->addTemplateData();
    	$this->placeHolder[$placeHolder] = $this->CI->load->view($viewPath,$this->viewData,TRUE);
    }
    
    private function setEmptyPlaceHolders() {
    	$configPlaceHolders = $this->CI->config->item('ktemplate_default_placeholder','ktemplate');
        
        foreach($configPlaceHolders as $value) {
        	$this->placeHolder[$value] = "";
        }
    }
    
    private function addTemplateCSS() {
    	$this->viewData['css'] = $this->getCSS(TRUE);
    }
    
    private function addTemplateData(){
    	$this->viewData = array_merge($this->viewData, $this->templateData);
    }
    
    private function setDefaultTemplateData(){
    	//Set template from config
        $this->template = 'template/'.$this->CI->config->item('ktemplate_default_template','ktemplate');
        
        //Set Layout from config
        $this->layout = $this->template.'/'.$this->CI->config->item('ktemplate_default_layout','ktemplate').'.ktl';
        
        //Setting template data from config
    	$this->templateData = $this->CI->config->item('ktemplate_default_template_data','ktemplate');
        if( ! is_array($this->templateData)) {
        	$this->templateData = Array();
        }
    }
    
    /**
    * Set Template
    */
    public function setTemplate($template) {
    	//TODO: Check if template directory and template files within that exist.
        
        $this->template_directory = 'template/'.$template;
    }
    
    /**
    * Get Template. 
    */
    public function getTemplate() {
    	//TODO: Check if template exist
        
        return $this->template_directory;
    }
    
    /**
    * Set Layout
    */
    public function setLayout($layout) {
    	$this->layout = $this->template.'/layout/'.$layout.'.ktl';
    }
    
    /**
    * Get Layout
    */
    public function getLayout() {
    	$layoutArray = split(".", $this->layout);
        return $layoutArray[0];
    }
    
    /**
    * Set template data.
    * You can either pass two string parameters as key and value to set one record item at a time or
    * an associative array to set multiple records at once.
    * Any record set through setTemplateData will be available in view as $key.
    * @return boolean (TRUE or FALSE) based on data saved as template data or not.
    */
    public function setTemplateData($data,$value=NULL) {
    	if(is_array($data) && $value===NULL) {
        	$this->templateData = array_merge($this->templateData,$data);
            return TRUE;
        }
        if (is_string($data) && is_string($value)) {
    		$this->templateData[$data] = $value;
            return TRUE;
        }
        return FALSE;
    }
    
    /**
    * Get Template data
    */
    public function getTemplateData($data) {
    	return isset($this->templateData[$data])?$this->templateData[$data]:$this->CI->config->item('ktemplate_undefined','ktemplate');
    }
    
    /**
    * Show template data
    */
    public function renderTemplateData($data) {
    	echo $this->getTemplateDate($data);
    }
    
    /**
    * Add CSS
    */
    public function addCSS($css) {
    	if(is_array($css)) {
        	//ToDo: Isn't it better to use array merge?
        	foreach($css as $cssfile) {
            	//ToDo: Check if file exist
            	array_push($this->css,$cssfile);
            }
        } else {
        	//ToDo: check if file exist
        	array_push($this->css,$css);
        }
    }
    
    public function getCSS($rendered = FALSE){
    	if($rendered) {
        	$cssArray = $this->css;
            $cssRenderedArray = Array();
            foreach($cssArray as $css) {
            	$cssParsed = $this->getTemplate().'/'.$this->CI->config->item('ktemplate_css_directory','ktemplate').'/'.$css.'.css';
                array_push($cssRenderedArray,$cssParsed);
            }
            return $cssRenderedArray;
        }
        return $this->css;
    }
}