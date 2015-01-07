<?php
/*
	This is a Full Featured CMS for all.
	You may also have problems with this. Please report issues. we will fix that soon.
	Copyright (C) 2015  AmirHosein.L Email:AmirOperator@gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
class SOAPRegistration
{
	protected $messages;
	protected $soap;
	
	public $soap_ip;
	public $soap_port;
	public $soap_user;
	public $soap_pass;
	
	public function __construct($soap_ip, $soap_port, $soap_user, $soap_pass)
	{
		try
		{
				$this->soapConnect();
				$this->soapCommand('');
		}
		catch (Exception $e)
		{
			$this->messages = $e;
		}
	}
	
	protected function soapConnect()
	{
		$this->soap = new SoapClient(NULL, Array(
			'location'=> 'http://'. $soap_ip .':'. $soap_port .'/',
			'uri' => 'urn:TC',
			'login' => $soap_user,
			'password' => $soap_pass,
		));
	}
	
	protected function soapCommand($command)
	{
		$result = $this->soap -> executeCommand(new SoapParam($command, 'command'));
		$this->messages = $result;
		return true;
	}
	
	public function getMessages()
	{
		return $this->messages;
	}
}