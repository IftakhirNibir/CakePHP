<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [ 'user_id' => 1, 
              'title' => 'First Article', 
              'slug' => 'first-article', 
              'body' => 'This is the body of the first article.', 
              'published' => true, 
              'created' => date('Y-m-d H:i:s'), 
              'modified' => date('Y-m-d H:i:s') ], 

            [ 'user_id' => 2, 
              'title' => 'Second Article', 
              'slug' => 'second-article', 
              'body' => 'This is the body of the second article.', 
              'published' => false, 
              'created' => date('Y-m-d H:i:s'), 
              'modified' => date('Y-m-d H:i:s') ]
        ];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
