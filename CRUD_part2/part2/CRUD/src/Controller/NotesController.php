<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class NotesController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function layout(){
        $this->viewBuilder()->setLayout('custom');
    }

    // public function index(){
    //     $notes = $this->Notes->find('all',[
    //         'contain'=>['categories']
    //     ]);
    //     $this->set(compact('notes'));
    //     $this->viewBuilder()->setLayout('custom');
    // }

    public function index(){
        $searchTerm = $this->request->getQuery('search'); 

        $query = $this->Notes->find('all', [
            'contain' => ['categories']
        ]);

        if (!empty($searchTerm)) {
            $query->where([
                'OR' => [
                    'Notes.title LIKE' => '%' . $searchTerm . '%',
                    'Notes.body LIKE' => '%' . $searchTerm . '%'    
                ]
            ]);
        }

        $notes = $query->all(); 
        $this->set(compact('notes'));
        $this->viewBuilder()->setLayout('custom');
    }


    public function view($id){
        $note = $this->Notes->get($id,[
            'contain'=>['categories']
        ]);
        $this->set(compact('note'));
        $this->viewBuilder()->setLayout('custom');
    }

    public function add()
    {
        $note = $this->Notes->newEmptyEntity();
        $categoriesTable = TableRegistry::getTableLocator()->get('Categories');
        $categories = $categoriesTable->find()->all()->toArray();
        if ($this->request->is('post')) {
            $note = $this->Notes->patchEntity($note, $this->request->getData());

            if ($this->Notes->save($note)) {
                $this->Flash->success(__('Your note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your note.'));
        }
       
        $this->set(compact('note','categories'));
        $this->viewBuilder()->setLayout('custom');
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $note = $this->Notes->get($id);
        if ($this->Notes->delete($note)) {
            $this->Flash->success(__('The {0} Note has been deleted.', $note->title));

            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id){
        $note = $this->Notes->get($id);
        $categories = $this->Notes->categories->find('list', ['limit' => 200]);
        if ($this->request->is(['post','put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->getData());

            if ($this->Notes->save($note)) {
                $this->Flash->success(__('Your note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your note.'));
        }
        $this->set(compact('note','categories'));
        $this->viewBuilder()->setLayout('custom');
    }
}

