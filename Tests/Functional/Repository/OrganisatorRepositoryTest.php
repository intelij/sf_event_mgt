<?php

namespace DERHANSEN\SfEventMgt\Tests\Functional\Repository;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Repository\OrganisatorRepository
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class OrganisatorRepositoryTest extends \TYPO3\CMS\Core\Tests\FunctionalTestCase
{

    /** @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface The object manager */
    protected $objectManager;

    /** @var \DERHANSEN\SfEventMgt\Domain\Repository\OrganisatorRepository */
    protected $organisatorRepository;

    /** @var array */
    protected $testExtensionsToLoad = ['typo3conf/ext/sf_event_mgt'];

    /**
     * Setup
     *
     * @throws \TYPO3\CMS\Core\Tests\Exception
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $this->organisatorRepository = $this->objectManager->get('DERHANSEN\\SfEventMgt\\Domain\\Repository\\OrganisatorRepository');

        $this->importDataSet(__DIR__ . '/../Fixtures/tx_sfeventmgt_domain_model_organisator.xml');
    }

    /**
     * Test if startingpoint is ignored
     *
     * @test
     * @return void
     */
    public function findRecordsByUid()
    {
        $locations = $this->organisatorRepository->findAll();
        $this->assertEquals(2, $locations->count());
    }

}
