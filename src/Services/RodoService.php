<?php

namespace Selene\Modules\RodoModule\Services;

use Selene\Modules\RodoModule\Services\Rodo\RodoException;
use GuzzleHttp\Client;

class RodoService
{
    protected $client;
    protected $source;

    public function __construct(string $endpoint, string $login, string $password, string $source)
    {
        $this->source = $source;
        $this->client = new Client([
            'base_uri' => $endpoint,
            'headers'  => [
                'usernameapi' => $login,
                'passwordapi' => $password,
            ]
        ]);
    }

    protected function call(string $method, array $data) {
        $response = $this->client->post($method, [
            'form_params' => $data
        ]);

        $contents = $response->getBody()->getContents();

        if ($response->getStatusCode() !== 200) {
            throw new RodoException(
                'StatusCode: ' . $response->getStatusCode() . PHP_EOL . 'Response: ' . $contents
            );
        }

        $answer = json_decode($contents, false, 512, JSON_THROW_ON_ERROR);

        if (!isset($answer->status)) {
            throw new RodoException('InvalidResponse: ' . $contents);
        }

        if (!$answer->status) {
            throw new RodoException($answer->message);
        }

        return $answer;
    }

    public function add($email, $phone, $lang, $name, array $consents) {

        $data = [
            'email'  => $email,
            'lang'   => $lang,
            'source' => $this->source,
            'name'   => '-',
            'surname' => '-',
            'phone' => $phone,
            'rule' => $consents,
        ];

        if (strpos($name, ' ')) {
            [$data['name'], $data['surname']] = explode(' ', $name);
        } else {
            $data['name'] = $name;
        }

        return $this->call('subscriber', $data)->status;
    }
}
