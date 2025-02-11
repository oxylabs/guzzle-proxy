# How to Set Up Proxies in Guzzle: PHP Tutorial

[![Oxylabs promo code](https://raw.githubusercontent.com/oxylabs/product-integrations/refs/heads/master/Affiliate-Universal-1090x275.png)](https://oxylabs.go2cloud.org/aff_c?offer_id=7&aff_id=877&url_id=112)

[![](https://dcbadge.vercel.app/api/server/eWsVUJrnG5)](https://discord.gg/GbxmdGhZjq)

## Introduction

Guzzle is a PHP HTTP client meant to facilitate HTTP requests sending and integration with web services. Its simple interface allows for building query strings, streaming large uploads and downloads, and more. With Guzzle, you no longer need to bother with stream contexts, cURL options, or sockets. 

In this tutorial, we’ll review each step required to set up Oxylabs’ proxies with Guzzle.

## Installing Guzzle

First, we will learn how to install Guzzle using composer. If you don't have composer installed, you can follow the below instructions to install it. 

### Install Composer

Download `composer` installer using the following command:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
```

Next, we will have to run the installer using the below command:

```bash
php composer-setup.php
```

Lastly, we will have to move the binary to PATH:

```bash
sudo mv composer.phar /usr/local/bin/composer
```

### Install Guzzle

Now that we have installed `composer`, we can use it to install Guzzle in our PHP project. We can simply run the following command:

```bash
composer require guzzlehttp/guzzle
```

Once we execute the above command, it will start installing the `guzzle` and its dependencies.

## Integrating Proxies

In this section, we will learn how to integrate proxies with `guzzle`. 

**Step 1:** First, let's import the freshly installed library:

```php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
```

**Step 2:** Now, we can make a `GET` request by creating a `client` object:

```php
$client = new Client();
$client->request('GET', 'https://ip.oxylabs.io/location', 
    ['proxy' => 'http://username:password@<proxy_address>:<port>']);
```

As you can see, we are initiating a `Client` object and then using it to send a GET request to the <https://ip.oxylabs.io/location> website. We are also passing the `proxy` as an extra argument.

Note: In the proxy URL, we are passing username, password, IP address, and port. You will have to replace these with your Oxylabs’ sub-user’s credentials. If the IP address is public and doesn’t require any authentication, then we can omit the username and password and send the request as below:

```php
$client = new Client(); 
$client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://<proxy_address>:<port>']); 
```

## Rotating Proxies

It's also possible to use rotating proxies with Guzzle. We can do this in various ways. For example, if you have a list of IP addresses, you can simply create an array of IPs and rotate them manually using PHP programming. This can become tedious if you have to rotate a huge list of IPs.

Alternatively, you can take advantage of Oxylabs’ solutions, which automatically handle all the rotations and proxy management. In the next few sections, we will see how we can integrate Oxylabs' proxies with Guzzle. 

### Oxylab’s residential HTTP Proxy Setup

First, let’s set up Oxylabs' Residential HTTP proxy. Input “pr.oxylabs.io” in the HTTP proxy server and also set the port to “7777”. The code will look like this:

```php
$client = new Client();
echo($client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://username:password@pr.oxylabs.io:7777'])->getBody());
```

We are grabbing the Body of the response and printing it using `echo`. If everything works correctly, you should see an IP address and other location data in the terminal as soon as you execute the above code. 

### Oxylab’s Dedicated Datacenter HTTP Proxy Setup

If you want to set the Dedicated Datacenter Proxies instead, you will have to use the specific
data center IP address as the Server address. And, the port must be set to `60000`

```php
$client = new Client();
$r = $client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://username:password@192.168.2.100:60000'])
echo($r->getBody());
```

In the above code, we are using an example IP address `192.168.2.100`. You will have to
replace it with your Dedicated Datacenter IP address. Also, you will have to use your Oxylabs' credentials instead of username and password.

### Oxylabs Shared Datacenter HTTP Proxy Setup

For the shared Datacenter Proxy, the server address will be `dc.pr.oxylabs.io` and port
`10000`. So the code will look like this:

```php
$client = new Client();
$r = $client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://username:password@dc.pr.oxylabs.io:10000'])
echo($r->getBody());
```

### Oxylab whiteListed IP proxy setup

In addition to the above methods, Oxylabs also supports whitelisting IP addresses  for specific services. Once you whitelist your IP from the Oxylabs dashboard, you can use proxies without sending credentials on each request. This not only simplifies the setup but also increases the security of your proxies since you don’t have to keep your credentials in your scripts anymore. 

For example, let’s say you have whitelisted your IP address for using the Oxylabs Residential Proxies. The code that we have written earlier can be simplified and written as below:

```php
$client = new Client();
echo($client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://pr.oxylabs.io:7777'])->getBody());
```

Oxylabs will automatically detect the IP address from your request and match it with the whitelisted IP and let your request pass through. The same technique can be used with Datacenter Proxies as well. Once whitelisted, you can omit the username and password for those two as well.

So for Dedicated Datacenter Proxies, the code will look like this:

```php
$client = new Client();
echo($client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://192.168.2.100:60000'])→getBody());
```

And, for Shared Datacenter Proxies, it will be:

```php
$client = new Client(); 
$r = $client->request('GET', 'https://ip.oxylabs.io/location', ['proxy' => 'http://dc.pr.oxylabs.io:10000']) 
echo($r->getBody());
```

## Conclusion

As you can see, setting up proxies in Guzzle is quite easy and worth all the benefits you get, such as no-hassle HTTP requests sending and more. To learn more about web scraping with PHP, check out this page.
