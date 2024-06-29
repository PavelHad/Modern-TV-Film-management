<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Response;

use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;

class CountResponse
{

	public function __construct(private readonly int $count)
	{
	}

	/**
	 * @param array<string, int> $data
	 */
	public static function createFromArray(array $data): self
	{
		return new self($data['totalCount']);
	}

	public static function create(ResponseInterface $response): self
	{
		$body = $response->getBody()->getContents();

		$response->getBody()->rewind();

		$decoded = Json::decode($body, true);

		return self::createFromArray($decoded);
	}

	public function getCount(): int
	{
		return $this->count;
	}

}
