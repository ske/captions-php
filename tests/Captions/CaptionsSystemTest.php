<?PHP

use snikch\Captions;
use snikch\captions\Caption;
use snikch\captions\renderer\SrtRenderer;
use snikch\captions\Set;

include_once(dirname(__FILE__) . '/CaptionsUnitTestCase.php');

class CaptionsSystemTest extends CaptionsUnitTestCase
{
	public function test_from_srt()
	{
		$match = $this->_simple_captions_set();

		$string = $this->_srt_string();

		$captions =  Captions::from_srt($string);

		$this->assertSame(Set::class, get_class($captions));
		$this->assertEquals($match->render(), $captions->render());
	}

	public function test_to_srt()
	{
		$captions = $this->_simple_captions_set();

		$string = $this->_srt_string();

		$this->assertSame(Captions::to_srt($captions), $string);
	}

	public function test_shift_srt()
	{
		$match = new Set;
		$match->renderer(new SrtRenderer());

		$caption = new Caption;
		$caption->text('Text One')
			->start(1.123)
			->end(31.228);

		$match->add_caption($caption);

		$caption = new Caption;
		$caption->text('Text Two')
			->start(31.123)
			->end(61.173);
		$match->add_caption($caption);

		$captions = $this->_simple_captions_set();
		$captions->fast_forward(1.123);

		$this->assertSame($captions->render(), $match->render());
	}
}
