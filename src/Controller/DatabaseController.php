<?php


namespace App\Controller;


use Exception;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseController extends AbstractController
{
    /**
     * @Route("bd/dump-sql", name="bd-sql")
     * @param KernelInterface $kernel
     * @return Response
     * @throws Exception
     */
    public function dump(KernelInterface $kernel)
    {
        $app = new Application($kernel);
        $app->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:schema:update', '--dump-sql' => true,
        ]);

        $output = new BufferedOutput();
        $app->run($input, $output);

        $content = $output->fetch();

        return new Response($content);
    }

    /**
     * @Route("bd/force", name="bd-force")
     * @param KernelInterface $kernel
     * @return Response
     * @throws Exception
     */
    public function force(KernelInterface $kernel)
    {
        $app = new Application($kernel);
        $app->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:schema:update',  '--force' => true
        ]);

        $output = new BufferedOutput();
        $app->run($input, $output);

        $content = $output->fetch();

        return new Response($content);
    }

    /**
     * @Route("bd/create", name="bd-create")
     * @param KernelInterface $kernel
     * @return Response
     * @throws Exception
     */
    public function create(KernelInterface $kernel)
    {
        $app = new Application($kernel);
        $app->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:database:create',
        ]);

        $output = new BufferedOutput();
        $app->run($input, $output);

        $content = $output->fetch();

        return new Response($content);
    }
}