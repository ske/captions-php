<?PHP

use snikch\captions\helper\SrtHelper;

include_once(dirname(__FILE__) . '/../CaptionsUnitTestCase.php');

class Captions_Helper_SrtHelperSystemTest extends CaptionsUnitTestCase
{
	public function test_string_to_time()
	{
		$this->assertSame(
			SrtHelper::string_to_time('01:02:03,456'),
			3600 + 120 + 3 + 0.456
		);
	}

	public function test_time_to_string()
	{
		$this->assertSame(
			SrtHelper::time_to_string(3600 + 120 + 3 + 0.456),
			'01:02:03,456'
		);
	}

	public function test_is_srt()
	{
		$this->assertTrue(SrtHelper::is_srt("1\n00:00:00,000 --> 00:01:00,000\nsome test"));

		$this->assertFalse(SrtHelper::is_srt("00:00:01 --> 00:01:00,000\nsome test"));

	}

}
