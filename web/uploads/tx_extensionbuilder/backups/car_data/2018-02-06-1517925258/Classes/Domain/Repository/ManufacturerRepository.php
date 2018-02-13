<?php
namespace Envauto\CarData\Domain\Repository;

/***
 *
 * This file is part of the "CarData" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * The repository for Manufacturers
 */

use Envauto\CarData\Domain\Model\Manufacturer;
use TYPO3\CMS\Extbase\Persistence\Repository;


class ManufacturerRepository extends Repository
{
    /**
     * @param string $name
     * @return Manufacturer
     */
    public function findByName(string $name)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('name', $name)
        );
        return $query->execute()->getFirst();
    }
    }
