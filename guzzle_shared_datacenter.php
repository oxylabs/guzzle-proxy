require_once 'vendor/autoload.php';
use GuzzlesHttp\Client;
$client = new Client();
$r = $client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://dc.pr.oxylabs.io:10000'])
echo($r->getBody());
