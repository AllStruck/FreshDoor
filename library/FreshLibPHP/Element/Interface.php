<?php
/**
 * FreshLibPHP API Element Interface
 *
 *
 * @package    FreshLibPHP

 * @copyright  GPL AllStruck, David Monaghan copyright@allstruck.com | Milan Rukavina, rukavinamilan@gmail.com
 * @version    1.0
 */

interface FreshLibPHP_Element_Interface
{
/**
 * return XML data
 */ 
	public function asXML();
/**
 * load XML string
 */ 
	public function loadXML($xml);
}
