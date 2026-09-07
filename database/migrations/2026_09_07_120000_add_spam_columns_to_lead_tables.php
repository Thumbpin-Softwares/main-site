<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Adds SpamGuard's verdict columns to every table that stores a public form
 * submission.
 *
 * Existing rows get is_spam = 0. They pre-date the guard, so nothing is
 * assumed about them -- run `php artisan leads:spam-report` to review the
 * backlog separately.
 */
class AddSpamColumnsToLeadTables extends Migration
{
    public function up()
    {
        foreach (config('spamguard.tables') as $table) {
            if (! Schema::hasTable($table) || Schema::hasColumn($table, 'is_spam')) {
                continue;
            }

            Schema::table($table, function (Blueprint $t) {
                $t->boolean('is_spam')->default(false)->index();
                $t->unsignedSmallInteger('spam_score')->default(0);
                $t->text('spam_reasons')->nullable();
            });
        }
    }

    public function down()
    {
        foreach (config('spamguard.tables') as $table) {
            if (! Schema::hasTable($table) || ! Schema::hasColumn($table, 'is_spam')) {
                continue;
            }

            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn(['is_spam', 'spam_score', 'spam_reasons']);
            });
        }
    }
}
