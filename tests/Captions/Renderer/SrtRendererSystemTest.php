<?PHP

use snikch\captions\renderer\SrtRenderer;

include_once(dirname(__FILE__) . '/../CaptionsUnitTestCase.php');

class Captions_Renderer_SrtRendererSystemTest extends CaptionsUnitTestCase
{
	public function test_render()
	{
		$captions = $this->_simple_captions_set();

		$renderer = new SrtRenderer();

		$this->assertSame($renderer->render($captions), $this->_srt_string());
	}
}

