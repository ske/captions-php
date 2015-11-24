<?PHP

use snikch\captions\renderer\DfxpRenderer;

include_once(dirname(__FILE__) . '/../CaptionsUnitTestCase.php');

class Captions_Renderer_DfxpRendererSystemTest extends CaptionsUnitTestCase
{
	public function test_render()
	{
		$captions = $this->_simple_captions_set();

		$renderer = new DfxpRenderer();

		$this->assertSame(trim($renderer->render($captions)), $this->_dfxp_string());
	}
}


