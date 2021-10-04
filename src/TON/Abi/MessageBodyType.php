<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Abi;

final class MessageBodyType
{
    /** Message contains the input of the ABI function. */
    public const Input = 'Input';

    /** Message contains the output of the ABI function. */
    public const Output = 'Output';

    /**
     * Occurs when contract sends an internal message to other
     * contract.
     */
    public const InternalOutput = 'InternalOutput';

    /** Message contains the input of the ABI event. */
    public const Event = 'Event';
}
