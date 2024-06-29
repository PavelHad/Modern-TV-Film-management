<?php declare(strict_types = 1);

namespace App\Sdk\Resources\Movies\Response;

use DateTimeImmutable;
use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;

class MovieResponse
{

	public function __construct(
		private string $id,
		private string $name,
		private string $description,
		private string $director,
		private string $genre,
		private DateTimeImmutable $createdAt,
		private DateTimeImmutable $updatedAt,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function createFromArray(array $data): self
	{
		return new self(
			$data['id'],
			$data['name'],
			$data['description'],
			$data['director'],
			$data['genre'],
			new DateTimeImmutable($data['createdAt']),
			new DateTimeImmutable($data['updatedAt']),
		);
	}

	public static function create(ResponseInterface $response): self
	{
		$body = $response->getBody()->getContents();

		$response->getBody()->rewind();

		$decoded = Json::decode($body, true);

		return self::createFromArray($decoded);
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getDirector(): string
	{
		return $this->director;
	}

	public function getGenre(): string
	{
		return $this->genre;
	}

	public function getCreatedAt(): DateTimeImmutable
	{
		return $this->createdAt;
	}

	public function getUpdatedAt(): DateTimeImmutable
	{
		return $this->updatedAt;
	}

}
