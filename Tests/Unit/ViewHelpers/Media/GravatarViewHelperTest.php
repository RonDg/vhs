<?php
namespace FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\Media;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\AbstractViewHelperTest;

/**
 * @protection off
 * @author Juan Manuel Vergés Solanas <juanmanuel@vergessolanas.es>
 * @package Vhs
 * @subpackage ViewHelpers\Media
 */
class GravatarViewHelperTest extends AbstractViewHelperTest {

	/**
	 * @var array
	 */
	protected $arguments = array(
		'email' => 'juanmanuel.vergessolanas@gmail.com',
		'secure' => FALSE,
	);

	/**
	 * @test
	 */
	public function generatesExpectedImgForEmailAddress() {
		$expectedSource = 'http://www.gravatar.com/avatar/b1b0eddcbc4468db89f355ebb9cc3007';
		preg_match('#src="([^"]*)"#', $this->executeViewHelper($this->arguments), $actualSource);
		$this->assertSame($expectedSource, $actualSource[1]);
		$expectedSource = 'https://secure.gravatar.com/avatar/b1b0eddcbc4468db89f355ebb9cc3007?s=160&amp;d=404&amp;r=pg';
		$this->arguments = array(
			'email' => 'juanmanuel.vergessolanas@gmail.com',
			'size' => 160,
			'imageSet' => '404',
			'maximumRating' => 'pg',
			'secure' => TRUE,
		);
		preg_match('#src="([^"]*)"#', $this->executeViewHelper($this->arguments), $actualSource);
		$this->assertSame($expectedSource, $actualSource[1]);
	}
}
