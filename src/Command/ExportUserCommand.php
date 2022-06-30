<?php

namespace App\Command;

use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:export-user',
    description: 'export user valide',
)]
class ExportUserCommand extends Command
{
    public function __construct(private UserRepository $userRepository, private string $path)
    {
        parent::__construct();   
    }
    protected function configure(): void
    {
        // $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
        //     ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // [
        //     ["firstName" => "toto", "lasteName" => "gresi"],
        //     ["firstName" => "martine", "lasteName" => "astone"],

        // ];

        $users = $this->userRepository->findAll();
        $export= [];
        foreach ($users as $user) {
            $export[] = [
                "firstName" => $user->getFirstName(),
                "lastName" => $user->getLastName(),
            ];
           
        }

        
 
        file_put_contents("{$this->path}/../export-user.xt", json_encode($export));

        // $io = new SymfonyStyle($input, $output);
        // // $arg1 = $input->getArgument('arg1');

        // // if ($arg1) {
        // //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // // }

        // // if ($input->getOption('option1')) {
        // //     // ...
        // // }

        // $io->error('export echoué');

        // $io->success('export réussi');
        return Command::SUCCESS;
    }
}
