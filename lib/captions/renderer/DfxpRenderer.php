<?PHP

// http://www.w3.org/TR/2010/PR-ttaf1-dfxp-20100914/
// http://www.longtailvideo.com/support/addons/captions-plugin/14974/captions-plugin-reference-guide#W3CTimedText
namespace snikch\captions\renderer;
use snikch\captions\helper\DfxpHelper;
use snikch\captions\Renderer;

class DfxpRenderer implements Renderer
{

	public function set_element($name, $value)
	{
		$this->_elements[$name] = $value;
		return $this;
	}

	public function render($caption_set, $file = false)
	{
		$dom = new \DOMDocument("1.0");
		$dom->formatOutput = true;

		$root = $dom->createElement('tt');
		$dom->appendChild($root);

		$body = $dom->createElement('body');
		$root->appendChild($body);

		$xmlns = $dom->createAttribute('xmlns');
		$xmlns->appendChild($dom->createTextNode('http://www.w3.org/ns/ttml'));
		$root->appendChild($xmlns);

		$div = $dom->createElement('div');
		$body->appendChild($div);

		foreach($caption_set->captions() as $index => $caption)
		{
			$entry = $dom->createElement('p');

			$from = $dom->createAttribute('begin');
			$from->appendChild($dom->createTextNode(
				DfxpHelper::time_to_string($caption->start())
			));
			$entry->appendChild($from);

			$to = $dom->createAttribute('end');
			$to->appendChild($dom->createTextNode(
				DfxpHelper::time_to_string($caption->end())
			));
			$entry->appendChild($to);

			$entry->appendChild($dom->createCDATASection($caption->text()));

			$div->appendChild($entry);
		}

		if($file)
			return file_put_contents($file, $dom->saveXML());
		else
			return $dom->saveHTML();
	}
}
