<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Template master page
 * @author Hien Nguyen
 * @copyright Copyright (c) 2011, Hien Nguyen
 * @modified : nguyennt <nguyen.nt1105@gmail.com>
 * @last-modified : phuoctd
 * @version 0.0.2
 */

class Template {

    private $masterPage = '';
    private $contentPages = array ( );
	private $__template = '';
	private $__title = '';
    private $CI = null;

    /**
     * @access public
     * @param string $masterPage Optional file to use as MasterPage.
     */
    public function __construct ($masterPage = '') {
        $this->CI = get_instance();
		$this->__template = $this->CI->config->item('template');
		$this->__title = $this->CI->config->item('title');
        if ( ! empty ( $masterPage )) {
            $this->setMasterPage ( $masterPage );
		}
    }
	
	/**
	* @access public
	* @param string $title // tittle to append
	*/
	public function appendTitle($title) {
		$this->__title .= $title; 
	}

    /**
     * @access public
     * @param string $masterPage File to use as MasterPage.
     */
    public function setMasterPage ( $masterPage ) {
        // Check if the supplied masterpage exists.
        if ( !file_exists(APPPATH . 'views/' . $this->__template . '/'. $masterPage . '.php' ))  {
            throw new Exception ( APPPATH . 'views/' . $this->__template . '/' . $masterPage . '.php' . ' Or ' . APPPATH . 'views/' . $masterPage . '.php');
		}
			
        $this->masterPage = $this->__template.'/'.$masterPage;

    }

    /**
     * @access public
     * @return string The current MasterPage.
     */
    public function getMasterPage ( ) {
        return $this->masterPage;
    }

    /**
     * @access public
     * @param string $file The view file to add.
     * @param string $tag The tag in the MasterPage it should match.
     * @param mixed $content The content to be used in the view file.
     */
    public function addContentPage ( $file, $tag, $data = array ()) {
		$data['template'] = $this->__template;
        $this->contentPages[$tag] = $this->CI->load->view ( $file, $data, true );
    }
    
	/**
	 * Add style sheet file
     * @access public
     * @param string $file The view file to add.
     * @param string $tag The tag in the MasterPage it should match.
     * @param mixed $content The content to be used in the view file.
     */
    public function addStyleSheet ( $file, $tag, $custom=false) {
    	$links = '';
    	if (is_array($file))
    	{
    		foreach ($file as $valueFile)
    		{
    			$links .= '<link rel="stylesheet" type="text/css" href="'.base_url().'icloud/assets/'.$this->__template.($custom == false?'/plugins/':'/').$valueFile.'"/>'."\n";
    		}
    	}
    	else
    	{
    		$links = '<link rel="stylesheet" type="text/css" href="'.base_url().'icloud/assets/'.$this->__template.($custom == false?'/plugins/':'/').$file.'"/>."\n"';
    	}
    	$this->contentPages[$tag] = $links;
    }
	
	/**
	 * Add style sheet file
     * @access public
     * @param string $file The view file to add.
     * @param string $tag The tag in the MasterPage it should match.
     * @param mixed $content The content to be used in the view file.
     */
    public function addJs ( $file, $tag, $custom = false) {
    	$links = '';
    	if (is_array($file))
    	{
    		foreach ($file as $valueFile)
    		{
    			$links .= '<script src="'.base_url().'icloud/assets/'.$this->__template.($custom == false?'/plugins/':'/').$valueFile.'" type="text/javascript"></script>'."\n";
    		}
    	}
    	else
    	{
    		$links = '<script src="'.base_url().'icloud/assets/'.$this->__template.($custom == false?'/plugins/':'/').$file.'" type="text/javascript"></script>'."\n";
    	}
    	$this->contentPages[$tag] = $links;
    }
	
	/**
	 * Add inline script js file
     * @access public
     * @param string $file The view file to add.
     * @param string $tag The tag in the MasterPage it should match.
     * @param mixed $content The content to be used in the view file.
     */
    public function addInlineJs ( $tag, $script) {
    	$this->contentPages[$tag] = '<script type="text/javascript">' . $script . ' </script>';
    }

    /**
     * @access public
     * @param array $content Optional content to be added to the MasterPage.
     */
    public function show ( $data = array ( ) ) {
        // Get the content of the MasterPage and replace all matching tags with their
        // respective view file content.
		$data['template'] = $this->__template;
		$data['title'] = $this->__title;
		$data['keywords'] = $this->CI->config->item('keywords');
		$data['description'] = $this->CI->config->item('description');
        $masterPage = $this->CI->load->view ( $this->masterPage, $data, true );
        foreach ( $this->contentPages as $tag => $content ) {   
            $masterPage = str_replace ( '<mp:'.strtolower($tag).'/>', $content, $masterPage );
        }

        // Finally, print the data.
        echo $masterPage;
    }
	
	/**
     * @access public
     * @param array $content Optional content to be added to the MasterPage.
     */
    public function getPartial ($page, $data = array() ) 
	{
		 if ( !file_exists(APPPATH . 'views/' . $this->__template . '/'. $page . '.php' )) {
            throw new Exception ( APPPATH . 'views/' . $this->__template . '/' . $page . '.php' . ' Or ' . APPPATH . 'views/' . $page . '.php');
		}
			
        $masterPage = $this->__template.'/'.$page;
        $masterPage = $this->CI->load->view ( $masterPage, $data, true );
        foreach ( $this->contentPages as $tag => $content ) {
            $masterPage = str_replace ( '<mp:' . ucfirst(strtolower($tag)) . '/>', $content, $masterPage );
        }

        // Finally, print the data.
        return $masterPage;
    }
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */