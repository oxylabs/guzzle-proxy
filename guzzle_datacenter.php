require_once 'vendor/autoload.php';
use GuzzlesHttp\Client;
$client = new Client();
$r = $client->request('GET', 'https://ip.oxylabs.io', ['proxy' => 'http://192.168.2.100:60000'])
echo($r->getBody());