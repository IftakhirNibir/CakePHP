<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class ReportsController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setClassName('Json');
    }

    public function getOrdersWithCustomers()
    {
        $ordersTable = TableRegistry::getTableLocator()->get('Orders');
        $order = $ordersTable->find()
                ->innerJoinWith('Customers')
                ->select(['Orders.id', 'Orders.customer_id', 'Orders.order_date', 'Customers.name', 'Customers.email'])
                ->all();
        // pr($order);
        // die; die use for stop everthing after pr 
       
        $this->set(compact('order'));
        $this->viewBuilder()->setOption('serialize', 'order');
    }

    public function getCustomersWithOrders(){
        $customerTable = TableRegistry::getTableLocator()->get('Customers');
        $customers = $customerTable->find()
                   ->leftJoinWith('Orders')
                   ->select([
                    'Customers.name',
                    'Customers.email',
                    'orderID' => 'Orders.id', // Aliasing Orders.id to orderID
                    'Orders.total_amount'
                    ])
                   ->where(['Orders.total_amount >'=>200])
                   ->all();

        $this->set(compact('customers'));
        $this->viewBuilder()->setOption('serialize','customers');
    }

    public function getOrderItemsWithProducts(){
        $order_items = TableRegistry::getTableLocator()->get('OrderItems');
        $orderitems = $order_items->find()
            ->leftJoin(
                        ['Products' => 'products'], 
                        ['OrderItems.product_id = Products.id']  
                    )
                    ->select([
                        'OrderItems.order_id',
                        'OrderItems.product_id',
                        'OrderItems.quantity',
                        'Product_Name'=>'Products.name',
                        'Products.price'
                    ])
                    ->all();

        $this->set(compact('orderitems'));
        $this->viewBuilder()->setOption('serialize','orderitems');
    }

    public function getfullJoin() {
        $customerTable = TableRegistry::getTableLocator()->get('Customers');
        
        $ordersinfo = $customerTable->find()
            ->leftJoinWith('Orders') 
            ->leftJoinWith('Orders.OrderItems') 
            ->leftJoinWith('Orders.OrderItems.Products')
            ->select([
                'Name'=>'Customers.name',
                'Email'=>'Customers.email',
                'Products.name',
                'Price'=>'Products.price',
                'Quantity'=>'OrderItems.quantity',
                'OrderDate'=>'Orders.order_date',
                'Total_Amount'=>'Orders.total_amount',
            ])
            ->where(['Products.name IS NOT' => null])
            ->all();

        $this->set(compact('ordersinfo'));
        $this->viewBuilder()->setOption('serialize', 'ordersinfo');
    }
}


