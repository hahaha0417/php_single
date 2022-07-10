<?php

namespace hahaha;

use hahaha\config\application as config_application;

/*

use hahaha\function_base as function_base;
use hahaha\function_base as hahaha_function_base;

*/


class function_base
{
    use \hahaha\instance;

	/*

	*/
	public function Initial()
	{
		return $this;
    }

	/*

	*/
	public function Css($css)
	{
		return "<link rel=\"stylesheet\" href=\"{$css}\" type=\"text/css\" />";
    }

	/*

	*/
	public function Js($js)
	{
		return "<script type=\"text/javascript\" src=\"{$js}\"\>\</script>";
    }

	/*

	*/
	public function Url_Asset($asset)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/asset" . "/" . $asset . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/asset" . "/" . $asset . "?v=" . $config_application->version;
		}
	}

	/*

	*/
	public function Url_Image($image)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/image" . "/" . $image . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/image" . "/" . $image . "?v=" . $config_application->version;
		}
	}

	/*

	*/
	public function Url_File($file)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/file" . "/" . $file . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/file" . "/" . $file . "?v=" . $config_application->version;
		}
	}

	/*

	*/
	public function Url_Js($js)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/asset/js" . "/" . $js . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/asset/js" . "/" . $js . "?v=" . $config_application->version;
		}
	}

	/*

	*/
	public function Url_Css($css)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/asset/css" . "/" . $css . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/asset/css" . "/" . $css . "?v=" . $config_application->version;
		}
	}

	/*

	*/
	public function Url_Plugin($plugin)
	{
		$config_application = config_application::instance();
		
		if($config_application->debug) 
		{
			return "/asset/plugin" . "/" . $plugin . "?t=" . $config_application->time;
		} 
		else 
		{
			return "/asset/plugin" . "/" . $plugin . "?v=" . $config_application->version;
		}
	}
}