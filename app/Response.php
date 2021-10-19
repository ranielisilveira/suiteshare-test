<?php
declare(strict_types=1);

namespace App;

use Psr\Http\Message\ResponseInterface;

class Response
{

    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function ok(): bool
    {
        return $this->response->getStatusCode() >= 200 &&
            $this->response->getStatusCode() <= 206;
    }

    public function data(): array
    {
        return json_decode($this->response->getBody()->getContents(), true);
    }

}
