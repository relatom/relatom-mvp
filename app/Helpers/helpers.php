<?php

/**
 *
 * Set active css class if the specific URI is current URI
 *
 * @param string $path       A specific URI
 * @param string $class_name Css class name, optional
 * @return string            Css class name if it's current URI,
 *                           otherwise - empty string
 */
if (! function_exists('setActive')) {

	function setActive(string $name, string $class_name = "is-active")
	{
	    return  Route::currentRouteName() === $name ? $class_name : "";
	    //return Request::path() === $path ? $class_name : "";
	}
}

if(! function_exists('setActiveBySegments')) {
	function setActiveBySegments(string $name, string $class_name = "is-active")
	{
		$first = explode('.', Route::currentRouteName())[0];

		return $first === $name ? $class_name : "";
	}
}