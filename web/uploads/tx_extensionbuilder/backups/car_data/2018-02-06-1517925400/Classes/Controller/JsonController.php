<?php
/**
 * Created by PhpStorm.
 * User: texto
 * Date: 28/01/2018
 * Time: 02:17 PM
 */

namespace Envauto\CarData\Controller;

use Envauto\CarData\Domain\Model\Car;
use Envauto\CarData\Domain\Repository\CarDataRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;

class JsonController extends ActionController
{
    /**
     * @var CarDataRepository
     */
    private $carDataRepository = null;
    /**
     * @var JsonView
     */
    protected $view;
    /**
     * @var string
     */
    protected $defaultViewObjectName = JsonView::class;
    public function injectCarDataRepository(CarDataRepository $carDataRepository)
    {
        $this->carDataRepository = $carDataRepository;
    }
    public function listAction()
    {
        $cars = $this->carDataRepository->findAll();
        $this->view->setVariablesToRender(['cars']);
        $this->view->assign(
            'cars',
            $this->getCarsJsonRepresentation($cars->toArray())
        );
    }
    /**
     * @param Car[] $cars
     * @return array
     */
    private function getCarsJsonRepresentation(array $cars): array
    {
        return array_map(
            function (Car $car) {
                return [
                    'manufacturer' => $car->getManufacturer(),
                    'model' => $car->getModel(),
                    'year' => $car->getYear(),
                    'class' => $car->getClass(),
                    'fuelType' => $car->getFuelType(),
                    'savings' => $car->getCylinders(),
                    'cityMPG' => $car->getCityMPG(),
                    'highwayMPG' => $car->getHighwayMPG(),
                    'combinedMPG' => $car->getCombinedMPG(),
                    'fuelCost' => $car->getFuelCost(),
                ];
            },
            $cars
        );
    }
    /**
     * Resolves web path prefix
     * (e.g. if http://site.com/path/index.php is called /path/ is returned)
     *
     * @return string
     */
    private function resolveWebPath(): string
    {
        return GeneralUtility::getIndpEnv('TYPO3_SITE_PATH');
    }
}