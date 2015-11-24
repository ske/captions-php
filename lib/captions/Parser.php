<?PHP
namespace snikch\captions;
interface Parser
{
	public function __construct($content);
	public function parse();
}
