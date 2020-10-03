<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AnimeDownloadDumpCommand extends Command
{
    private const USER_AGENT = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
    private const DOWNLOAD_URL = 'https://anidb.net/api/anime-titles.xml.gz';

    protected static $defaultName = 'anime:download-dump';

    protected function configure()
    {
        $this
            ->setDescription('Downloads a dump from AniDB. REQUEST ONLY ONCE PER DAY!!!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $this->downloadFile();
        } catch (\Throwable $th) {
            $io->error($th);
        }

        $io->success('Sucessfully executed command!');

        return Command::SUCCESS;
    }

    protected function downloadFile()
    {
        // Initialize the cURL session
        $ch = curl_init(self::DOWNLOAD_URL);

        // Inintialize directory name where
        // file will be save
        $dir = './tmp/';

        // Use basename() function to return
        // the base name of file
        $file_name = basename(self::DOWNLOAD_URL);

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
        curl_setopt( $ch, CURLOPT_USERAGENT, self::USER_AGENT );
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Perform a cURL session
        curl_exec($ch);

        // Closes a cURL session and frees all resources
        curl_close($ch);

        // Close file
        fclose($fp);
    }
}
