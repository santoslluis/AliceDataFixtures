<?php

/*
 * This file is part of the Fidry\AliceDataFixtures package.
 *
 * (c) Théo FIDRY <theo.fidry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fidry\AliceDataFixtures\Loader;

/**
 * Utility class to keep track of the errors stacked while trying to load a given file.
 *
 * @private
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class ErrorTracker
{
    private $stack = [];

    public function register(string $filePath, \Throwable $error)
    {
        if (false === array_key_exists($filePath, $this->stack)) {
            $this->stack[$filePath] = [];
        }

        $this->stack[$filePath][] = $error->getMessage();
    }

    public function getStack(): array
    {
        return $this->stack;
    }
}