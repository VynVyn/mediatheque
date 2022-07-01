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
use Symfony\Component\Console\Question\ChoiceQuestion;

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
        $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption(
                'type',
                'T',
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Vous voulez exportez dans quel type ?',
                ['csv', 'json','txt']
            )->setHelp(<<<'help'
                set commande permet d'exporter les noms des utilisateurs inscris :

                exemple : <info> app:export-user --type=csv -Tcsv</info>
                help
            )
            
        ;
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $optionValue = $input->getOption('type');
        $filtre = array_intersect($optionValue, ['csv', 'json','txt']);
        if(count($filtre) < count($optionValue))
        {

            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion('quel format de sortie desirer vous ?', ['csv', 'json','txt'] );
            $format = $helper->ask($input,$output,$question);
            $input->setOption('type', [$format]);
        }
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input,$output);

        $users = $this->userRepository->findAll();
        $export= [];
        foreach ($users as $user) {
            $export[] = [
                "firstName" => $user->getFirstName(),
                "lastName" => $user->getLastName(),
            ];
           
        }


        $optionValue = $input->getOption('type');
        dump($optionValue);
        die();

        if (empty($optionValue)) {
            // in this case, the option was not passed when running the command
        } else {
            // in this case, the option was passed when running the command and
            // some specific value was given to it
            if ( in_array('json',$optionValue) ) {
                $io->title('ecriture au format json');
                file_put_contents("{$this->path}/../export-user.json", json_encode($export));
            }
            if(in_array('csv',$optionValue)) {
                $io->title('ecriture au format csv');

                //ouvrir le fichier csv
                $file = fopen("{$this->path}/../export-user.csv", 'w');
                foreach ($export as $user) {
                    //on inject a chaque iteration le user dans le fichier csv
                    fputcsv($file, $user);
                }
                //on ferme le fichier
                fclose($file);
            }
            if(in_array('txt',$optionValue))
            {
                $io->title('ecriture au format txt');

                $file = fopen("{$this->path}/../export-user.txt", 'w');
                foreach($export as $user)
                {
                    $line = implode(' ', $user)."\n";
                    fwrite($file, $line);
                }
                fclose($file);
            }
        }
        return Command::SUCCESS;
    }
}
