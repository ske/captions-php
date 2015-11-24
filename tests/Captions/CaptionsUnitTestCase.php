<?PHP

use snikch\captions\Caption;
use snikch\captions\renderer\SrtRenderer;
use snikch\captions\Set;

class CaptionsUnitTestCase extends \PHPUnit_Framework_TestCase
{
	protected function _srt_string()
	{
			$string = "1
00:00:00,000 --> 00:00:30,105
Text One

2
00:00:30,000 --> 00:01:00,050
Text Two";
		return $string;
	}

	protected function _simple_captions_set()
	{
		$match = new Set;
		$match->renderer(new SrtRenderer());

		$caption = new Caption;
		$caption->text('Text One')
			->start(0)
			->end(30.105);

		$match->add_caption($caption);

		$caption = new Caption;
		$caption->text('Text Two')
			->start(30)
			->end(60.05);
		$match->add_caption($caption);

		return $match;
	}

	protected function _dfxp_string()
	{
		$string = '<tt xmlns="http://www.w3.org/ns/ttml"><body><div>
<p begin="00:00:00" end="00:00:30.105">Text One</p>
<p begin="00:00:30" end="00:01:00.05">Text Two</p>
</div></body></tt>';

		return $string;
	}
}
