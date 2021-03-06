<?php

declare(strict_types=1);

/*
 * This file is part of the box project.
 *
 * (c) Kevin Herrera <kevin@herrera.io>
 *     Théo Fidry <theo.fidry@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace KevinGH\Box\Console\Command;

use DateTimeImmutable;
use function KevinGH\Box\FileSystem\copy;

/**
 * @private
 */
trait CreateTemporaryPharFile
{
    final private function createTemporaryPhar(string $file): string
    {
        if ('' === pathinfo($file, PATHINFO_EXTENSION)) {
            copy($file, $tmpFile = sys_get_temp_dir().'/'.(new DateTimeImmutable())->getTimestamp().$file.'.phar');

            return $tmpFile;
        }

        return $file;
    }
}
