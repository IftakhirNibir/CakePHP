<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class CategoriesController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('custom');
    }

    public function index(){
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));
    }

    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('New category has been created.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add category.'));
        }
       
        $this->set(compact('category'));
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('This {0} has been deleted.', $category->name));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id){
        $category = $this->Categories->get($id);
        if ($this->request->is(['post','put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Your category has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your category.'));
        }
        $this->set(compact('category'));
    }
}

