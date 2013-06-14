<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/***************************************************************************
* Detault Template: If template is not set, this will be taken as default  *
* template. To override this, use following functions:                     *
* 1. If extending KT_Controller                                            *
*    $this->setTemplate('name');                                           *
* 2. If extending CI_Controller or custom controller (Not recommended)     *
*    $this->load->library('ktemplate');                                    *
*    $this->ktemplate->setTemplate('name');                                *
****************************************************************************/
$config['ktemplate_default_template'] = 'ktdefault';

//Default layout name. Will be used what layout is not set.
//'.ktl' will be added at the end of layout to force '.ktl' extension for layout.
$config['ktemplate_default_layout'] = 'login';

$config['ktemplate_default_template_data'] = Array(
												'title' => 'Welcome to KAPsTop'
                                            );

$config['ktemplate_default_positions'] = Array('content');

$config['ktemplate_css_directory'] = 'styles';