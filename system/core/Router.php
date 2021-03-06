<?php

class Router {

	private static $routes = array();
	public static $controller;
	public static $controller_dir;

	function __construct(){}
	
	static function connect( $url_pattern, $controller ) {
		self::$routes[$url_pattern] = $controller;
	}

	static function route( $request ) {
		foreach( self::$routes as $url_pattern => $controller ) {
			if ( preg_match( $url_pattern, $request, $url_data ) ) {
				$request = new Request( $request );
				self::$controller = $controller;
				preg_match_all( '~P<(.*?)>~', $url_pattern, $url_vars );
				foreach ( $url_vars[1] as $var ) {
					if ( isset( $url_data[$var] ) ) {
						$request->setParam( $var, $url_data[$var] );
					}
				}
				return $request;
			}
		}

	}
	
}