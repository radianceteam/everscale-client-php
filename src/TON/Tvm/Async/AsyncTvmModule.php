<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Tvm\Async;

use TON\TonContext;
use TON\Tvm\ParamsOfRunExecutor;
use TON\Tvm\ParamsOfRunGet;
use TON\Tvm\ParamsOfRunTvm;

class AsyncTvmModule implements TvmModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncTvmModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * Performs all the phases of contract execution on Transaction Executor -
     * the same component that is used on Validator Nodes.
     *
     * Can be used for contract debug, to find out the reason of message unsuccessful
     * delivery - as Validators just throw away failed transactions, here you can catch it.
     *
     * Another use case is to estimate fees for message execution. Set  `AccountForExecutor::Account.unlimited_balance`
     * to `true` so that emulation will not depend on the actual balance.
     *
     * One more use case - you can procude the sequence of operations,
     * thus emulating the multiple contract calls locally.
     * And so on.
     *
     * To get the account boc (bag of cells) - use `net.query` method to download it from graphql api
     * (field `boc` of `account`) or generate it with `abi.encode_account method`.
     * To get the message boc - use `abi.encode_message` or prepare it any other way, for instance, with Fift script.
     *
     * If you need this emulation to be as precise as possible then specify `ParamsOfRunExecutor` parameter.
     * If you need to see the aborted transaction as a result, not as an error, set `skip_transaction_check` to `true`.
     * @param ParamsOfRunExecutor $params
     * @return AsyncResultOfRunExecutor
     */
    public function runExecutorAsync(ParamsOfRunExecutor $params): AsyncResultOfRunExecutor
    {
        return new AsyncResultOfRunExecutor($this->_context->callFunctionAsync('tvm.run_executor', $params));
    }

    /**
     * Performs only a part of compute phase of transaction execution
     * that is used to run get-methods of ABI-compatible contracts.
     *
     * If you try to run get methods with `run_executor` you will get an error, because it checks ACCEPT and exits
     * if there is none, which is actually true for get methods.
     *
     *  To get the account boc (bag of cells) - use `net.query` method to download it from graphql api
     * (field `boc` of `account`) or generate it with `abi.encode_account method`.
     * To get the message boc - use `abi.encode_message` or prepare it any other way, for instance, with Fift script.
     *
     * Attention! Updated account state is produces as well, but only
     * `account_state.storage.state.data`  part of the boc is updated.
     * @param ParamsOfRunTvm $params
     * @return AsyncResultOfRunTvm
     */
    public function runTvmAsync(ParamsOfRunTvm $params): AsyncResultOfRunTvm
    {
        return new AsyncResultOfRunTvm($this->_context->callFunctionAsync('tvm.run_tvm', $params));
    }

    /**
     * Executes a getmethod of FIFT contract that fulfills the smc-guidelines https://test.ton.org/smc-guidelines.txt
     * and returns the result data from TVM's stack
     * @param ParamsOfRunGet $params
     * @return AsyncResultOfRunGet
     */
    public function runGetAsync(ParamsOfRunGet $params): AsyncResultOfRunGet
    {
        return new AsyncResultOfRunGet($this->_context->callFunctionAsync('tvm.run_get', $params));
    }
}
