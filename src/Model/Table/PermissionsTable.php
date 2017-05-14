<?php
/**
 * CakePHP permission handling library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\CakePermission\Model\Table;

use Cake\Core\Configure;
use Cake\ORM\Table;

class PermissionsTable extends Table
{
    use PermissionsTableTrait;

    public function initialize(array $config)
    {
        parent::initialize($config);
        $tableName = Configure::read('Permission.tableNameMap.permissions') ?: 'permissions';
        if (method_exists($this, 'setTable')) {
            $this->setTable($tableName);
        } else {
            $this->table($tableName);
        }
        $this->buildPermissionRelationship();
    }
}