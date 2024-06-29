<?php declare(strict_types = 1);

use App\Domain\Movie\Movie;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MoviesFixture implements FixtureInterface
{

	private const MOVIES =
	[
		[
			'name' => 'Pulp Fiction: Historky z podsvětí',
			'description' => 'Kultovní film Quentina Tarantina o propletených příbězích zločinců a náhodných hrdinů.',
			'director' => 'Quentin Tarantino',
			'genre' => 'Krimi / Drama',
		],
		[
			'name' => 'Forrest Gump',
			'description' => 'Příběh muže s nízkým IQ, který žije neobyčejný život plný historických událostí.',
			'director' => 'Robert Zemeckis',
			'genre' => 'Drama / Komedie',
		],
		[
			'name' => 'Kmotr',
			'description' => 'Epos o rodině Corleone, která vládne světu organizovaného zločinu v USA.',
			'director' => 'Francis Ford Coppola',
			'genre' => 'Krimi / Drama',
		],
		[
			'name' => 'Matrix',
			'description' => 'Příběh o hackerech bojujících proti simulovanému světu, ve kterém lidstvo žije.',
			'director' => 'Lana Wachowski, Lilly Wachowski',
			'genre' => 'Sci-Fi / Akční',
		],
		[
			'name' => 'Titanic',
			'description' => 'Romantický příběh Jacka a Rose na palubě nešťastného parníku Titanic.',
			'director' => 'James Cameron',
			'genre' => 'Romantický / Drama',
		],
		[
			'name' => 'Pán prstenů: Společenstvo prstenu',
			'description' => 'První část epické trilogie o boji proti temným silám v zemi Středozemě.',
			'director' => 'Peter Jackson',
			'genre' => 'Fantasy / Dobrodružný',
		],
		[
			'name' => 'Hvězdné války: Epizoda IV - Nová naděje',
			'description' => 'Příběh o mladém Lukovi Skywalkerovi, který se přidává k rebelům bojujícím proti Impériu.',
			'director' => 'George Lucas',
			'genre' => 'Sci-Fi / Dobrodružný',
		],
		[
			'name' => 'Schindlerův seznam',
			'description' => 'Příběh Oskara Schindlera, který zachránil více než tisíc židovských uprchlíků během holocaustu.',
			'director' => 'Steven Spielberg',
			'genre' => 'Drama / Historický',
		],
		[
			'name' => 'Jurský park',
			'description' => 'Thriller o zábavním parku s geneticky oživenými dinosaury, který se vymkne kontrole.',
			'director' => 'Steven Spielberg',
			'genre' => 'Sci-Fi / Dobrodružný',
		],
		[
			'name' => 'Sedm',
			'description' => 'Detektivové pátrají po sériovém vrahovi, který zabíjí podle sedmi smrtelných hříchů.',
			'director' => 'David Fincher',
			'genre' => 'Krimi / Thriller',
		],
		[
			'name' => 'Zelená míle',
			'description' => 'Drama o dozorcích na smrtící chodbě a zázračném vězni, který mění jejich životy.',
			'director' => 'Frank Darabont',
			'genre' => 'Drama / Fantasy',
		],
		[
			'name' => 'Americká krása',
			'description' => 'Příběh středního věku muže, který znovu objeví smysl svého života.',
			'director' => 'Sam Mendes',
			'genre' => 'Drama',
		],
		[
			'name' => 'Temný rytíř',
			'description' => 'Batman bojuje proti anarchistickému zločinci Jokerovi, který ohrožuje Gotham City.',
			'director' => 'Christopher Nolan',
			'genre' => 'Akční / Krimi',
		],
		[
			'name' => 'Vykoupení z věznice Shawshank',
			'description' => 'Příběh nevině odsouzeného muže a jeho cestě ke svobodě z věznice Shawshank.',
			'director' => 'Frank Darabont',
			'genre' => 'Drama',
		],
		[
			'name' => 'Kmotr II',
			'description' => 'Pokračování příběhu rodiny Corleone, kde Michael rozšiřuje svůj vliv.',
			'director' => 'Francis Ford Coppola',
			'genre' => 'Krimi / Drama',
		],
		[
			'name' => 'Gladiátor',
			'description' => 'Epický příběh římského generála, který se stane gladiátorem a hledá pomstu.',
			'director' => 'Ridley Scott',
			'genre' => 'Historický / Akční',
		],
		[
			'name' => 'Interstellar',
			'description' => 'Sci-fi o skupině astronautů, kteří hledají novou planetu pro lidstvo.',
			'director' => 'Christopher Nolan',
			'genre' => 'Sci-Fi / Drama',
		],
		[
			'name' => 'Inception',
			'description' => 'Thriller o zloději, který vstupuje do snů lidí, aby ukradl jejich tajemství.',
			'director' => 'Christopher Nolan',
			'genre' => 'Sci-Fi / Akční',
		],
		[
			'name' => 'Statečné srdce',
			'description' => 'Příběh skotského hrdiny Williama Wallace, který vede povstání proti Anglii.',
			'director' => 'Mel Gibson',
			'genre' => 'Historický / Akční',
		],
		[
			'name' => 'Zpívání v dešti',
			'description' => 'Klasický muzikál o hvězdách filmového průmyslu v přechodu na zvukový film.',
			'director' => 'Stanley Donen, Gene Kelly',
			'genre' => 'Muzikál / Komedie',
		],
	];

	public function load(ObjectManager $manager): void
	{
		foreach (self::MOVIES as $movie) {
			$manager->persist(new Movie(
				$movie['name'],
				$movie['description'],
				$movie['director'],
				$movie['genre'],
			));
		}

		$manager->flush();
	}

}
