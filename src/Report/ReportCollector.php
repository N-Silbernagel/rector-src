<?php

declare(strict_types=1);

namespace Rector\Core\Report;

use PhpParser\Node;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\ValueObject\Reporting\Report;
use Rector\NodeTypeResolver\Node\AttributeKey;

final class ReportCollector
{
    /**
     * @var Report[]
     */
    private $reports = [];

    public function addFileAndLineAwareReport(string $report, Node $node, string $rectorClass): void
    {
        $smartFileInfo = $node->getAttribute(AttributeKey::FILE_INFO);
        if ($smartFileInfo === null) {
            throw new ShouldNotHappenException();
        }

        $this->reports[] = new Report($report, $rectorClass, $smartFileInfo, $node->getLine());
    }

    /**
     * @return Report[]
     */
    public function getReports(): array
    {
        return $this->reports;
    }
}
