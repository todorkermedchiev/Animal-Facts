<?php

// stc/Repository/FactRepository.php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use App\Model\FactCollection;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Loads Fact models with information from the remote Animal Facts API
 *
 * @author user
 */
class FactRepository
{
    /**
     * The base API URL
     * 
     * @var string
     */
    protected string $baseUrl;
    
    /**
     * The HTTP client object
     * 
     * @var ClientInterface
     */
    protected ClientInterface $httpClient;
    
    /**
     * Creates new FactRepository object
     * 
     * @param ClientInterface $httpClient HTTP client which loads the info
     * @param string $baseUrl The API base URL
     * @return mixed
     */
    public function __construct(ClientInterface $httpClient, string $baseUrl): mixed
    {
        $this->httpClient = $httpClient;
        $this->baseUrl = $baseUrl;
    }
    
    /**
     * Loads single fact by its id
     * 
     * @param string $id The identifier of the fact that should be loaded
     * @return Fact
     */
    public function getFact(string $id): Fact
    {
        //...
    }
    
    /**
     * Loads a list with Fact objects
     * 
     * @param int $amount The amount of facts that should be loaded
     * @param string $animalType The animal type. Default is Fact::CAT
     * @return FactCollection
     */
    public function getRandomList(int $amount = 1,
            string $animalType = Fact::CAT
    ): FactCollection {
        //...
    }
    
    /**
     * Creates Fact object from stdClass
     * 
     * @param stdClas $object The values that will be added to the Fact object
     * @return Fact
     */
    public function createFact(stdClas $object): Fact
    {
        //...
    }
    
    /**
     * Creates the PSR HTTP request object
     * 
     * @param string $endpoint The API endpoint that must be called
     * @param array $params Query parameters for the URL
     * @return RequestInterface
     */
    protected function createRequest(string $endpoint, array $params = []): RequestInterface
    {
        //...
    }
    
    /**
     * Decodes the response body
     * 
     * @param StreamInterface $body The response body for decoding
     * @return array
     * @throws InvalidResponseBodyExceprion
     */
    protected function decodeResponseBody (StreamInterface $body): array
    {
        //throw new InvalidResponseBodyExceprion();
    }
    
    /**
     * Ensures the response status is OK
     * 
     * @param ResponseInterface $response The response object
     * @return void No returned value
     * @throws InvalidResponseBodyException
     */
    protected function ensureHttpResponseIsOK(ResponseInterface $response): void
    {
        //throw new InvalidResponseBodyException();
    }
}