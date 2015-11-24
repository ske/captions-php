<?PHP
namespace snikch\captions\renderer;
use snikch\captions\helper\SrtHelper;


class SrtRenderer implements \snikch\captions\Renderer
{
	public function render($caption_set, $file = false)
	{
		$captions = array();

		foreach($caption_set->captions() as $index => $caption)
		{
			$captions[] = sprintf("%d\n%s --> %s\n%s",
				$index+1,
				SrtHelper::time_to_string($caption->start()),
				SrtHelper::time_to_string($caption->end()),
				$caption->text()
			);
		}

		$string = implode("\n\n", $captions);

		if($file)
			return file_put_contents($file, $string);
		else
			return $string;
	}
}
