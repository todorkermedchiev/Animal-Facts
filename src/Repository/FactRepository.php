<?php

// stc/Repository/FactRepository.php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use App\Model\FactCollection;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use App\Exception\InvalidResponseBodyException;
use App\Exception\HttpResponseException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use DateTimeImmutable;
use App\Model\Status;

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
     */
    public function __construct(ClientInterface $httpClient, string $baseUrl)
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
        $endpoint = '/facts/' . $id;
        $request = $this->createRequest($endpoint);
        $response = $this->httpClient->sendRequest($request);
        $this->ensureHttpResponseIsOK($response);
        
        $body = $response->getBody();
        $decoded = $this->decodeResponseBody($body);
        
        $fact = $this->createFact($decoded);
        return $fact;
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
        $endpoint = '/facts/random';
        $request = $this->createRequest($endpoint, ['animal_type' => $animalType, 'amount' => $amount]);
        $response = $this->httpClient->sendRequest($request);
        $this->ensureHttpResponseIsOK($response);
        
        $body = $response->getBody();
        $decoded = $this->decodeResponseBody($body);
        
        $factCollection = new FactCollection();
        if ($amount == 1) {
            $fact = $this->createFact($decoded);
            $factCollection->offsetSet($fact->getId(), $fact);
        } else {
            foreach ($decoded as $object) {
                $fact = $this->createFact($object);
                $factCollection->offsetSet($fact->getId(), $fact);
            }
        }
        
        return $factCollection;
    }
    
    /**
     * Creates Fact object from stdClass
     * 
     * @param stdClas $object The values that will be added to the Fact object
     * @return Fact
     */
    public function createFact(\stdClass $object): Fact
    {
        $fact = new Fact();
        
        $createdAt = DateTimeImmutable::createFromFormat('Y-m-d\TH:i:s.v\Z', $object->createdAt);
        $updatedAt = DateTimeImmutable::createFromFormat('Y-m-d\TH:i:s.v\Z', $object->updatedAt);
        
        $status = new Status($object->status->verified, $object->status->sentCount);
        
        return $fact->setId($object->_id)
                ->setText($object->text)
                ->setUser($object->user)
                ->setType($object->type)
                ->setCreatedAt($createdAt)
                ->setUpdatedAt($updatedAt)
                ->setStatus($status);
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
        $query = http_build_query($params);
        $url = sprintf('%s%s?%s', $this->baseUrl, $endpoint, $query);
        
        $request = new Request('GET', $url);
        return $request;
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
        try {
            return json_decode($body . '');
        } catch (Exception $ex) {
            throw new InvalidResponseBodyException();
        }
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
        if ($response->getStatusCode() != 200) {
            throw new HttpResponseException();
        }
    }
}
