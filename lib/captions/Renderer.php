<?PHP
namespace snikch\captions;
interface Renderer
{
	public function render($caption_set, $file = false);
}
