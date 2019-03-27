<?php

use Behat\Behat\Context\Context;

/**
 * Defines Oracle server features from the specific context.
 */
class OracleContext implements Context 
{
   /**
    * Initializes context.
    */
    public function __construct()
    {
    }

    /**
     * @Then I could do a select
     */
    public function iCouldDoASelect()
    {
	$resource = oci_connect('ORACLE', 'ORACLE', '0.0.0.0/XE');
	$query = oci_parse($resource, 'SELECT 40+2 FROM dual');
	$result = oci_execute($query);

	if(!$result)
	{
		throw new Exception("Select failed");	
	}
    } 

}
 
