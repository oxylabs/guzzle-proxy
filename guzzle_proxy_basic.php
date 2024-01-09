require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();
$client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://<proxy_address>:<port>']);
