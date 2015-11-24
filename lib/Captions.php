<?PHP

namespace snikch;

use snikch\captions\parser\Exception;
use snikch\captions\parser\SrtParser;
use snikch\captions\renderer\DfxpRenderer;
use snikch\captions\renderer\SrtRenderer;
use snikch\captions\Set;

class Captions
{
	public static function from_srt($content)
	{
		$parser = new SrtParser($content);
		return $parser->parse();
	}

	public static function to_srt(Set $captions, $file = null)
	{
		$renderer = new SrtRenderer();
		return $renderer->render($captions, $file);
	}

	public static function shift_srt($file, $shift)
	{
		$captions = self::from_srt(file_get_contents($file));
		$captions->fast_forward($shift);
		self::to_srt($captions, $file);
	}

	public static function from_dfxp($content)
	{
		throw new Exception('No Dfxp Parser has been implemented');
		$parser = new DfxpParser($content);
		return $parser->parse();
	}

	public static function to_dfxp(Set $captions, $file = null)
	{
		$renderer = new DfxpRenderer();
		return $renderer->render($captions, $file);
	}

	public static function shift_dfxp($file, $shift)
	{
		$captions = self::from_dfxp(file_get_contents($file));
		$captions->fast_forward($shift);
		self::to_dfxp($captions, $file);
	}
}
