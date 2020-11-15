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
    public static function create(array $dto): ProcessingEvent
    {
        if ($dto['type'] === 'WillFetchFirstBlock') return new WillFetchFirstBlock($dto);
        if ($dto['type'] === 'FetchFirstBlockFailed') return new FetchFirstBlockFailed($dto);
        if ($dto['type'] === 'WillSend') return new WillSend($dto);
        if ($dto['type'] === 'DidSend') return new DidSend($dto);
        if ($dto['type'] === 'SendFailed') return new SendFailed($dto);
        if ($dto['type'] === 'WillFetchNextBlock') return new WillFetchNextBlock($dto);
        if ($dto['type'] === 'FetchNextBlockFailed') return new FetchNextBlockFailed($dto);
        if ($dto['type'] === 'MessageExpired') return new MessageExpired($dto);
        throw new InvalidArgumentException("Unsupported ProcessingEvent type: {$dto['type']}");
    }
}
