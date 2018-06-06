<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Knp\Snappy\Pdf;

class AppGooglesearch2pdfCommand extends Command {
  /**
   * @var Pdf
   */
  private $pdfService;

  /**
   * AppGooglesearch2pdfCommand constructor.
   * @param string $name
   * @param \Knp\Snappy\Pdf $pdfService
   */
  public function __construct(string $name = NULL, Pdf $pdfService) {
    parent::__construct($name);
    $this->pdfService = $pdfService;
  }

  protected static $defaultName = 'app:googlesearch2pdf';

  protected function configure() {
    $this
      ->setDescription('Saves Google search results into a PDF')
      ->addArgument('term', InputArgument::REQUIRED, 'The search term. Multiple search terms may be concatenated by a plus sign (+)')
      ->addArgument('limit', InputArgument::REQUIRED, 'The number of total results');
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new SymfonyStyle($input, $output);
    $term = $input->getArgument('term');
    $limit = $input->getArgument('limit');

    if (!empty($term) && !empty($limit)) {
      $path = '/tmp/' . $term . '.pdf';

      $this->pdfService->generate('https://www.google.com/search?q=' . $term . '&num=' . $limit, $path);

      $io->success(sprintf('A PDF for Google search "%s" was successfully created at %s.', $term, $path));
    }
  }
}
