<?php

class Assetic_Twig_Extensions extends Twig_Extension {

	
	public function getTokenParsers () {

		$factory = new Assetic\Factory\AssetFactory(Kohana::config('assetic.default.assetic_base_dir'));
		
		//$sass_filter = new Assetic\Filter\Sass\SassFilter();
		$yui_js_filter = new Assetic\Filter\Yui\JsCompressorFilter(Kohana::config('assetic.default.yui_comrpessor_path'));
		$yui_css_filter = new Assetic\Filter\Yui\CssCompressorFilter(Kohana::config('assetic.default.yui_comrpessor_path'));
		
		$filter_manager = new Assetic\FilterManager();
		//$filter_manager->set('sass', $sass_filter);
		$filter_manager->set('yui_js', $yui_js_filter);
		$filter_manager->set('yui_css', $yui_css_filter);
		$asset_manager = new Assetic\AssetManager();
		$factory->setAssetManager($asset_manager);
		$factory->setFilterManager($filter_manager);
		$extensions = new Assetic\Extension\Twig\AsseticExtension($factory);
		
		
		
		
		
		return $extensions->getTokenParsers();
	
	}
	
	/**
	 * @return string
	 * @author Julian Hille
	 */
	public function getName()
	{
		return 'assetic_twig';
	}
}