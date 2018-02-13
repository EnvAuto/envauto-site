<?php
namespace Envauto\CarData\Controller;

class CarDataListController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * carDataRepository
     *
     * @var \Envauto\CarData\Domain\Repository\CarDataRepository
     * @inject
     */
    protected $carDataRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $cars = $this->carDataRepository->findAll();
        $this->view->assign('cars', $cars);
    }

    /**
     * action show
     *
     * @param \Envauto\CarData\Domain\Model\Car $cars
     * @return void
     */
    public function showAction(\Envauto\CarData\Domain\Model\Car $cars)
    {
        $this->view->assign('cars', $cars);
    }
}