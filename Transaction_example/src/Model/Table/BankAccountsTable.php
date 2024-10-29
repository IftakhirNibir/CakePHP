<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccounts Model
 *
 * @method \App\Model\Entity\BankAccount newEmptyEntity()
 * @method \App\Model\Entity\BankAccount newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BankAccount> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BankAccount findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BankAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BankAccount> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BankAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BankAccount>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BankAccount>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BankAccount>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BankAccount> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BankAccount>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BankAccount>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BankAccount>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BankAccount> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BankAccountsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bank_accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->decimal('balance')
            ->notEmptyString('balance');

        return $validator;
    }
}
