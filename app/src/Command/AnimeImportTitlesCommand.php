<?php

namespace App\Command;

use App\Entity\Anime;
use App\Entity\AnimeTitle;
use SimpleXMLElement;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;

class AnimeImportTitlesCommand extends Command
{
    private const ZIP_DIRECTORY = './tmp/anime-titles.xml.gz';
    private const UNZIP_DIRECTORY = './tmp/anime-titles.xml';

    protected static $defaultName = 'anime:import-titles';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription(
                "Download the AniDB XML dump with 'anime:download-dump'\n" .
                "  Then execute this command.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $this->unzipFile($io);
            $this->importData($io);
        } catch (\Throwable $th) {
            $io->error($th);
        }

        $io->success("Command executed successfully.");
        return Command::SUCCESS;
    }

    protected function unzipFile($io)
    {
        $buffer_size = 4096;
        $out_file_name = str_replace('.gz', '', self::ZIP_DIRECTORY);

        $file = gzopen(self::ZIP_DIRECTORY, 'rb');
        $out_file = fopen($out_file_name, 'wb');

        while (!gzeof($file)) {
            fwrite($out_file, gzread($file, $buffer_size));
        }

        fclose($out_file);
        gzclose($file);

        $io->text("File unpacked to " . self::UNZIP_DIRECTORY);
    }

    protected function importData($io)
    {
        $xml = simplexml_load_file(self::UNZIP_DIRECTORY, SimpleXMLElement::class, LIBXML_XINCLUDE);
        $em = $this->entityManager;

        foreach ($xml->anime as $anime) {
            // Search for existing Anime by id
            $animeObject = $em->getRepository(Anime::class)->findBy(array(
                "id" => $anime["aid"]
            ));
            // If there is no Anime with the id add it
            if (!$animeObject) {
                $this->addAnimeObject($em, $anime);
            }
            // If there is an Anime look if you can update the title(s)
            if ($animeObject) {
                //$this->updateAnimeObject($em, $anime);
            }
            $em->flush();
        }

        // Execute SQL query
        //$em->flush();

        $io->text("Anime titles successfully updated.");
    }

    protected function addAnimeObject($em, $anime)
    {
        // If there is no object create it
        $animeEntry = new Anime();
        // Add all titles to entry
        foreach ($anime as $animeTitle) {
            $animeTitleEntry = new AnimeTitle();
            $animeTitleEntry->setAid(intval($anime["aid"]));
            $animeTitleEntry->setType($animeTitle["type"]);
            $animeTitleEntry->setLanguage($animeTitle->attributes("xml", true)["lang"]);
            $animeTitleEntry->setTitle($animeTitle);
            $animeEntry->addAnimeTitle($animeTitleEntry);
            $em->persist($animeTitleEntry);
        }
        // Persist data
        $em->persist($animeEntry);
    }

    protected function updateAnimeObject($em, $anime)
    {
        // Add entry if missing
        // Update entry if hash is not same as before
    }
}
