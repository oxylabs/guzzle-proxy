require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();
echo($client->request('GET', 'https://ip.oxylabs.io', ['proxy' => 'http://username:password@pr.oxylabs.io:7777'])->getBody());