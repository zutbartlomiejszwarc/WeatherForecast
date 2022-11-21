<?php

namespace App\Command;

use App\Controller\WeatherController;
use App\Service\WeatherUtil;
use ContainerEcA9v9W\getWeatherUtilService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'byid:command',
    description: 'Add a short description for your command',
)]
class ByidCommand extends Command
{
    private WeatherUtil $weatherUtil;

    public function __construct(WeatherUtil $weatherUtil)
    {
        $this->weatherUtil = $weatherUtil;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('id', InputArgument::OPTIONAL, 'Id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Id City Country Date Temperature Conditions Precipitation");
        $output->writeln($this->weatherUtil->getWeatherForLocation($input->getArgument('id')));
        return Command::SUCCESS;
    }
}
