<?php
/**
 * Created by PhpStorm.
 * User: texto
 * Date: 28/01/2018
 * Time: 02:10 PM
 */

namespace Envauto\CarData\Domain\Repository;

use EnvAuto\CarData\Domain\Model\Car;
use Envauto\CarData\Domain\Model\Manufacturer;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

class CarDataRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{


/**
 * The repository for Cars
 */

    /**
     * @param Manufacturer $manufacturer
     * @return QueryResultInterface|Car[]
     */
    public function findByManufacturer(Manufacturer $manufacturer)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('manufacturer', $manufacturer)
        );
        return $query->execute();
    }
}