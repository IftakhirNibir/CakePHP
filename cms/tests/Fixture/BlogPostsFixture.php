<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogPostsFixture
 */
class BlogPostsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'category_id' => 1,
                'created' => '2024-10-23 11:28:47',
                'modified' => '2024-10-23 11:28:47',
            ],
        ];
        parent::init();
    }
}