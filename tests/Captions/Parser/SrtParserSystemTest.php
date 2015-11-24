<?PHP

use snikch\captions\parser\SrtParser;

include_once(dirname(__FILE__) . '/../CaptionsUnitTestCase.php');

class Captions_Parser_SrtParserSystemTest extends CaptionsUnitTestCase
{
	public function test_parse()
	{
		$captions = $this->_simple_captions_set();

		$parser = new SrtParser($this->_srt_string());

		$this->assertSame($parser->parse()->render(), $captions->render());
	}
}


