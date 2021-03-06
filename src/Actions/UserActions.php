<?php

namespace Actions;

/**
 * User: tom
 * Date: 02/10/2017
 * Time: 21:35
 */

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use Helpers;

class UserActions extends Command
{

    protected function configure()
    {
        parent::configure(); // TODO: Change the autogenerated stub

        $this->setName('users')
            ->setDescription('User example.');
    }

    /**
     * Get all users from the database and print
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userHelper = new Helpers\Users();
        $users = $userHelper->getUsers();
        if ($users) {
            $table = new Table($output);
            $table
                ->setHeaders(array('id', 'FirstName', 'LastName', 'BirthDay'))
                ->setRows($users);
            $table->render();
        } else {
            $output->writeln('<error>No users found.</error>');
        }

        return false;
    }

}
