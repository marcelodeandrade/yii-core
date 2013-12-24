<?php

namespace yiiunit\extensions\authclient;

use yii\authclient\OpenId;

class OpenIdTest extends TestCase
{
	protected function setUp()
	{
		$config = [
			'components' => [
				'request' => [
					'hostInfo' => 'http://testdomain.com',
					'scriptUrl' => '/index.php',
				],
			]
		];
		$this->mockApplication($config, '\yii\web\Application');
	}

	// Tests :

	public function testSetGet()
	{
		$client = new OpenId();

		$trustRoot = 'http://trust.root';
		$client->setTrustRoot($trustRoot);
		$this->assertEquals($trustRoot, $client->getTrustRoot(), 'Unable to setup trust root!');

		$returnUrl = 'http://return.url';
		$client->setReturnUrl($returnUrl);
		$this->assertEquals($returnUrl, $client->getReturnUrl(), 'Unable to setup return URL!');
	}

	/**
	 * @depends testSetGet
	 */
	public function testGetDefaults()
	{
		$client = new OpenId();

		$this->assertNotEmpty($client->getTrustRoot(), 'Unable to get default trust root!');
		$this->assertNotEmpty($client->getReturnUrl(), 'Unable to get default return URL!');
	}
}