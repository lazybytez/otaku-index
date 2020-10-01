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
        $file_name = "./tmp/anime-titles.xml.gz";

        $buffer_size = 4096;
        $out_file_name = str_replace('.gz', '', $file_name);

        $file = gzopen($file_name, 'rb');
        $out_file = fopen($out_file_name, 'wb');

        while (!gzeof($file)) {
            fwrite($out_file, gzread($file, $buffer_size));
        }

        fclose($out_file);
        gzclose($file);

        $io->text("File unpacked to " . $file_name);
    }

    protected function importData($io)
    {
        $xml = simplexml_load_file("./tmp/anime-titles.xml", SimpleXMLElement::class, LIBXML_XINCLUDE);
        $em = $this->entityManager;

        foreach ($xml->anime as $anime) {
            // Create new Anime
            $animeEntry = new Anime();
            foreach ($anime as $animeTitle) {
                // Import every anime which doesnt exist yet
                $animeTitleEntry = $em->getRepository(AnimeTitle::class)->findBy(array(
                    "aid" => $anime["aid"],
                    "type" => $animeTitle["type"],
                    "language" => $animeTitle->attributes("xml", true)["lang"],
                    "title" => $animeTitle,
                ));
                if(!$animeTitleEntry) {
                    // Build entry
                    $animeTitleEntry = new AnimeTitle();
                    $animeTitleEntry->setAid(intval($anime["aid"]));
                    $animeTitleEntry->setType(intval($animeTitle["type"]));
                    $animeTitleEntry->setLanguage($animeTitle->attributes("xml", true)["lang"]);
                    $animeTitleEntry->setTitle($animeTitle);

                    $animeEntry->addAnimeTitle($animeTitleEntry);
                    // Add entry
                    $em->persist($animeTitleEntry);
                }
                $em->persist($animeEntry);
                $em->flush();
            }
        }

        $io->text("Anime titles successfully updated.");
    }
}
