<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Processing;

use InvalidArgumentException;
use JsonSerializable;

abstract class ProcessingEvent implements JsonSerializable
{
    public static function create(?array $dto): ?ProcessingEvent
    {
        if ($dto === null) return null;
        if (!isset($dto['type'])) return null;
        if ($dto['type'] === 'WillFetchFirstBlock') return new ProcessingEvent_WillFetchFirstBlock($dto);
        if ($dto['type'] === 'FetchFirstBlockFailed') return new ProcessingEvent_FetchFirstBlockFailed($dto);
        if ($dto['type'] === 'WillSend') return new ProcessingEvent_WillSend($dto);
        if ($dto['type'] === 'DidSend') return new ProcessingEvent_DidSend($dto);
        if ($dto['type'] === 'SendFailed') return new ProcessingEvent_SendFailed($dto);
        if ($dto['type'] === 'WillFetchNextBlock') return new ProcessingEvent_WillFetchNextBlock($dto);
        if ($dto['type'] === 'FetchNextBlockFailed') return new ProcessingEvent_FetchNextBlockFailed($dto);
        if ($dto['type'] === 'MessageExpired') return new ProcessingEvent_MessageExpired($dto);
        if ($dto['type'] === 'RempSentToValidators') return new ProcessingEvent_RempSentToValidators($dto);
        if ($dto['type'] === 'RempIncludedIntoBlock') return new ProcessingEvent_RempIncludedIntoBlock($dto);
        if ($dto['type'] === 'RempIncludedIntoAcceptedBlock') return new ProcessingEvent_RempIncludedIntoAcceptedBlock($dto);
        if ($dto['type'] === 'RempOther') return new ProcessingEvent_RempOther($dto);
        if ($dto['type'] === 'RempError') return new ProcessingEvent_RempError($dto);
        throw new InvalidArgumentException("Unsupported ProcessingEvent type: {$dto['type']}");
    }
}
