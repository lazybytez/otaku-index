<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AnimeDownloadDumpCommand extends Command
{
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
        // Initialize a file URL to the variable
        $url = 'http://anidb.net/api/anime-titles.xml.gz';

        // Initialize the cURL session
        $ch = curl_init($url);

        // Inintialize directory name where
        // file will be save
        $dir = './tmp/';

        // Use basename() function to return
        // the base name of file
        $file_name = basename($url);

        // Save file into file location
        $save_file_loc = $dir . $file_name;

        // Open file
        $fp = fopen($save_file_loc, 'wb');

        // It set an option for a cURL transfer
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
